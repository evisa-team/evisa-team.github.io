<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SliderImageDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSliderImageRequest;
use App\Http\Requests\Admin\UpdateSliderImageRequest;
use App\Repositories\Admin\SliderImageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SliderImageController extends AppBaseController
{
    /** @var  SliderImageRepository */
    private $sliderImageRepository;

    public function __construct(SliderImageRepository $sliderImageRepo)
    {
        $this->sliderImageRepository = $sliderImageRepo;
    }

    /**
     * Display a listing of the SliderImage.
     *
     * @param SliderImageDataTable $sliderImageDataTable
     * @return Response
     */
    public function index(SliderImageDataTable $sliderImageDataTable)
    {
        return $sliderImageDataTable->render('admin.slider_images.index');
    }

    /**
     * Show the form for creating a new SliderImage.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.slider_images.create');
    }

    /**
     * Store a newly created SliderImage in storage.
     *
     * @param CreateSliderImageRequest $request
     *
     * @return Response
     */
    public function store(CreateSliderImageRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('url')) {
            $input['url'] = customUploadFile('url', 'slider');
        } else {
            $input['url'] = '';
        }

        $sliderImage = $this->sliderImageRepository->create($input);

        Flash::success('Slider Image saved successfully.');

        return redirect(route('admin.sliderImages.index'));
    }

    /**
     * Display the specified SliderImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sliderImage = $this->sliderImageRepository->findWithoutFail($id);

        if (empty($sliderImage)) {
            Flash::error('Slider Image not found');

            return redirect(route('admin.sliderImages.index'));
        }

        return view('admin.slider_images.show')->with('sliderImage', $sliderImage);
    }

    /**
     * Show the form for editing the specified SliderImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sliderImage = $this->sliderImageRepository->findWithoutFail($id);

        if (empty($sliderImage)) {
            Flash::error('Slider Image not found');

            return redirect(route('admin.sliderImages.index'));
        }

        return view('admin.slider_images.edit')->with('sliderImage', $sliderImage);
    }

    /**
     * Update the specified SliderImage in storage.
     *
     * @param  int              $id
     * @param UpdateSliderImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSliderImageRequest $request)
    {
        $sliderImage = $this->sliderImageRepository->findWithoutFail($id);

        if (empty($sliderImage)) {
            Flash::error('Slider Image not found');

            return redirect(route('admin.sliderImages.index'));
        }

        $data = $request->all();
        if ($request->hasFile('url')) {
            $data['url'] = customUploadFile('url', 'slider');
        }
        $sliderImage = $this->sliderImageRepository->update($data, $id);

        Flash::success('Slider Image updated successfully.');

        return redirect(route('admin.sliderImages.index'));
    }

    /**
     * Remove the specified SliderImage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sliderImage = $this->sliderImageRepository->findWithoutFail($id);

        if (empty($sliderImage)) {
            Flash::error('Slider Image not found');

            return redirect(route('admin.sliderImages.index'));
        }

        $this->sliderImageRepository->delete($id);

        Flash::success('Slider Image deleted successfully.');

        return redirect(route('admin.sliderImages.index'));
    }
}
