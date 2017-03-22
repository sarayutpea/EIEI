@extends('layouts.master')


@section('content')
    <hr>
    <h1>Create - Polls 
        <button id="btn-save-files" type="button" class="btn btn-success float-right">SAVE</button>
    <hr>
    <form action="/polls" id="create-files"  method="POST" class="form" name="form" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title"/>
        </div>
        <div class="form-group">
            <button id="add-answer" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add answer</button>
        </div>
        <div class="form-group" id="poll-list">
            <div class="form-inline">
                <input type="text" name="pollItem[0]" id="pollItem[0]" class="form-control" placeholder="1. Type something..."/> &nbsp;
                <button class="btn btn-outline-warning"><i class="fa fa-close"></i></button>
            </div>
        </div>

        <div class="form-group">
            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Descriptions"></textarea>
        </div>
    {{-- Handle Error --}}

    @include('layouts.errors')
@endsection



@section('script')
<script src="{{ URL::Asset('js/jquery.form.js') }}"></script>
<script>
    
    $(document).ready(function(){
        i = 2;
        $('#add-answer').click(function(){
            $('#poll-list').append('<div class="form-inline"><input type="text" name="pollItem['+i+']" id="pollItem['+i+']" class="form-control" placeholder="'+i+'. Type something..."/> &nbsp; <button class="btn btn-outline-warning"><i class="fa fa-close"></i></button></div>');
            i++;
        });

        $('#btn-save-files').click(function(){
            $('#create-files').submit();
            console.log('Click');
        });


    });
</script>

<script>
    function getFileExt(filename) {
        var extension = filename.substr( (filename.lastIndexOf('.') +1) ).toLowerCase();
        return extension;
    };
</script>

@endsection