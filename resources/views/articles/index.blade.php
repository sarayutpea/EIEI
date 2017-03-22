@extends('layouts.master')


@section('content')
    <hr>
    <h1>Articles <a href="/articles/create" class="btn btn-primary float-right">ADD</a></h3>
    
    <hr>
    @foreach($articles as $article)
    <h2>
        {{ $article->title }}
        <button type="button" data-method="delete" value="{{ $article->id }}" class="btn-delete btn btn-danger float-right"><i class="fa fa-trash"></i></button>
        <a href="#" class="btn btn-default float-right">REPLY</a>
        <a href="/articles/{{ $article->id }}" class="btn btn-primary float-right"><i class="fa fa-eye"></i></a>
    </h2>
    <h5>{{ $article->created_at->diffForHumans() }}</h5>
    <p>{{ $article->body }}</p>
    <hr>

    @endforeach



@endsection



@section('script')
<script>

    $(document).ready(function(){

        $('.btn-delete').click(function(){
            thisID = $(this).val();
            $.ajax({    
                beforeSend:function(){
                    
                },
                url: '/articles/' + thisID,
                type: 'DELETE',  // user.destroy
                success: function(result) {
                    console.log(result);
                    window.location.href = "/articles";
                },
                error: function(){
                    console.log('Error');
                }
            });

        });

    });

    
    
</script>
@endsection