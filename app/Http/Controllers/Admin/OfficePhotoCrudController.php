<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OfficePhotoRequest as StoreRequest;
use App\Http\Requests\OfficePhotoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class DoctorsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OfficePhotoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\OfficePhoto');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/office-photos');
        $this->crud->setEntityNameStrings('office photo', 'office photos');


        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
        $this->crud->addField([
            'label' => "Title",
            'name' => "name",
        ]);
        $this->crud->addField([
            'label' => "Description",
            'name' => "description",
            'type' => 'textarea',
        ]);
        $this->crud->addField([
            'label' => "Office Image",
            'name' => "photo",
            'type' => 'image',
            'crop' => false, // set to true to allow cropping, false to disable
            'aspect_ratio' => 400/400, // ommit or set to 0 to allow any aspect ratio
            'prefix' => 'uploads/officephoto/400x400/', // in case you only store the filename in the database, this text will be prepended to the database value
        ]);

        $this->crud->addColumn([
            'label' => "Title",
            'name' => "name",
        ]);
        $this->crud->addColumn([
            'label' => "Photo",
            'name' => "photo",
            'type'  =>  'image',
            'prefix' => '/uploads/officephoto/preview/',
        ]);

        // add asterisk for fields that are required in DoctorsRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here

        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }


}

