@extends('layouts.master')


@section('content')
    <hr>
    <h1>View - Polls 
        <a href="/polls" id="btn-back" type="button" class="btn btn-primary float-right">Back</a>
    <hr>
    <h3>{{ $poll->title }}</h3>
    <hr>
    <hr>
    <canvas id="chartReport" width="400" height="400"></canvas>
    <hr>
    <div class="list-group">
        <input type="hidden" id="poll-id" name="poll-id" value="{{ $poll->id }}">
        @foreach($poll->items as $pollItem)
            <a href=""  id="{{ $pollItem->id }}"  class="btn-point list-group-item list-group-item-action">
                <h5>{{ $pollItem->body }} <span class="badge badge-info">{{ $pollItem->point }}</span></h5>
            </a>    
        @endforeach
    </div>


    <div id="json"></div>
@endsection



@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        //
        $('.list-group-item').focusin(function(){
            $(this).addClass('active');
        }).focusout(function(){
            $(this).removeClass('active');
        });


        $('.btn-point').click(function(){
            thisPollID = $('#poll-id').val();
            thisID = $(this).attr('id');
            console.log(thisID);

            $.ajax({
                url:'/pollItem/addPoint',
                method:'POST',
                data:{ id:thisID },
                beforeSend:function(){
                    console.log('before Send')
                },
                success:function(result){
                    console.log('success: ' + result);
                    window.location = "/polls/" + thisPollID;
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

        // ChartJS
        getData = $.ajax({
            type: "GET",
            url: "/polls-chartjs",
            contentType: "application/json",
            async: false
        }).responseText;


        data = $.parseJSON(getData)

        ctx = $('#chartReport');
        chartReport = new Chart(ctx, {
            type: 'doughnut',
            data: data
        });//End Chart js
        
    });
</script>
@endsection