<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Profile</h4>
                        <hr>
                    </div>
                    <div class="shadow bg-white p-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Full Name</label>
                            <input type="text" wire:model="" value="{{ $customer->fullname }}" id="fullname" class="form-control" placeholder="Enter Full Name" />
                            @error('fullname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone Number</label>
                            <input type="number" name="phone" value="{{ $customer->phone }}" id="phone" class="form-control" placeholder="Enter Phone Number" />
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Full Address</label>
                            <textarea  id="address" name="address" class="form-control" rows="2">{{ $customer->address }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="update" wire:click="UpdateInfor({{ $customer->user_id }})">
                            <button class="btn btn-primary float-end">
                                <span wire:loading.remove wire:target="UpdateInfor({{ $customer->user_id }})">
                                    </i> Update
                                </span>
                                <span wire:loading wire:target="UpdateInfor({{ $customer->user_id }})">
                                    Updateing...
                                </span>
                            </button>

                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
