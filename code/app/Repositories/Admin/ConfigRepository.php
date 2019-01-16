<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Config;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConfigRepository
 * @package App\Repositories\Admin
 * @version January 12, 2019, 10:18 am +03
 *
 * @method Config findWithoutFail($id, $columns = ['*'])
 * @method Config find($id, $columns = ['*'])
 * @method Config first($columns = ['*'])
*/
class ConfigRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Config::class;
    }
}
