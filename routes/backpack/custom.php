<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('doctor', 'DoctorCrudController');
    CRUD::resource('operation-instruction', 'OperationInstructionCrudController');
    CRUD::resource('patient-photos', 'PatientPhotoCrudController');
    CRUD::resource('office-photos', 'OfficePhotoCrudController');
    CRUD::resource('testimonials', 'TestimonialCrudController');
    CRUD::resource('insurances', 'InsurancesCrudController');
    CRUD::resource('sliders', 'SliderCrudController');
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('tag', 'TagCrudController');
}); // this should be the absolute last line of this file


