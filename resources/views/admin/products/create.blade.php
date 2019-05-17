@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                    <div class="col-md-10">
                        @if(count($errors))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Product Name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" placeholder="Product Price" name="price">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="number" class="form-control" rows="3" name="description" id="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="images">Images</label>
                                <input type="file" class="form-control-file" name="images[]" multiple>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
