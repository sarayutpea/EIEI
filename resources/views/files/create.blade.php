@extends('layouts.master')


@section('content')
    <hr>
    <h1>Create - Files 
        <button id="btn-save-files" class="btn btn-success float-right">SAVE</button>
        <div class="progress ">
            <div class="bar  progress-bar progress-bar-striped progress-bar-animated float-right" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                <span class="percent"></span>
            </div>
        </div>
    </h3>
    
    <hr>
    <form action="/files" id="create-files"  method="POST" class="form" name="form" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title"/>
        </div>
        <div class="form-group">
            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Descriptions"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="file" class="file">
        </div>
        <div class="form-group">
            <select name="category_id" class="custom-select">
                <option value="0">เลือกหมวดหมู่</option>
                <option value="1">กิจกรรม</option>
                <option value="2">นิทรรศการ</option>
                <option value="3">รายการทีวี</option>
            </select>
        </div>
        <div class="form-group">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" value="1" name="download" checked class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">&nbsp; Can download ? </span>
            </label>
        </div>
        <div class="form-group">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" value="1" name="publish" checked class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">&nbsp; Publish ? </span>
            </label>
        </div>

        

    </form>
    {{-- Handle Error --}}

    @include('layouts.errors')
@endsection



@section('script')
<script src="{{ URL::Asset('js/jquery.form.js') }}"></script>
<script>
    
    $(document).ready(function(){

        var bar = $('.bar');
        var percent = $('.percent');
        var progress = $('.progress');

        bar.hide();
        progress.hide();
        
        $('#create-files').ajaxForm({
            beforeSend: function() {
                progress.show();
                bar.show();
                var percentVal = '0%';

                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                console.log(event.timeStamp);
                console.log(percentVal);
                bar.width(percentVal)
                percent.html(percentVal);
                if(percentVal === "100%"){
                    bar.addClass('bg-warning');
                    percent.html("Process....");
                }
            },
            complete: function(xhr,result) {
                console.log(result);
                bar.width("100%");
                bar.removeClass('bg-warning');
                bar.addClass('bg-success');
                percent.html("Completed");
                setTimeout(function(){ window.location.href = "/files"; },1000);
            }
        });

        $(':file').change(function() {
            file = this.files[0];
            fileName = file.name;
            fileType = getFileExt(fileName);
            fileSize = file.size;
            
            console.log(fileType);
        });

        $("[name~='publish']").click(function(){
            if(!$(this).is(':checked')){ $(this).val(0); }else{ $(this).val(1); }
        });
        
        $("[name~='download']").click(function(){
            if(!$(this).is(':checked')){ $(this).val(0); }else{ $(this).val(1); }
        });
        

        $('#btn-save-files').click(function(){
            $('#create-files').submit();
            console.log('Click');
        });


    });
</script>

<script>
    function getFileExt(filename) {
        var extension = filename.substr( (filename.lastIndexOf('.') +1) ).toLowerCase();
        return extension;
    };
</script>

@endsection