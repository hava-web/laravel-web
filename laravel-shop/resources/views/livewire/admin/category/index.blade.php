<div class="">
    {{-- <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure want to delete this category</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
        </div>
    </div> --}}


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure want to delete this category</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="">   
       @if (session('message'))
       <div class="alert alert-success">{{ session('message') }}</div>
   @endif</div>
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Category</h1>
       <a href="{{ url('admin/category/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> Add Category</a>
   </div> 
   
   <div class="card-body">
       <table class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Status</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($categories as $category)
               <tr>
                   <td>{{ $category->id }}</td>
                   <td>{{ $category->name }}</td>
                   <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                   <td>
                       <a href="{{ url('admin/category/'.$category->id.'/edit') }}"class="btn btn-success">Edit</a>
                       <a href="#" wire:click="deleteCategory({{ $category->id }})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</a>
                   </td>
               </tr>
               @endforeach
           </tbody>
       </table>
       <div class="">
           {{ $categories->links('pagination::bootstrap-5') }}
       </div>
   </div>
</div>

 @push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
 @endpush