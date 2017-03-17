@extends('layouts.master')


@section('content')
    <hr>
    <h1>Articles <a href="/articles/create" class="btn btn-primary float-right">ADD</a></h3>
    
    <hr>
    @foreach($articles as $article)
    <h2>
        {{ $article->title }}
        <a href="#" class="btn btn-danger float-right">DELETE</a>
        <a href="#" class="btn btn-default float-right">REPLY</a>
        <a href="/articles/{{ $article->id }}" class="btn btn-primary float-right">VIEW</a>
    </h2>
    <h5>{{ $article->created_at->diffForHumans() }}</h5>
    <p>{{ $article->body }}</p>
    <hr>

    @endforeach



@endsection