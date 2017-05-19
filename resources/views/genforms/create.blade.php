@extends('layouts.master')

@section('css')
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    ul,li{
        list-style-type: none;
    }
    .title-bar-textbox{
        font-size: 15px;
        background-color: yellowgreen;
        border: 1px solid lightblue;
        width: 220px;
        height: 20px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    .title-bar-textarea{
        font-size: 15px;
        color: white;
        background-color: #132441;
        border: 1px solid lightblue;
        width: 220px;
        height: 20px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    #sortable{
        min-height: 10px;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
        width: 220px;
        border: 1px solid green;
        border-radius: 5px;
        /*background: #f6f6f6;*/
        /*font-weight: normal;*/
        /*color: #454545;*/
    }
</style>
@endsection
@section('content')
<div class="container">
    <hr>
    <h1>Create Form <button id="btn-save" class="btn btn-success float-right"><i class="fa fa-save"></i></button></h1>
    <hr>
    <div class="row">
        <ul>
            <li class="draggable">
                <div class="title-bar-textbox">
                    Text Box
                    <i class="fa fa-remove float-right"></i>
                </div>
                <div class="form-horizontal">
                    <input type="text" name="label[]" class=" form-control" placeholder="Type label...">
                    <input type="hidden" name="input_type[]" value="1">
                </div>
            </li>
        </ul>
        <ul>
            <li class="draggable">
                <div class="title-bar-textarea">
                    Text area
                    <i class="fa fa-remove float-right"></i>
                </div>
                <div class="form-horizontal">
                    <input type="text" name="label[]" class=" form-control" placeholder="Type label...">
                    <input type="hidden" name="input_type[]" value="2">
                </div>
            </li>
        </ul>
    </div>
    <hr>
    <div class="row">
        <form action="/genforms" method="post" class="form">
        {{ csrf_field() }}
            <ul id="sortable">
                <li class="ui-state-default"> <i class="fa fa-plus"></i> Drop Here</li>
            </ul>
        </form>
        
    </div>
    <hr>
</div>

@endsection
@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $( "#sortable" ).sortable({
        revert: true
    });
    $( ".draggable" ).draggable({
        connectToSortable: "#sortable",
        helper: "clone",
        revert: "invalid"
        
    });
    $( "ul, li" ).disableSelection();
    $('#btn-save').click(function(){
        $('.form').submit();
    });
    
});
</script>
@endsection