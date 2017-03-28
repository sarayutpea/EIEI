@extends('layouts.master')


@section('content')
    <style>
        input[type='text'],input[type="radio"]{
            border: 0px;
            background: white;
            user-select: none;
        };
    </style>
    <hr>
    <h1>Questions View
        <a href="/questions" id="btn-back" type="button" class="btn btn-danger float-right"><i class="fa fa-close"></i></a>
        <button id="btn-completed" type="button" class="btn btn-success float-right"><i class="fa fa-check-circle"></i></button>
    <hr>
     </h1>
    <form action="/questions/checkpoint" id="create-files"  method="POST" class="form" name="form" enctype="multipart/form-data"> 
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ $questionHeader->title }}"/>
            <input type="hidden" name="question_header_id" value="{{ $questionHeader->id }}">
        </div>

        <!--Question-->
        <div class="form-group" id="question-list">
            @php( $i=0 )
            @foreach($questions as $question)
            <div class="form-group" id="question-0">
                <div class="form-inline">
                    <input type="hidden" name="question_id[{{ $i }}]" value="{{ $question->id }}">
                    <input type="text" name="question[{{ $i }}]" id="question[{{ $i }}]" class="col-md-6 form-control" placeholder="Question..."/ value="{{ $question->body }}">
                </div>
                @for($n=0;$n<=4;$n++ )
                <div class="form-inline" id="answer-{{ $n }}">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="correctanswer[{{ $i }}]" value="{{ ($n+1) }}" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                    </label>
                    <input type="text" name="answer[{{ $i }}][{{ $n }}]" class="col-md-3 form-control" placeholder="Answer...1" value="{{ $answers[$i][$n]->body }}"> 
                </div>
                @endfor

                @php($i++)
            </div>
            @endforeach

            <!--Auto Add Here-->
        </div>

        <!--End Question-->
        

        <div class="form-group">
            <p class="">{{ $questionHeader->description }}</p>
        </div>
    {{-- Handle Error --}}
    @include('layouts.errors')
@endsection



@section('script')
<script>
    
    $(document).ready(function(){

        $('#btn-completed').click(function(){
            $('#create-files').submit();
            console.log('Click');
        });


    });
</script>
@endsection