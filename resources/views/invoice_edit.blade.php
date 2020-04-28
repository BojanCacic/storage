@extends('layouts.app')

@section('content')


<form action="get">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-head">
                    <h2>Client information</h2>
                </div>
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="client_name">Client</label>
                        <input type="text" class="form-control" name="client_name" value="{{ $client->name }}">
                    </div>
                    <div class="form-group">
                        <label for="client_address">Adress</label>
                        <input type="text" class="form-control" name="client_address" value="{{ $client->address }}">
                    </div>
                    <div class="form-group">
                        <label for="client_city">City</label>
                        <input type="text" class="form-control" name="client_city" value="{{ $client->city }}">
                    </div>
                    <div class="form-group">
                        <label for="client_phone">Phone</label>
                        <input type="text" class="form-control" name="client_phone" value="{{ $client->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="invoice">Invoice Number</label>
                        <input type="text" class="form-control" name="invoice" value="{{ $invoice_edit->invoice }}">
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created_at</label>
                        <input type="text" class="form-control" name="created_at" value="{{ $invoice_edit->created_at }}">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</form>



<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <th>
                        1     
                    </th>
                    <th>
                        Invoice
                    </th>
                    <th>
                        2     
                    </th>
                    
                    
                    
                    
                </thead>

                <tbody>
                
                    @foreach ($cart as $item)
                        
                        <tr>
                            <td>
                                {{ $item }}
                            </td>
                            <td>
                                
                            </td>   
                            <td>
                            
                            </td>
                                                      
                        </tr>
                           
                    @endforeach
                        
                   
                    
                </tbody>
            </table>
        </div>
    </div>
</div> 

@endsection