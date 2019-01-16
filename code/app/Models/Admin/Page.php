<?php

namespace App\Models\Admin;

use Eloquent as Model;

class Page extends Model
{
    public $table = 'pages';
    protected $appends = ['description'];
    protected $timesstamps = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'content' => 'required'
    ];

    public function getDescriptionAttribute()
    {
        $output = '';
        if ($this->content) {
            $output = substr(strip_tags($this->content), 0, 80);
        }

        if ($output != $this->content) {
            $output .= '...';
        }

        return $output;
    }

    public function getLangAttribute($value = '')
    {
        if ($value == 'ar') {
            return 'Arabic';
        }

        return 'English';
    }
}
