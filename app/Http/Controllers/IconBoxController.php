<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\IconBoxService;

class IconBoxController extends Controller
{
    protected $iconBoxService = null;

    public function __construct(IconBoxService $iconBoxService)
    {
        $this->iconBoxService = $iconBoxService;
    }

    public function index()
    {
        $result = $this->iconBoxService->getData();
        return view('admin.icon_box', [
            'data' => $result
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $result = $this->iconBoxService->updateIconBox($request->only('html'));
        return $result ? $this->success("Thành công !") : $this->error400("Có lỗi phía BE !");
    }

    public function destroy($id)
    {
        //
    }
}
