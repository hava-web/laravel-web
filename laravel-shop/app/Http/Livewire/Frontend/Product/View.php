<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity;

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
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if($this->productColorSelectedQuantity == 0)
        {
            $this->productColorSelectedQuantity = 'outOfStock';
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
