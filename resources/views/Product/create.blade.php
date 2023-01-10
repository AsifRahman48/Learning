@extends('layouts.master')
@section('title','Create Product')
@section('content')


    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tag Name:</strong>
                        <select class="form-control" name="tag_id">

                            <option>Select Tag</option>

                            @foreach ($tag as $key => $value)

                                <option value="{{ $value->id }}" >
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

                                <option value="{{ $value->id }}" >
                                    {{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="text" name="price" class="form-control" placeholder=" Price">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image[]" class="form-control" placeholder=" Image" multiple>
                    </div>
                </div>

                <div class="form-group">
                <label class="required">Status</label>
                @foreach(App\Models\Product::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') == $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group row">
            <label class="col-sm-2">Gender</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <label class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gender[]" value="Male" {{ old('gender', '') == 1 ? 'checked' : '' }}> Male
                    </label><br>
                    <label class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gender[]" value="Female" {{ old('gender', '') == 0 ? 'checked' : '' }}> Female
                    </label>
                </div>

            </div>
        </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>



@endsection
