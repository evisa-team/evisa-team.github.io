<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Relation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RelationRepository
 * @package App\Repositories\Admin
 * @version December 31, 2018, 2:15 pm +03
 *
 * @method Relation findWithoutFail($id, $columns = ['*'])
 * @method Relation find($id, $columns = ['*'])
 * @method Relation first($columns = ['*'])
*/
class RelationRepository extends BaseRepository
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
        return Relation::class;
    }
}
