<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageTrait
{
    public function uploadImagesDynamic($request)
    {
        return $this->uploadImage($request->image, $this->path);
      
     }
public function uploadImage($image, $path)
{
    $imageName = $image->hashName();
    Image::make($image)->resize(360, 270)->save(public_path('uploads/' . $path . '/' . $imageName));
    return $imageName;
}
public function deleteImage($image, $path, $append = null)
{
    Storage::disk('public_uploads')->delete($path . '/' . $image);
}
}