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

    public function destroy($id){
        $file = File::find($id);
        $fileName = $file->hash_name;
        $filePath = $file->path;

        
        // return Storage::delete('/'.$filePath.'/'.$fileName);


        if(!Storage::delete('public/'.$filePath.'/'.$fileName)){
           return 'can not delete fine'; 
        }
        if(!File::destroy($id)){
            return 'can not delete row';
        }

        // return redirect('/files');
        

        // return "success: ".$filePath.'/'.$fileName;
    }
}
