@extends('layouts.master')

@section('css')
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    ul,li{
        list-style-type: none;
    }
    .title-bar{
        font-size: 15px;
        background-color: yellowgreen;
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
    <h1>Create Form <a href="#" class="btn btn-success float-right"><i class="fa fa-save"></i></a></h1>
    <hr>
    <div class="row">
        <ul>
            <li class="draggable">
                <div class="title-bar">
                    Text Box
                    <i class="fa fa-remove float-right"></i>
                </div>
                <div class="form-horizontal">
                    <input type="text" class=" form-control">
                    <input type="text" class="form-control">
                </div>
            </li>
        </ul>
    </div>
    <hr>
    <div class="row">
        <ul id="sortable">
            <li class="ui-state-default"><i class="fa fa-add"></i> Drop Here</li>
        </ul>
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
});
</script>
@endsection