@extends('layouts.master')


@section('content')
    <hr>
    <h1>Create - Article <button id="btn-save-article" class="btn btn-success float-right">SAVE</button></h3>
    
    <hr>
    <form action="/articles/create" id="create-article"  method="POST" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title"/>
        </div>
        <div class="form-group">
            <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Descriptions"></textarea>
        </div>
    </form>
@endsection



@section('script')

    $(document).ready(function(){

        $('#btn-save-article').click(function(){
            $('#create-article').submit();
        });

    });

@endsection