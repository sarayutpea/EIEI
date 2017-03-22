<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

use Illuminate\Support\Facades\Storage; // use store file

class FileController extends Controller
{
    //

    public function index(){

        $files = File::all();
        return view('files.index', compact('files'));
    }

    public function create(){
        return view('files.create');
    }

    public function store(){
        $validate = $this->validate(request(),[
            'title' => 'required',
            'description' => 'required',
            'file' => 'required'
        ]);

        $fileRequest = request('file');
        $fileOriginalName = strtolower($fileRequest->getClientOriginalName());
        $fileHashName = $fileRequest->hashName();
        $fileSize = $fileRequest->getSize();
        $fileExt = strtolower($fileRequest->extension());

        
        Storage::disk('public')->put($fileExt, $fileRequest);
        

        File::create([
            'category_id' => (int)request('category_id'),
            'title' => request('title'),
            'description' => request('description'),
            'path' => $fileExt,
            'hash_name' => $fileHashName,
            'original_name' => $fileOriginalName,
            'type' => $fileExt,
            'size' => $fileSize,
            'download' => (int)request('download'),
            'publish' => (int)request('publish')
        ]);

        return 'seccess';
    }

    public function show($id){
        $file = File::find($id);

        return dd($id);
    }


    public function edit($id){
        $file = File::find($id);
        
        if($file->download == 1){
            $file->chDownload = "checked";
            $file->chDownloadValue = "1";
        }else{
            $file->chDownloadValue = "0";
        }
        if($file->publish == 1){
            $file->chPublish = "checked";
            $file->chPublishValue = "1";
        }else{
            $file->chPublishValue = "0";
        }

        return view('files.edit', compact('file'));
    }


    public function update($id){
        $file = File::find($id);
        $file->title = request('title');
        $file->description = request('description');
        $file->download = (int)request('download');
        $file->publish = (int)request('publish');

        if(request('file')){
            $fileName = $file->hash_name;
            $filePath = $file->path;
            Storage::delete('public/'.$filePath.'/'.$fileName); //Delete old file


            $fileRequest = request('file');
            $fileOriginalName = strtolower($fileRequest->getClientOriginalName());
            $fileHashName = $fileRequest->hashName();
            $fileSize = $fileRequest->getSize();
            $fileExt = strtolower($fileRequest->extension());


            $file->path = $fileExt;
            $file->hash_name = $fileHashName;
            $file->original_name = $fileOriginalName;
            $file->type = $fileExt;
            $file->size = $fileSize;
            Storage::disk('public')->put($fileExt, $fileRequest);
        }
        $file->save();

        return 'Success';
    }




    public function destroy($id){
        $file = File::find($id);
        $fileName = $file->hash_name;
        $filePath = $file->path;
        
        // return Storage::delete('/'.$filePath.'/'.$fileName);
        
        if(!$file->delete()){
            return 'can not delete row';

            if(!Storage::delete('public/'.$filePath.'/'.$fileName)){
            return 'can not delete fine';
            }
        }

        // return redirect('/files');
        

        return "Deleted: ".$filePath.'/'.$fileName;
    }
}
