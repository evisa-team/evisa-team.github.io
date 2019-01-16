<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Application;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ApplicationRepository
 * @package App\Repositories\Admin
 * @version January 9, 2019, 10:54 pm +03
 *
 * @method Application findWithoutFail($id, $columns = ['*'])
 * @method Application find($id, $columns = ['*'])
 * @method Application first($columns = ['*'])
*/
class ApplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ref_no',
        'nationality',
        'residence_country',
        'address',
        'zipcode',
        'mobile',
        'emergency_contact_person',
        'emergency_contact_number',
        'contact_person_relation_id',
        'arrival_date',
        'city',
        'state',
        'email',
        'whatsapp_number',
        'purpose_id',
        'transaction_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Application::class;
    }
}
