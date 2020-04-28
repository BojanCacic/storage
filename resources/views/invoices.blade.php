@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <th>
                        @sortablelink('Client')     
                    </th>
                    <th>
                        Invoice
                    </th>
                    <th>
                        @sortablelink('Created_at')     
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                    
                    
                    
                </thead>

                <tbody>
                
                    @foreach ($invoices as $invoice)
                        @if ($invoice->invoice == true)
                        <tr>
                            <td>
                                {{$invoice->client}}
                            </td>
                            <td>
                                {{$invoice->invoice}}
                            </td>   
                            <td>
                                {{$invoice->created_at}}
                            </td>
                            <td>
                                <a href="{{ route('invoice.edit', ['invoice' => $invoice->invoice]) }}" class="btn btn-info">
                                     Edit</a>
                            </td>
                            <td>
                                Delete
                            </td>                          
                        </tr>
                        @endif    
                    @endforeach
                        
                   
                    
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection