<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;


class Doctor extends Model
{
    use CrudTrait;
    use Sluggable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'doctors';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    //protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setImgAttribute($value)
    {
        $attribute_name = "img";
        $disk = "uploads";
        $destination_path  = "/doctors";
        // if the image was erased
        if (substr($value, 0, 10) === 'data:image') {
            // 0. Get image extension
            preg_match("/^data:image\/(.*);base64/i", $value, $match);
            $extension = $match[1];
            // 1. Make the image
            $image = \Image::make($value)->resize(210, 210);
            if (!is_null($image)) {
                // 2. Generate a filename.
                $filename = md5($value.time()).'.'.$extension;

                try {
                    // 3. Store the image on disk.
                    \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
                    // 4. Save the path to the database
                    $this->attributes[$attribute_name] = $filename;
                } catch (\InvalidArgumentException $argumentException) {
                    // 3. failed to save file
                    \Alert::error($argumentException->getMessage())->flash();
                    // 4. set as null when fail to save the image to disk
                    $this->attributes[$attribute_name] = null;
                }
            }
        } else {
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        }
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('uploads')->delete($obj->img);
        });
    }

    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }

}
