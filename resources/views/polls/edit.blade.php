@extends('layouts.master')


@section('content')
    <hr>
    <h1>Edit - Poll 
        <button id="btn-save" type="button" class="btn btn-success float-right">SAVE</button>
    <hr>
    <form action="/polls/{{ $poll->id }}/edit" id="create-form"  method="POST" class="form" name="form" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ $poll->title }}"/>
        </div>
        <div class="col-xs-12 form-group" id="poll-list">
            @php( $i = 1 )
            @foreach($pollItems as $pollItem)
            <div class="form-inline" id="item-{{ $i }}">
                <!--<input type="text" name="pollItem_id[{{$i}}]" value="{{ $pollItem->id }}">-->
                <input type="hidden" name="pollItemPoint[{{$i}}]" value="{{ $pollItem->point }}">
                <input type="text" name="pollItem[{{$i}}]" id="pollItem[{{$i}}]" class="form-control" placeholder="..." value="{{ $pollItem->body }}" /> &nbsp;
                <!--<div id="cp{{$i}}" class=" colorpicker input-group colorpicker-component"> &nbsp; 
                    <input type="text" name="pollColor[{{$i}}]" placeholder="Color #005465" class="form-control" value="{{ $pollItem->color }}" required/> <span class="input-group-addon"><i></i></span>
                </div> &nbsp; -->
                <button type="button" id="{{$i}}" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button>
            </div>
            @php( $i++ )
            @endforeach
        </div>
        
        <div class="form-group">
            <button id="add-answer" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add answer</button>
        </div>

        <div class="form-group">
            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Descriptions">{{ $poll->description }}</textarea>
        </div>
    {{-- Handle Error --}}

    @include('layouts.errors')
@endsection



@section('script')
<script>
    
    $(document).ready(function(){
        i = <?=$i ?>;
        remove();
        colorSelector();
        $('#add-answer').click(function(){
            colorCode = Math.floor(Math.random()*90000000) + 10000000; //Random number
            colorCode = colorCode.toString(16); // Convert to text HEX 16

            // colorCode = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
            $('#poll-list').append('<input type="hidden" name="pollItemPoint['+i+']" value="0"><div class="form-inline" id="item-'+i+'"><input type="text" name="pollItem['+i+']" id="pollItem['+i+']" class="form-control" placeholder="..." value="" /> &nbsp;<button type="button" id="'+i+'" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button></div>');
            remove();
            colorSelector();
            i++;
            
        });

        function colorSelector(){
            $('.colorpicker').colorpicker();
        }
        function remove(){
            $('.remove-item').click(function(){
                event.preventDefault();
                thisID = $(this).attr('id');
                console.log('click remove '+ thisID);
                $('#item-'+thisID).remove();
            });
        }


        $('#btn-save').click(function(){
            $('#create-form').submit();
            console.log('Click');
        });


    });
</script>
@endsection