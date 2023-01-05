<?php
namespace App\Models;
use \Backpack\PageManager\app\Models\Page as BaseModel;
use http\Env\Request;

class Page extends BaseModel
{


//    public function setImagePosterAttribute($value)
//    {
//        $attribute_name = "image_poster";
//        $disk = "uploads";
//        $destination_path  = "/pages";
//        // if the image was erased
//
//        if (starts_with($value, 'data:image')) {
//            // 0. Get image extension
//            preg_match("/^data:image\/(.*);base64/i", $value, $match);
//            $extension = $match[1];
//            // 1. Make the image
//            $image = \Image::make($value)->resize(210, 210);
//            if (!is_null($image)) {
//                // 2. Generate a filename.
//                $filename = md5($value.time()).'.'.$extension;
//                try {
//                    // 3. Store the image on disk.
//                    \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
//                    // 4. Save the path to the database
//                    $this->attributes[$attribute_name] = $filename;
//                } catch (\InvalidArgumentException $argumentException) {
//                    // 3. failed to save file
//                    \Alert::error($argumentException->getMessage())->flash();
//                    // 4. set as null when fail to save the image to disk
//                    $this->attributes[$attribute_name] = null;
//                }
//            }
//        } else {
//            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
//        }
//    }


    public function setPdfAttribute($value)
    {
        $attribute_name = "pdf";
        $disk = "uploads";
        $destination_path  = "/pdf";
        $request = \Request::instance();
        // if a new file is uploaded, delete the file from the disk
        if ($request->hasFile($attribute_name) &&
            $this->{$attribute_name} &&
            $this->{$attribute_name} != null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }
        // if the file input is empty, delete the file from the disk
        if (is_null($value) && $this->{$attribute_name} != null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }
        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($attribute_name) && $request->file($attribute_name)->isValid()) {
            // 1. Generate a new file name
            $file = $request->file($attribute_name);
            $new_file_name = 'NewPatientsForm.pdf';
            // 2. Move the new file to the correct path
            $file_path = $file->storeAs($destination_path, $new_file_name, $disk);
            // 3. Save the complete path to the database
            $this->attributes[$attribute_name] = $file_path;
        }
    }

}