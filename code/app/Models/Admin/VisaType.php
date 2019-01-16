<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class VisaType
 * @package App\Models\Admin
 * @version December 31, 2018, 11:49 am +03
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string lang
 * @property string title
 * @property string type
 * @property string validity
 * @property string processing_time
 * @property string cost
 * @property boolean sort
 */
class VisaType extends Model
{
    public $table = 'visa_types';
    protected $appends = ['lang_name'];
    public $timestamps = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'lang',
        'title',
        'type',
        'validity',
        'stay_validity',
        'processing_time',
        'cost',
        'sort'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lang' => 'string',
        'title' => 'string',
        'type' => 'string',
        'validity' => 'string',
        'stay_validity' => 'string',
        'processing_time' => 'string',
        'cost' => 'integer',
        'sort' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lang' => 'required',
        'title' => 'required',
        'type' => 'required',
        'validity' => 'required',
        'stay_validity' => 'required',
        'processing_time' => 'required',
        'cost' => 'required',
        'sort' => 'required'
    ];

    public function getLangNameAttribute()
    {
        if ($this->lang == 'ar') {
            return 'Arabic';
        }

        return 'English';
    }
}
