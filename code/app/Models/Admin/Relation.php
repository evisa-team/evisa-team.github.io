<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Relation
 * @package App\Models\Admin
 * @version December 31, 2018, 2:15 pm +03
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string lang
 * @property string name
 */
class Relation extends Model
{
    public $table = 'relations';
    protected $appends = ['lang_name'];
    public $timestamps = false;

    public $fillable = [
        'lang',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lang' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lang' => 'required',
        'name' => 'required'
    ];

    public function getLangNameAttribute()
    {
        if ($this->lang == 'ar') {
            return 'Arabic';
        }

        return 'English';
    }
}
