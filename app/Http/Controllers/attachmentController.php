<?php

namespace App\Http\Controllers;
use App\Models\attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class attachmentController extends Controller
{
     public function show(){
    		return view("R2O.upload_form");
    	}

    	 public function upload(Request $request){
    	 //$this->validate($request, attachment::$rules);
        		$upload_images = $request->file('file');
        		foreach($upload_images as $upload_image){
        		if($upload_image) {
        			//アップロードされた画像を保存する
        			$path = $upload_image->store('uploads',"public");
        			//画像の保存に成功したらDBに記録する
        			if($path){
        				attachment::create([
        					"file_name" => $upload_image->getClientOriginalName(),
        					"file_path" => $path
        				]);
        			}
        		}
        		};
        		return redirect("/");
        }
}
