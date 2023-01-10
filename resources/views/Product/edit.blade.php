@extends('layouts.master')
@section('title','Create Product')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Product name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tag Name:</strong>
                    <select class="form-control" name="tag_id" >

                        <option >Select Tag</option>

                        @foreach ($tag as $key => $value)

                            <option value="{{ $value->id }}" {{$product->tag_id == $value->id  ? 'selected' : ''}}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <select class="form-control" name="category_id">

                        <option>Select Category</option>

                        @foreach ($category as $key => $value)

                            <option value="{{ $value->id }}" {{$product->category_id == $value->id  ? 'selected' : ''}}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Price:</strong>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Product Price">
                </div>
            </div>

            <div class="form-group">
                <label class="required">Status</label>
                @foreach(App\Models\Product::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}"
                               {{ old('status', $product->status) == $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
             </div>
             
           
             <div class="form-group row">
            <label class="col-sm-2">Gender</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <label class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gender[]" value="Male" {{ old('gender', $product->gender) == 1 ? 'checked' : '' }}> Male
                    </label><br>
                    <label class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gender[]" value="Female" {{ old('gender', $product->gender) == 0 ? 'checked' : '' }}> Female
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
</body>
</html>

@endsection
