<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\InsuranceRequest as StoreRequest;
use App\Http\Requests\InsuranceRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class DoctorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class InsurancesCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Insurance');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/insurances');
        $this->crud->setEntityNameStrings('insurance', 'insurances');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
        $this->crud->setColumns(['name']);
        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "Insurance name"
        ]);
        $this->crud->addField([
            'label' => "Insurance logo",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            //'aspect_ratio' => 210 / 210, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            'prefix' => 'uploads/insurances/', // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);

        // add asterisk for fields that are required in DoctorRequest
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
