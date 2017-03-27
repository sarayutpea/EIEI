@extends('layouts.master')


@section('content')
    <hr>
    <h1>Edit - Questions 
        <button id="btn-save-files" type="button" class="btn btn-success float-right">SAVE</button>
    <hr>
    <form action="/questions" id="create-files"  method="POST" class="form" name="form" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" id="title" name="title" class="form-control" placeholder="Title"/>
        </div>
        <!--Question-->
       <div class="form-group" id="question-list">
            <!--<div class="form-group" id="question-0">
                <div class="form-inline">
                    <input type="text" name="question[0]" id="question[0]" class="col-md-6 form-control" placeholder="Question..."/> &nbsp;
                    <button type="button" id="0" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button>
                </div>
                <div class="form-inline" id="answer-0">
                    <input type="text" name="answer[0][1]" placeholder="Answer...1" class="col-md-3 form-control">&nbsp;
                    <label class="custom-control custom-radio">
                        <input type="radio" name="rightchoice[0]" value="1" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                </div>
            </div>-->

            <!--Auto Add Here-->
       </div>

        <!--End Question-->

        <div class="form-group">
            <button id="add-question" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Question</button>
            <button id="add-ten-question" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add 10 Question</button>
            <button id="add-hundreds-question" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add 100 Question</button>
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
        $('#add-question').click(function(){
            addQuestion(1);
        });

        $('#add-ten-question').click(function(){
            addQuestion(10);
        });

        $('#add-hundreds-question').click(function(){
            addQuestion(100);
        });

        i = 0;
        function addQuestion(count){
            for(n=1;n<=count;n++){
                //Add Header Question
                $('#question-list').append('<div class="form-group" id="question-'+i+'"><hr></div>');
                $('#question-'+i).append('<div class="form-inline"><input type="text" name="question['+i+']" id="question['+i+']" class="col-md-6 form-control" placeholder="Question...'+(i+1)+'"/> &nbsp;<button type="button" id="'+i+'" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button></div>');
                for(j=1;j<=5;j++){
                    $('#question-'+i).append('<div class="form-inline" id="answer-'+j+'"><input type="text" name="answer['+i+']['+j+']" placeholder="'+j+'" class="col-md-3 form-control">&nbsp;<label class="custom-control custom-radio"><input type="radio" name="correctanswer['+i+']" value="'+j+'" class="custom-control-input"><span class="custom-control-indicator"></span></label></div>');
                }
                i++;
            }
            remove();
            console.log('click'+i);
        }

        function remove(){
            $('.remove-item').click(function(){
                event.preventDefault();
                thisID = $(this).attr('id');
                console.log('click remove '+ thisID);
                $('#question-'+thisID).remove();
            });
        }


        $('#btn-save-files').click(function(){
            $('#create-files').submit();
            console.log('Click');
        });


    });
</script>
@endsection