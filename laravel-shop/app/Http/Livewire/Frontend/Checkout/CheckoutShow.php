<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount;

    public $fullname, $address, $phone, $payment_mode = null, $payment_id = null;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public $customer;

    public function paidOnlineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Paid by Paypal';
        $codOrder = $this->placeOrder();
        if($codOrder)
        {
            Cart::where('user_id',auth()->user()->id)->delete();
            session()->flash('message','Order Placed Successfully !');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('order-success');
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'phone' => 'required|string|max:11|min:10',
            'address' => 'required|string|max:500',
        ];
    }


    public function placeOrder()
    {
        if(Customer::where('user_id',auth()->user()->id)->exists())
        {
            // $this->validate();
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'total_price' => $this->totalProductAmount,
                'status_message' => 'in progress',
                'payment_mode' => $this->payment_mode,
                'payment_id' => $this->payment_id,

            ]);

            foreach($this->carts as $cartItem)
            {
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_color_id' => $cartItem->product_color_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->selling_price,
                ]);

                if($cartItem->product_color_id != null)
                {
                    $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
                }
                else
                {
                    $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
                }
            }

            return true;
        }
        else
        {
            $this->validate();
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'total_price' => $this->totalProductAmount,
                'status_message' => 'in progress',
                'payment_mode' => $this->payment_mode,
                'payment_id' => $this->payment_id,
    
            ]);
    
            $customer = Customer::create([
                'fullname' => $this->fullname,
                'phone' => $this->phone,
                'address' => $this->address,
                'user_id' => auth()->user()->id,
            ]);
    
            foreach($this->carts as $cartItem)
            {
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_color_id' => $cartItem->product_color_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->selling_price,
                ]);
    
                if($cartItem->product_color_id != null)
                {
                    $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
                }
                else
                {
                    $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
                }
            }
    
            return true;
        }
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on delivery';
        $codOrder = $this->placeOrder();
        if($codOrder)
        {
            Cart::where('user_id',auth()->user()->id)->delete();
            session()->flash('message','Order Placed Successfully !');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('order-success');
        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->carts as $cartItem)
        {
           $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }

        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->customer = Customer::where('user_id',auth()->user()->id)->first();
        $this->fullname = auth()->user()->name;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalProductAmount' => $this->totalProductAmount,
            'customer' => $this->customer,
        ]);
    }
}
