<div>

    @include('livewire.admin.brand.modal-form')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Brand</h1>
        <a href="{{ url('admin/category/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm " data-toggle="modal" data-target="#addBrandModal"> Add Brand</a>
    </div> 
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            @if ($brand->category)
                              {{ $brand->category->name }}
                            @else
                             No Category   
                            @endif
                        </td>
                        <td>{{ $brand->slug }}</td>
                        <td>{{ $brand->status == '1' ? 'hidden':'visible' }}</td>
                        <td>
                            <a href="#" wire:click="editBrand({{ $brand->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateBrandModal">Edit</a>
                            <a href="#" wire:click="deleteBrand({{ $brand->id }})"  class="btn btn-danger" data-toggle="modal" data-target="#deleteBrandModal">Delete</a>
                        </td>
                    </tr>                
                @empty
                    <tr>
                        <td colspan="5">No Brands Found</td>
                    </tr>
                @endforelse
    
            </tbody>
        </table>
        <div class="">
            {{ $brands->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });
</script>
@endpush
