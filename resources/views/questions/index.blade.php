@extends('layouts.master')


@section('content')
    <hr>
    <h1>Questions <a href="/questions/create" class="btn btn-primary float-right">ADD</a></h3>
    <hr>

    @foreach( $questions as $question )
    <h4>
        {{ $question->title }}
        <button type="button" data-method="delete" value="{{ $question->id }}" class="btn-delete btn btn-danger float-right"><i class="fa fa-trash"></i></button>
        <a href="/questions/{{ $question->id }}/edit" class="btn btn-primary float-right"><i class="fa fa-edit"></i></a>
        <a href="/questions/{{ $question->id }}" class="btn btn-warning float-right"><i class="fa fa-eye"></i></a>
    </h4>
    <h5></h5>
    <p></p>
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
                url: '/questions/' + thisID,
                type: 'DELETE',  // user.destroy
                success: function(result) {
                    console.log(result);
                    window.location.href = "/questions";
                },
                error: function(){
                    console.log('Error');
                }
            });

        });

    });

    
    
</script>
@endsection