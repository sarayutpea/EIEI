@extends('layouts.master')


@section('content')
    <hr>
    <h1>Polls <a href="/polls/create" class="btn btn-primary float-right"><i class="fa fa-plus-circle"></i></a></h3>
    
    <hr>



@endsection

@section('script')
<script>

    $(document).ready(function(){

        $('.btn-delete').click(function(){
            thisID = $(this).val();
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