<?php

namespace App\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\OperationInstruction;
use \App\Http\Requests\ContactFormRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Testimonial;
use App\Models\Insurance;
use App\Models\Slider;

class PageController extends Controller
{
    public function index($slug = "home")
    {
        $page = Page::findBySlug($slug);
        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }
        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        if ($page->slug == 'home' || \Request::is('/'))
        {
            $testimonials = Testimonial::all();
            $insurances = Insurance::all();
            $sliders = Slider::all();
            $this->data['page'] = $this->data;
            return view('pages.'.$page->template, compact('page','testimonials', 'sliders', 'insurances'));
        }
        if ($page->slug == 'about-us')
        {
            $doctors = Doctor::all();
            $this->data['page'] = $this->data;
            return view('pages.'.$page->template, compact('page','doctors'));
        }
        if ($page->slug == 'new-patients')
        {
            $instrutions = OperationInstruction::all();
            $this->data['page'] = $this->data;
            return view('pages.'.$page->template, compact('page','instrutions'));
        }

        return view('pages.'.$page->template, $this->data);
    }
    public function sendmail_contact_us(ContactFormRequest $request)
    {
        Mail::send('emails.contact',
            [
                'first_name' => $request->get('name'),
                'last_name' => $request->get('surname'),
                'email' => $request->get('email'),
                'contact_message'=> $request->get('contact_message'),
            ], function($message)
            {
                $message->from(\Request::input('email'));
                $message->to(env('ADMIN_MAIL'))->subject(\Request::input('first_name'));
            });
        /*$response = [
            'status' => 'success',
            'message' => 'Mail sent successfully',
        ];
        return response()->json([$response], 200);*/
        return redirect()->back()->with('success', ['Message sent successfully']);
    }
}