<?php

namespace App\Repositories\Admin;

use App\Models\Admin\VisaType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VisaTypeRepository
 * @package App\Repositories\Admin
 * @version December 31, 2018, 11:49 am +03
 *
 * @method VisaType findWithoutFail($id, $columns = ['*'])
 * @method VisaType find($id, $columns = ['*'])
 * @method VisaType first($columns = ['*'])
*/
class VisaTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lang',
        'title',
        'type',
        'validity',
        'processing_time',
        'cost',
        'sort'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VisaType::class;
    }
}
