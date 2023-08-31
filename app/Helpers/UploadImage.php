<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

 function UploadImage($path){
    $request=new Request();
    $image = $request->file('image');
    $imageName=$image->getClientOriginalName();
  return $imageUrl= $image->storeAs($path,$imageName);
}

