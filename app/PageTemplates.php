<?php

namespace App;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */
    private function home()
    {
        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
//        $this->crud->addField([   // CustomHTML
//            'name' => 'content_separator',
//            'type' => 'custom_html',
//            'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
//        ]);
//        $this->crud->addField([
//            'name' => 'content',
//            'label' => trans('backpack::pagemanager.content'),
//            'type' => 'wysiwyg',
//            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
//        ]);

        $this->crud->addField([   // CustomHTML
            'name' => 'banner_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Banner</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'banner_title',
            'label' => 'Banner title',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'banner_description',
            'label' => 'Banner description',
            'tupe' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'label',
            'label' => 'Url label',
            'tupe' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'url',
            'label' => 'Url',
            'tupe' => 'text',
            'fake' => true,
            'store_in' => 'extras',
            'hint' => '/some/url'
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'why_block_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Why Chose United Dental</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'why_block1',
            'label' => 'Block one title',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'why_block_text1',
            'label' => 'Block one text',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'why_block2',
            'label' => 'Block two title',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'why_block_text2',
            'label' => 'Block two text',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'why_block3',
            'label' => 'Block three title',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'why_block_text3',
            'label' => 'Block three text',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'insurance_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Insurance Coverage</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'insurance_title',
            'label' => 'Insurance title',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'insurance_text',
            'label' => 'Insurance text',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);
    }

    private function services()
    {
        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'content_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'wysiwyg',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'options_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Services list</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'options',
            'label' => 'Services',
            'type' => 'table',
            'entity_singular' => 'option', // used on the "Add X" button
            'columns' => [
                'name' => 'Name',
            ],
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'banner_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Banner</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'banner_title',
            'label' => 'Banner title',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'banner_description',
            'label' => 'Banner description',
            'tupe' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'banner_image',
            'label' => 'Banner Image',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'disk' => 'uploads',
            'fake' => true,
            'store_in' => 'extras',
        ]);
    }

    private function about()
    {
        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'content_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'wysiwyg',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'banner_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Banner</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'banner_title',
            'label' => 'Banner title',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'banner_description',
            'label' => 'Banner description',
            'tupe' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'banner_image',
            'label' => 'Banner Image',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'disk' => 'uploads',
            'fake' => true,
            'store_in' => 'extras',
        ]);
    }

    private function contact_us()
    {
        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'content_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'wysiwyg',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
        ]);
    }

    private function new_patients()
    {
        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'content_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'wysiwyg',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'image_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Image</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'image_poster',
            'label' => 'Image Poster',
            'type' => 'image',
            'crop' => true,
            'fake' => true,
            'store_in' => 'extras',
            'prefix' => 'uploads/pages/',
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'form_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Patients Form</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'pdf',
            'label' => 'Patients Form',
            'type' => 'upload',
            'upload' => true,
            'fake' => true,
            'store_in' => 'extras',
        ]);
    }
}
