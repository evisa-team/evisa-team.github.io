<?php

namespace App\Http\Controllers;

use App\Models\Admin\Page;

class PageController extends Controller
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
    public function show($type)
    {
        $page = Page::where(['type' => $type, 'lang' => $this->lang])->first();
        if (!$page) {
            return abort(404);
        }
        
        return view('page')->with(['page' => $page, 'lang' => $this->lang, 'langPrefix' => $this->langPrefix, 'config' => $this->config]);
    }
}
