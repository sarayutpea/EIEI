@extends('layouts.master')


@section('content')
    <div class="col-md-12">
        <h2>{{ $article->title }}</h2>
        <h4>{{ $article->created_at->diffforHumans() }}</h4>
        <hr>
        <p>{{ $article->body }}</p>
    </div>

    <div class="col-md-12">
        <h4>Comments</h4>
        @foreach($article->comments as $comment )
            <p class=""><strong>{{ $comment->created_at->diffforHumans()}}</strong> {{ $comment->body }}</p>
        @endforeach
        <hr>
        
        <form action="/articles/{{ $article->id }}/comments" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea name="body" placeholder="Comments" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <input type="submit" class="btn btn-outline-success" value="Comment">
        </form>
        @include('layouts.errors')
    </div>
@endsection