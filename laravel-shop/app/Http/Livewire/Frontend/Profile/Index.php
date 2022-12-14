<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;

use Livewire\Component;

class Index extends Component
{
    public $customer;
    public function getInfo()
    {
        $this->customer = Customer::where('user_id',auth()->user()->id)->first();
        return $this->customer;
    }
    public function render()
    {
        $this->customer = $this->getInfo();
        return view('livewire.frontend.profile.index',[
            'customer' => $this->customer,
        ]);
    }
}
