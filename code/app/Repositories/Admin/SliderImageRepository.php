<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SliderImage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SliderImageRepository
 * @package App\Repositories\Admin
 * @version January 9, 2019, 9:54 pm +03
 *
 * @method SliderImage findWithoutFail($id, $columns = ['*'])
 * @method SliderImage find($id, $columns = ['*'])
 * @method SliderImage first($columns = ['*'])
*/
class SliderImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lang',
        'text',
        'url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SliderImage::class;
    }
}
