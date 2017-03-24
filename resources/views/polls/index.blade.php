@extends('layouts.master')


@section('content')
    <hr>
    <h1>Polls <a href="/polls/create" class="btn btn-primary float-right"><i class="fa fa-plus-circle"></i></a></h3>
    
    <hr>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Title</td>
                <td>Control</td>
            </tr>
        </thead>
        <tbody>
            @foreach($polls as $poll)
                <tr>
                    <td>{{ $poll->title }}</td>
                    <td>
                        <a href="/polls/{{ $poll->id }}" class="btn btn-info"> <i class="fa fa-eye"></i> </a>
                        <a href="/polls/{{ $poll->id }}/edit" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                        <button type="button" id="{{ $poll->id }}" class=" btn btn-danger btn-delete"> <i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('script')
<script>

    $(document).ready(function(){

        $('.btn-delete').click(function(){
            thisID = $(this).attr('id');
            $.ajax({    
                beforeSend:function(){
                    
                },
                url: '/polls/' + thisID,
                type: 'DELETE',  // user.destroy
                success: function(result) {
                    console.log(result);
                    window.location.href = "/polls";
                },
                error: function(){
                    console.log('Error');
                }
            });

        });

    });

    
    
</script>
@endsection