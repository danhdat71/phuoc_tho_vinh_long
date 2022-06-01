<?php

namespace App\Services;

use App\Repositories\SliderRepository;
use App\Traits\ImageTrait;
use App\Constants\ImageConstants;
use App\Constants\Paginate;

class SliderService
{
    use ImageTrait;

    protected $sliderRepo = null;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->sliderRepo = $sliderRepo;
    }

    public function getWithFilter($request)
    {
        $sliders = $this->sliderRepo->db()
            ->when(isset($request['order_by']), function ($q) use ($request) {
                $orderBy = explode("|", $request['order_by']);
                $q->orderBy($orderBy[0], $orderBy[1]);
            })
            ->when(isset($request['status']), function($q) use($request) {
                $q->when($request['status'] == "all", function($q){
                    $q->whereIn('status', [true, false]);
                });
                $q->when($request['status'] != "all", function($q) use($request) {
                    $q->where('status', $request['status']);
                });
            })
            ->orderBy('id', 'desc')
            ->paginate($request['limit'] ?? Paginate::SLIDER);

        return [
            'sliders' => $sliders,
            'request' => $request
        ];
    }


    public function store($images)
    {
        foreach($images as $image){
            $path = $this->savePublicImage(
                $image,
                "sliders",
                ImageConstants::SLIDER, 100,
                true,
                false
            );
            $this->sliderRepo->model::create([
                'big_img' => $path['big_image'],
                'thumb_img' => $path['thumb_image']
            ]);
        }

        return true;
    }

    public function setStatus($request)
    {
        return $this->sliderRepo->model::where('id', $request['id'])->update([
            'status' => $request['status']
        ]);
    }

    public function destroy($id)
    {
        $slider = $this->sliderRepo->model::find($id);
        if($slider){
            $this->deleteImage([
                $slider->big_img,
                $slider->thumb_img
            ]);
            return $slider->delete();
        }

        return false;
    }
}
