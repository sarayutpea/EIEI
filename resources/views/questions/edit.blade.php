@extends('layouts.master')


@section('content')
    <style>
        input[type='text'],input[type="radio"]{
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            background: white;
            user-select: none;
        }
        input.blank{
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            border: orangered;
            background: orangered;
            user-select: none;
        }
    </style>
    <hr>
    <h1>Questions Edit
        <a href="/questions" id="btn-back" type="button" class="btn btn-danger float-right"><i class="fa fa-close"></i></a>
        <button id="btn-save" type="button" class="btn btn-success float-right"><i class="fa fa-save"></i></button>
    <hr>
     </h1>
    <form action="/questions/{{ $questionHeader->id }}/edit" id="create-form"  method="POST" class="form" name="form" enctype="multipart/form-data"> 
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ $questionHeader->title }}"/>
            <input type="hidden" name="question_header_id" value="{{ $questionHeader->id }}">
        </div>

        <!--Question-->
        <div class="form-group" id="question-list">
            @php( $i=0 )
            @foreach($questions as $question)
            <hr>
                <div class="form-group" id="question-{{ $i }}">
                    <div class="form-inline">
                        <input type="hidden" name="question_id[{{ $i }}]" value="{{ $question->id }}">
                        {{ ($i+1) }}.<input type="text" name="question[{{ $i }}]" id="question[{{ $i }}]" class="col-md-6 form-control" placeholder="Question...{{($i+1)}}"/ value="{{ $question->body }}">
                        <button type="button" id="{{ $i }}" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button>
                    </div>
                    @for($n=0;$n<=4;$n++ )
                    <div class="form-inline" id="answer-{{ $n }}">
                        <input type="text" name="answer[{{ $i }}][{{ ($n+1) }}]" class="col-md-3 form-control" placeholder="Answer...{{ ($n+1) }}" value="{{ $answers[$i][$n]->body }}"> 
                        <label class="custom-control custom-radio">
                            @if($answers[$i][$n]->correct == 1)
                            <input type="radio" name="correctanswer[{{ $i }}]" value="{{ ($n+1) }}" class="custom-control-input" checked>
                            @else
                            <input type="radio" name="correctanswer[{{ $i }}]" value="{{ ($n+1) }}" class="custom-control-input">
                            @endif
                            <span class="custom-control-indicator"></span>
                        </label>
                    </div>
                    @endfor

                    @php($i++)
                </div>
            @endforeach

            <!--Auto Add Questions Here-->
        </div>
        <!--End Question-->

        <div class="form-group">
            <button id="add-question" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Question</button>
            <button id="add-ten-question" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add 10 Question</button>
            <button id="add-hundreds-question" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add 100 Question</button>
        </div>


        <div class="form-group">
            <textarea class="form-control" name="description" rows="10" cols="">{{ $questionHeader->description }}</textarea>
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

        i = <?= $i ?>;
        remove();
        function addQuestion(count){
            for(n=1;n<=count;n++){
                //Add Header Question
                $('#question-list').append('<div class="form-group" id="question-'+i+'"><hr></div>');
                $('#question-'+i).append('<div class="form-inline">'+(i+1)+'.<input type="text" name="question['+i+']" id="question['+i+']" class="col-md-6 form-control" placeholder="Question...'+(i+1)+'"/> &nbsp;<button type="button" id="'+i+'" class="btn btn-outline-warning remove-item"><i class="fa fa-close"></i></button></div>');
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


        $('#btn-save').click(function(){
            // if ($("input").length != $('input').filter(function () {
            //         val =  $.trim(this.value);
            //         Name = $.trim(this.name);
            //         thisName = '[name="'+Name+'"]' 

            //         if(val === ""){
            //             $(thisName).addClass('blank');
            //         }
            //     }).length) {
            //     /* not all inputs filled */
            // }else{
               
            // }

             $('#create-form').submit();
            
        });

    });
</script>
@endsection