@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query')}}"</b></div>

    <div class="card-body">
        @foreach($searchResults->groupByType() as $type => $modelSearchresults)
            <h2>{{ ucfirst($type) }}</h2>

            @foreach($modelSearchresults as $searchResults)
                <ul>
                    <li><a href="{{ $searchResults->url }}">{{ $searchResults->title }}</a></li>
                </ul>
            @endforeach
        @endforeach
    </div>
</div>

@endsection