<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\OfficePhoto;
use App\Models\PatientPhoto;
use App\Models\Testimonial;
use App\Models\Insurance;

class HomeController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        $insurances = Insurance ::all();
        return view('home.index', compact('testimonials', 'insurances'));
    }

    public function officeGallery(){
        $photos = OfficePhoto::all();
        return view('gallery.office', compact('photos'));
    }

    public function patientGallery(){
        $photos = PatientPhoto::all();
        return view('gallery.patients', compact('photos'));
    }

    public function blog(Request $request, $category){
        $blog = Article::whereHas('category', function ($query) use ($category){
            $query->where('slug', '=', $category);
            $query->orWhere('id', $category);
        })->published();
        if($request->query('tag')){
            $blog = $blog->whereHas('tags', function ($query) use ($request){
                $query->where('slug', '=', $request->query('tag'));
            });
        };
        $blog = $blog->paginate(12);
        if (!$blog->total())
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }
        return view('blog.index', compact('blog'));
    }

    public function singleBlog($category = null, $slug){
        $blog = Article::published()->where('slug',$slug)->first();
        if (!$blog)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }
        $blog = $blog->withFakes();
        return view('blog.single', compact('blog'));
    }
}
