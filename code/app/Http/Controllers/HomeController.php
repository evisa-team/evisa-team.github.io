<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Admin\SliderImage;
use App\Models\Admin\Country;
use App\Models\Admin\VisaType;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = SliderImage::where('lang', $this->lang)->get();
        $countries = Country::lists('country_name' . $this->langPrefix, 'country_id');
        $visaTypes = VisaType::where('lang', $this->lang)->get();
//        $about = Page::find(2);
//        $nationalChampionships = Championship::where(['championship_type' => 'national', 'lang' => $lang])->get();
//        $internationalChampionships = Championship::where(['championship_type' => 'international', 'lang' => $lang])->get();
//        $ad1 = Ad::find(1);
//        $ad2 = Ad::find(2);
//        $news = News::where('lang', $lang)->get();
//        $testimonials = Testimonial::get();
//        $sponsors = Sponsor::get();
        
        return view('home')->with(['slider' => $slider, 'lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config, 'countries' => $countries, 'visaTypes' => $visaTypes]);
    }
}
