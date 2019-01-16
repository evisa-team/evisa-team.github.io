<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class SliderImage
 * @package App\Models\Admin
 * @version January 9, 2019, 9:54 pm +03
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string lang
 * @property string text
 * @property string type
 * @property string url
 */
class SliderImage extends Model
{
    public $table = 'slider_images';
    protected $appends = ['lang_name'];
    public $timestamps = false;

    public $fillable = [
        'lang',
        'text',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lang' => 'string',
        'text' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lang' => 'required',
        'url' => 'required'
    ];

    public function getLangNameAttribute()
    {
        if ($this->lang == 'ar') {
            return 'Arabic';
        }

        return 'English';
    }
}
