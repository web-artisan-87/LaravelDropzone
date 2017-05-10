<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Validator;
class FilesController extends Controller
{
    public function uploadFile(Request $request){
		$file = $request->file('file');

    	$validator = Validator::make(
            ['file' => $file],
            ['file' => 'required|mimes:png|max:25600']
     	);

		if($validator->passes()){
			Storage::disk('local')->put($file->getClientOriginalName(), $file);
        }else{
        	return response()->json([
    			'success' => false,
    			'errors' => $validator->getMessageBag()->toArray(),
			], 422);
        }
	}
}
