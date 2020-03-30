@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Add new client</h1>

                    <form action="{{route('client.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Client name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="name">phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                                                
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection