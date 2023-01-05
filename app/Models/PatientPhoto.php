<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Traits\UploadImages;

class PatientPhoto extends Model
{
    use CrudTrait;
    use UploadImages;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'patient_photos';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'name', 'description','photo_after','photo_before', 'sort'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    protected $uploads = [
        'image' =>  [
            '369x232' => '369x232@100',
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
        $this->deleteImage('photo_before', $this->photo_before, $this->uploads['photo_before']);
        return parent::delete();
    }

    public function setPhotoBeforeAttribute($value)
    {
        $this->attributes['photo_before'] = $this->upload($value);
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
