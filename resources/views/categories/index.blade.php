@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end">
    <a href="{{ route('categories.create') }}" class="btn btn-success float-right mb-2">
    Add category
    </a>
</div>

<div class="card card-default">
    <div class="card-header">
    Categories
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <th>Name</th>
                <th colspan="2">Action</th>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="handleDelete( {{ $category->id }} )">Delete</button>
                    </td>
                </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" id="deleteCategoryForm">
    @csrf
    @method('DELETE')


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </form>
  </div>
</div>

@endsection


@section('scripts')

<script>
    function handleDelete($id){
        //console.log($id)
        var form = document.getElementById('deleteCategoryForm');
        form.action = "/categories/" + $id;
        //console.log(form);
        $('#deleteModal').modal('show');
    }
</script>

@endsection