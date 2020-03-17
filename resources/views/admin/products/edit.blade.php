@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Edit product {{ $product->name }}</h1>

                    <form action="{{route('product.update', ['id' => $product->id ])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Product name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Product image</label>
                            <input type="file"  class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="price">Product price</label>
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Product description</label>
                            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection