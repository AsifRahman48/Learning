
<a href="{{ route('products.show',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    View
</a>
<a href="{{ route('products.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    Edit
</a>
<form action="{{ route('products.destroy',$id) }}" method="Post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
