<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Purpose;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PurposeRepository
 * @package App\Repositories\Admin
 * @version January 9, 2019, 9:37 pm +03
 *
 * @method Purpose findWithoutFail($id, $columns = ['*'])
 * @method Purpose find($id, $columns = ['*'])
 * @method Purpose first($columns = ['*'])
*/
class PurposeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lang',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Purpose::class;
    }
}
