<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1;
    public $productColorId;

    public function addToWishList($productId)
    {
       if(Auth::check())
       {
        if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
        {
            session()->flash('message','Product already added to Wishlist !');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Product already added to Wishlist !',
                'type' => 'success',
                'status' => 409
            ]);
            return false;
        }
        else
        {
            Wishlist::create([
              'user_id' => auth()->user()->id,
              'product_id' => $productId,
            ]);
            session()->flash('message','Product added to Wishlist successfully !');
            $this->emit('wishlistAddedUpdated');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Product added to Wishlist successfully !',
                'type' => 'success',
                'status' => 200
            ]);
        }
       }
       else
       {
          return redirect('/login');
       }
    }

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if($this->productColorSelectedQuantity == 0)
        {
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1)
        {
            $this->quantityCount--;
        }
    }

    public function incrementQuantity()
    {
        $this->quantityCount++;
    }
    
    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            // dd($productId);
            if($this->product->where('id',$productId)->where('status','0')->exists())
            {

                if($this->product->productColors()->count() > 0)
                {
                    if($this->productColorSelectedQuantity != null)
                    {
                        if(Cart::where('user_id',auth()->user()->id)
                                ->where('product_id',$productId)
                                ->where('product_color_id',$this->productColorId)
                                ->exists())
                        {
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Product Alredy Added In Cart',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        }
                        else
                        {
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity > 0)
                            {
                                    if($productColor->quantity >= $this->quantityCount)
                                    {
                                        //Insert product to cart
                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->productColorId,
                                            'quantity' => $this->quantityCount,
                                        ]);

                                        $this->emit('CartAddedUpdate');
                                        $this->dispatchBrowserEvent('message',[
                                            'text' => 'Product added to cart successfully',
                                            'type' => 'success',
                                            'status' => 200
                                        ]);
                                    }
                                    else
                                    {
                                        $this->dispatchBrowserEvent('message',[
                                            'text' => 'Only ' .$productColor->quantity. ' Quantity Available',
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);
                                    }
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Out of Stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'Select Your Product Color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                }
                else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message',[
                            'text' => 'Product Alredy Added In Cart',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                    else
                    {
                        if($this->product->quantity > 0)
                        {
                            if($this->product->quantity > $this->quantityCount)
                            {
                                // Insert product to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);
    
                                $this->emit('CartAddedUpdate');
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Product added to cart successfully',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message',[
                                    'text' => 'Only'.$this->product->quantity.'Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message',[
                                'text' => 'Out of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }

            }
            else
            {
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Out of Stock',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }


    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
