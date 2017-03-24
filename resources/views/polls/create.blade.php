@extends('layouts.master')


@section('content')
    <hr>
    <h1>Create - Polls 
        <button id="btn-save-files" type="button" class="btn btn-success float-right">SAVE</button>
    <hr>
    <form action="/polls" id="create-files"  method="POST" class="form" name="form" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" id="title" name="title" class="form-control" placeholder="Title"/>
        </div>
        
        <div class="form-group" id="poll-list">
            <!--<div class="form-inline" id="item-0">
                <input type="text" name="pollItem[0]" id="pollItem[0]" class="form-control" placeholder="Type something..."/> &nbsp;
                <button type="button" id="0" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button>
            </div>-->
        </div>
        
        <div class="form-group">
            <button id="add-answer" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add answer</button>
        </div>

        <div class="form-group">
            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Descriptions"></textarea>
        </div>
    {{-- Handle Error --}}

    @include('layouts.errors')
@endsection



@section('script')
<script>
    
    $(document).ready(function(){
        i = 0;
        // remove();
        $('#add-answer').click(function(){
            $('#poll-list').append('<div class="form-inline" id="item-'+i+'"><input type="text" name="pollItem['+i+']" id="pollItem['+i+']" class="form-control" placeholder="Type something..."/> &nbsp; <button type="button" id="'+i+'" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button></div>');
            remove();
            i++;
        });

        function remove(){
            $('.remove-item').click(function(){
                event.preventDefault();
                thisID = $(this).attr('id');
                console.log('click remove '+ thisID);
                $('#item-'+thisID).remove();
            });
        }


        $('#btn-save-files').click(function(){
            $('#create-files').submit();
            console.log('Click');
        });


    });
</script>
@endsection