@extends('layouts.app')

@section('content')
<div class="container">
    <!--<div calss="row">
        <div class="col-md-6">
            <a href="{{ route('product.create') }}" class="btn btn-primary">
            <i class="fa fa-pencil" aria-hidden="true"></i> Create</a>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <th>
                        @sortablelink('name')    
                    </th>
                    <th>
                        @sortablelink('city')
                    </th>
                    <th>
                        @sortablelink('address')
                    </th>
                    <th>
                        @sortablelink('email')
                    </th>
                    <th>
                        @sortablelink('phone')
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
                    @if($clients->count() > 0)
                        @foreach ($clients as $client)
                        <tr>
                            <td>
                                {{$client->name}}
                            </td>
                            <td>
                                {{$client->address}}
                            </td>
                            <td>
                                {{$client->city}}
                            </td>
                            <td>
                                {{$client->email}}
                            </td>
                            <th>
                                {{$client->phone}}
                            </th>
                            <th>
                                {{$client->description}}
                            </th>
                            
                            <td>
                                <a href="{{ route('client.edit', ['id' => $client->id]) }}" class="btn btn-info">
                                    <i class="fa fa-gear" aria-hidden="true"> Edit</i></a>
                            </td>
                            <td>
                                <a href="{{ route('client.delete', ['id' => $client->id]) }}" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"> Trash</i></a>
                            </td>
                            
                            
                                <input type="hidden" name="pdt_id" value="{{ $client->id }}">
                
                                    
                                </form>
                            
                        </tr>
                            
                        @endforeach
                        {!! $clients->appends(\Request::except('page'))->render() !!}
                    @else 
                        <tr>
                            <th colspan="5">No clients.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
