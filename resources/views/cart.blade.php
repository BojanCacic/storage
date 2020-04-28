@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row bg-border-color medium-padding120">
        <div class="container">
            <div class="row">

                <div class="col-md-8">

                    <div class="cart">

                        <h3 class="cart-title">In Your Shopping Cart: <span class="c-primary">{{ Cart::content()->count()}} items</span></h3>

                    </div>

                    <div class="btn btn-medium btn--dark btn-hover-shadow">
                        <a href="{{ route('cart.destroy') }}">Delete cart</a>
                    
                    </div>

                    <form action="{{ route('cart.save') }}" method="post" class="cart-main">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="client">Select a client</label>
                            <select name="client" id="client" class="form-control">
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>                            
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="invoice">Invoice number</label>
                            <input type="text" class="form-control" name="invoice">
                        </div>

                        <div class="form-group">
                            <label for="pro_forma">Pro forma number</label>
                            <input type="text" class="form-control" name="pro_forma">
                        </div>

                        
                        <table class="table table-hover">
                            <thead class="cart-product-wrap-title-main">
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            

                            @foreach(Cart::content() as $pdt)


                            
                            
                            <tr class="cart_item">

                                <td class="product-remove">
                                    <a href="{{ route('cart.delete', ['rowId' => $pdt->rowId])}}" class="product-del remove" title="Remove this item">
                                        <i class="seoicon-delete-bold"></i>
                                    </a>
                                </td>

                                <td class="product-thumbnail">

                                    <div class="cart-product__item">
                                        <a href="#">
                                            <img src="{{ asset($pdt->model->image) }}" alt="product" class="attachment-shop_thumbnail wp-post-image" height=120px; width=auto;>
                                        </a>
                                        <div class="cart-product-content">
                                            
                                            <h5 class="cart-product-title">{{ $pdt->name}}</h5>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-price">
                                    <h5 class="price amount">{{ $pdt->price}}</h5>
                                </td>

                                <td class="product-quantity">

                                    <div class="quantity">
                                        <a href="{{ route('cart.decr', ['rowId' => $pdt->rowId, 'qty' => $pdt->qty])}}" class="quantity-minus">-</a>
                                    <input title="Qty" class="email input-text qty text" value="{{$pdt->qty}}" type="text" placeholder="1" readonly>
                                        <a href="{{ route('cart.incr', ['rowId' => $pdt->rowId, 'qty' => $pdt->qty])}}" class="quantity-plus">+</a>
                                    </div>

                                </td>

                                <td class="product-subtotal">
                                <h5 class="total amount">{{ $pdt->total()}}</h5>
                                </td>

                            </tr>
                            @endforeach

                            
                            
                            
                            

                        </tbody>
                        
                            


                    

                    <div class="cart-total">
                        <h3 class="cart-total-title">Cart Totals</h3>
                        <h5 class="cart-total-total">Total: <span class="price">{{Cart::total()}}</span></h5>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
                </div>            
            </div>
        </div>
    </div>
</div>


@endsection

