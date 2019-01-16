<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    public $table = 'applications';
    protected $appends = ['status_name', 'marital_status_name'];
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $guarded = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public $statusValues = ['New', 'Approved', 'Rejected', 'Completed', 'Delivered'];
    public $religionValues = ['Unknown', 'ISLAM', 'CHRISTIAN', 'HINDU', 'BUDDHISM', 'SIKH', 'KAD IANI', 'BAHAI', 'JUDAISM', 'ZOROASTRIAN'];
    public $maritalValues = ['Single', 'Married', 'Divorced', 'Widow', 'Deceased', 'Unspecific', 'Child'];

    public function residenceCountry()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'residence_country');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'nationality', 'country_id');
    }

    public function getStatusNameAttribute()
    {
        if (!$this->status) {
            return $this->statusValues['0'];
        }

        return $this->statusValues[$this->status];
    }

    public function getReligionNameAttribute()
    {
        if (!$this->religion) {
            return $this->religionValues['0'];
        }

        return $this->religionValues[$this->religion];
    }
    
    public function getMaritalStatusNameAttribute()
    {
        if (!$this->marital_status) {
            return $this->maritalValues['0'];
        }

        return $this->maritalValues[$this->marital_status];
    }
}
