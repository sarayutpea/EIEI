@extends('layouts.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/sessions" method="POST">
                <input type="text" class="form-control">
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

$(document).ready(function(){

});
    
</script>
@endsection