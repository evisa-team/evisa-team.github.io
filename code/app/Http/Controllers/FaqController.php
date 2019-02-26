<?php

namespace App\Http\Controllers;

use App\Models\Admin\Faq;

class FaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::where(['lang' => $this->lang, 'status' => 1])->orderBy('sort', 'asc')->get();
        $page_title = trans('website.faq');

        return view('faq')->with(['faqs' => $faqs, 'page_title' => $page_title, 'lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
    }
}
