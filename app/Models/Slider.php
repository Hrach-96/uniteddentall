<?php

namespace App\Models;

use App\Traits\UploadImages;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Cache;

class Slider extends Model
{
    use CrudTrait;
    use UploadImages;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'banners';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = [
         'name',
         'description',
         'btn_label',
         'url',
         'image',
         'blank',
         'status',
     ];
    // protected $hidden = [];
    // protected $dates = [];

    // Keep image sizes order from big to small
    protected $uploads = [
        'image' =>  [
            '833x576' => '833x576@100',
            'preview'    =>  '130x25@100',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function getBanners()
    {
        return Cache::remember('slider', 60, function() {
            return Banner::published()
                    ->orderBy('lft', 'ASC')
                    ->get();

        });
    }

    public function delete()
    {
        $this->deleteImage('slider', $this->image, $this->uploads['image']);
        return parent::delete();
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
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
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
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $this->upload($value);
    }
}
