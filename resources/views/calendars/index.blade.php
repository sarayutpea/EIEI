@extends('layouts.master')


@section('content')
    <hr>
    <h1>Calendars <a href="/calendars/create" class="btn btn-primary 
pull-right">ADD</a></h3>
    <hr>
    <div id="calendar">
    </div>

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