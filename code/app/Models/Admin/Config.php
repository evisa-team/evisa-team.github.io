<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Config
 * @package App\Models\Admin
 * @version January 12, 2019, 10:18 am +03
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string title
 * @property string title_ar
 * @property string description
 * @property string tags
 * @property string facebook_url
 * @property string twitter_url
 * @property string phone
 * @property string fax
 * @property string email
 * @property string location
 * @property string location_ar
 */
class Config extends Model
{
    public $table = 'config';
    public $timestamps = false;

    public $fillable = [
        'title',
        'title_ar',
        'description',
        'tags',
        'facebook_url',
        'twitter_url',
        'phone',
        'fax',
        'email',
        'location',
        'location_ar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'title_ar' => 'string',
        'description' => 'string',
        'tags' => 'string',
        'facebook_url' => 'string',
        'twitter_url' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'email' => 'string',
        'location' => 'string',
        'location_ar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
