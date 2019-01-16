<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Faq
 * @package App\Models\Admin
 * @version December 31, 2018, 9:35 am +03
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string lang
 * @property string question
 * @property string answer
 * @property boolean sort
 * @property boolean status
 */
class Faq extends Model
{
    public $table = 'faqs';
    protected $appends = ['lang_name', 'status_name'];
    public $timestamps = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'lang',
        'question',
        'answer',
        'sort',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lang' => 'string',
        'question' => 'string',
        'answer' => 'string',
        'sort' => 'number',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lang' => 'required',
        'question' => 'required',
        'answer' => 'required',
        'sort' => 'required'
    ];

    public $statusValues = [
        '0' => 'Inactive',
        '1' => 'Active'
    ];

    public function getStatusNameAttribute()
    {
        if (!$this->status) {
            return $this->statusValues['0'];
        }

        return $this->statusValues['1'];
    }

    public function getLangNameAttribute()
    {
        if ($this->lang == 'ar') {
            return 'Arabic';
        }

        return 'English';
    }
}
