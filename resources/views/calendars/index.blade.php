@extends('layouts.master')


@section('content')
    <hr>
    <h1>Calendars <a href="/calendars/create" class="btn btn-primary float-right">ADD</a></h3>
    <hr>
    <div id="calendar">
    </div>
    <hr>
    <h2>Manage</h2>
    <hr>
    <table class="table hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Time</td>
                <td>Control</td>
            </tr>
        </thead>
        <tbody>
            @foreach($calendars as $calendar)
                <tr style=" background-color: {{ $calendar->color }}; color: {{ $calendar->textColor }}; ">
                    <td>{{ $calendar->id }}</td>
                    <td>{{ $calendar->title }}</td>
                    <td>{{ $calendar->start }}</td>
                    <td>
                        <a href="/calendars/{{ $calendar->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection



@section('script')
<script>

    $(document).ready(function(){
        $('#calendar').fullCalendar({           
            defaultView: 'month',
             header: {
                left: 'title',
                right: 'prev,next,month,agendaWeek,agendaDay' // buttons for switching between views
            },
            views: {
                month:{
                    buttonText: 'M'
                },
                agendaWeek:{
                    buttonText: 'W'
                },
                agendaDay: {
                    buttonText: 'D'
                }
            },
            events: 'calendars/show'
        })
    });

    
    
</script>
@endsection