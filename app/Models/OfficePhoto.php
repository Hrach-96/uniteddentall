<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Traits\UploadImages;

class OfficePhoto extends Model
{
    use CrudTrait;
    use UploadImages;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'office_photos';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    //protected $fillable = ['name', 'description','status','photo', 'sort'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $uploads = [
        'image' =>  [
            '400x400' => '400x400@100',
            'preview'    =>  '100x100@100',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS


    |--------------------------------------------------------------------------
    */
    public function delete()
    {
        $this->deleteImage('photo', $this->image, $this->uploads['image']);
        return parent::delete();
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $this->upload($value);
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
}
