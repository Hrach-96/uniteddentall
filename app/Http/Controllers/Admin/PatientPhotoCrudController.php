<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PatientPhotoRequest as StoreRequest;
use App\Http\Requests\PatientPhotoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class DoctorsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PatientPhotoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\PatientPhoto');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/patient-photos');
        $this->crud->setEntityNameStrings('patient photo', 'patient photos');


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
        'label' => "Photo",
        'name' => "photo_before",
        'type' => 'image',
        'upload'=>true,
        'crop' => true, // set to true to allow cropping, false to disable
        'aspect_ratio' => 369/232, // ommit or set to 0 to allow any aspect ratio
        'prefix' => 'uploads/patientphoto/369x232/', // in case you only store the filename in the database, this text will be prepended to the database value
        ]);
//        $this->crud->addField([
//            'label' => "Photo after",
//            'name' => "photo_after",
//            'type' => 'image',
//            'upload'=>true,
//            //'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
//            'crop' => true, // set to true to allow cropping, false to disable
//            'prefix' => 'uploads/patients/',
//        ]);

        $this->crud->addColumn([
            'label' => "Title",
            'name' => "name",
        ]);
        $this->crud->addColumn([
            'label' => "Photo",
            'name' => "photo_before",
            'type'  =>  'image',
            'prefix' => '/uploads/patientphoto/preview/',
        ]);
//        $this->crud->addColumn([
//            'label' => "Photo after",
//            'name' => "photo_after",
//            'type'  =>  'image',
//            'prefix' => '/uploads/patients/',
//        ]);


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

