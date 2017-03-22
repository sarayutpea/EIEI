@extends('layouts.master')


@section('content')
    <hr>
    <h1>Files <a href="/files/create" class="btn btn-primary float-right">ADD</a></h3>
    
    <hr>
    @foreach($files as $file)
        <h2>
            <img src="{{ Storage::url( $file->path) }}/{{ $file->hash_name }}" width="80" alt="{{ $file->title }}">
            {{ $file->title }}
            <button type="button" data-method="delete" value="{{ $file->id }}" class="btn-delete btn btn-danger float-right">DELETE</button>
            <a href="#" class="btn btn-default float-right">REPLY</a>
            <a href="/files/{{ $file->id }}/edit" class="btn btn-primary float-right">EDIT</a>
            <a href="{{ Storage::url( $file->path) }}/{{ $file->hash_name }}" class="btn btn-warning float-right">DOWNLOAD</a>
        </h2>
        <h5>{{ $file->created_at->diffforHumans() }}</h5>
        <p>{{ $file->description }}</p>
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
                url: '/files/' + thisID,
                type: 'DELETE',  // user.destroy
                success: function(result) {
                    console.log(result);
                    window.location.href = "/files";
                },
                error: function(){
                    console.log('Error');
                }
            });

        });

    });

    
    
</script>
@endsection