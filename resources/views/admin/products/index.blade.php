@extends('layouts.app')

@section('content')
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
                            <td>
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                            <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger">Trash</a>
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
