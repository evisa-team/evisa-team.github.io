<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Config;

class Controller extends BaseController
{
    public $config, $lang, $langPrefix;
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->lang = Config::get('app.locale');
        $this->langPrefix = '';
        if ($this->lang == 'ar') {
            $this->langPrefix = '_ar';
        }

        $this->config = \App\Models\Admin\Config::first();
    }
}
