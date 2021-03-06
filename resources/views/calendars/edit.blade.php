@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::Asset('fullcalendar/fullcalendar.css') }}">
@endsection

@section('content')
    <hr>
    <h1>Edit - Event <button id="btn-save" class="btn btn-success float-right">SAVE</button></h3>
    
    <hr>
    <form action="/calendars/{{ $calendar->id }}/edit" id="create-form"  method="POST" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $calendar->title }}"/>
        </div>
        <div class="form-group">
            <select name="allDay" id="allDay" class="form-control">
                <option value="" {{ $calendar->time }}>Show as timeline</option>
                <option value="T" {{ $calendar->day }}>Show as all day</option>
            </select>
        </div>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' name="start" class="form-control" placeholder="Start at YYYY-MM-DDTHH:mm:ss+00:00" value="{{ $calendar->start }}"/>
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker2'>
                <input type='text' name="end" class="form-control" placeholder="End at YYYY-MM-DDTHH:mm:ss+00:00" value="{{ $calendar->end }}"/>
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <div id="cp1" class="input-group colorpicker-component">
                <input type="text" name="color" placeholder="Color #005465" class="form-control" value="{{ $calendar->color }}" />
                <span class="input-group-addon"><i></i></span>
            </div>
        </div>
        <div class="form-group">
            <div id="cp2" class="input-group colorpicker-component">
                <input type="text" name="textColor" placeholder="Text color #005465" class="form-control" value="{{ $calendar->textColor }}" />
                <span class="input-group-addon"><i></i></span>
            </div>
        </div>
    </form>
    {{-- Handle Error --}}
    @include('layouts.errors')
@endsection



@section('script')
<script>
    
    $(document).ready(function(){
        dateTimeFormat = "YYYY-MM-DDTHH:mm:ss+00:00";
        $('#datetimepicker1, #datetimepicker2').datetimepicker({
             format: dateTimeFormat
        });

        $('#cp1, #cp2').colorpicker();

        $('#btn-save').click(function(){
            $('#create-form').submit();
            
            // console.log(startDate.val());
            // console.log(endDate.val());
        });

    });

</script>

@endsection