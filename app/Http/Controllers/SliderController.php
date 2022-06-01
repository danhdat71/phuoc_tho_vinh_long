<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SliderService;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index(Request $request)
    {
        $res = $this->sliderService->getWithFilter($request->only('status', 'order_by'));
        return view('admin.slider', [
            'sliders' => $res['sliders'],
            'request' => $res['request']
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $res = $this->sliderService->store($request->file('images'));
        return $res ? true : $this->error400("Lỗi từ phía máy chủ !");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function setStatus(Request $request)
    {
        $res = $this->sliderService->setStatus($request->only('id', 'status'));
        return $res ? true : $this->error400("Lỗi từ phía máy chủ !");
    }

    public function destroy($id)
    {
        $res = $this->sliderService->destroy($id);
        return $res
        ? redirect()->back()
        : $this->error400("Lỗi từ phía máy chủ !");
    }
}
