@extends('layouts.app')

@section('content')
<div class="container">
    <div calss="row">
        <div class="col-md-6">
            <a href="{{ route('product.create') }}" class="btn btn-primary">
            <i class="fa fa-pencil" aria-hidden="true"></i> Create</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name     
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Count
                    </th>
                    <th>
                        Production date
                    </th>
                    <th>
                        Expiration date
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                    
                </thead>

                <tbody>
                    @if($products->count() > 0)
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                            <img src="{{ asset($product->image) }}" alt="{{$product->title}}" style="width: 100px"></a> 
                            </td>
                            <td>
                                {{$product->price}}
                            </td>
                            <td>
                                {{$product->description}}
                            </td>
                            <th>
                                {{$product->count}}
                            </th>
                            <th>
                                {{$product->production_date}}
                            </th>
                            <th>
                                {{$product->expiration_date}}
                            </th>
                            <td>
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-info">
                                    <i class="fa fa-gear" aria-hidden="true"> Edit</i></a>
                            </td>
                            <td>
                                <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"> Trash</i></a>
                            </td>
                        </tr>
                            
                        @endforeach
                    @else 
                        <tr>
                            <th colspan="5">No products.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
