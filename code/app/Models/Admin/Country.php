<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Country
 * @package App\Models\Admin
 * @version December 30, 2018, 10:34 pm +03
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string country_name
 * @property string country_name_ar
 * @property string country_iso_code
 * @property string country_isd_code
 */
class Country extends Model
{
    public $table = 'countries';
    public $timestamps = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'country_id';

    public $fillable = [
        'country_name',
        'country_name_ar',
        'country_iso_code',
        'country_isd_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'country_id' => 'integer',
        'country_name' => 'string',
        'country_name_ar' => 'string',
        'country_iso_code' => 'string',
        'country_isd_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_name' => 'required',
        'country_name_ar' => 'required',
        'country_iso_code' => 'required',
        'country_isd_code' => 'required'
    ];

    
}
