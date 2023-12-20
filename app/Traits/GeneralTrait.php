<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;


trait GeneralTrait
{
      
    public function uploadImage($request,$base){
      $image= $request->file('image');
      return Storage::disk('public')->put('images', $image);
    }
}
