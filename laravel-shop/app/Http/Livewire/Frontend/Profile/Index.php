<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $fullname, $address, $phone;
    public $customer;
    public function getInfo()
    {
        $this->customer = Customer::where('user_id',auth()->user()->id)->first();
        return $this->customer;
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

    public function UpdateInfor(int $userId)
    {
        
            // $this->validate();
            Customer::where('user_id',auth()->user()->$userId)->update([
                
            ]);
            $this->emit('UpdateInfor');
            $this->dispatchBrowserEvent('message',[
                'text' => ' User Updated successfully !',
                'type' => 'success',
                'status' => 200
            ]);

    }
    public function render()
    {
        $this->customer = $this->getInfo();
        return view('livewire.frontend.profile.index',[
            'customer' => $this->customer,
        ]);
    }
}
