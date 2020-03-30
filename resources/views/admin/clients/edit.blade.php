@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Edit client {{ $client->name }}</h1>

                    <form action="{{route('client.update', ['id' => $client->id ])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $client->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $client->address }}">
                        </div>
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" class="form-control" name="city" value="{{ $client->city }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $client->email }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $client->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $client->description }}">
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