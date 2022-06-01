<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UtilService;

class UtilController extends Controller
{
    protected $utilService = null;

    public function __construct(UtilService $utilService)
    {
        $this->utilService = $utilService;
    }

    public function index(Request $request)
    {
        $result = $this->utilService->getAll($request->only('order_by', 'keyword', 'status', 'limit'));
        return view('admin.util', [
            'utils' => $result['utils'],
            'request' => $result['request']
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $result = $this->utilService->store(
            $request->only('name', 'number'),
            $request->file('image')
        );
        return $result ? redirect()->back() : $this->error400("Có lỗi từ phía backend !");
    }

    public function show($id)
    {
        $result = $this->utilService->show($id);
        return $result ? $this->success($result) : abort(Response::HTTP_NOT_FOUND);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $result = $this->utilService->update(
            $request->only('number', 'name', 'status', 'id'),
            $request->file('image')
        );

        return $result
            ? redirect()->back()
            : abort(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy($id)
    {
        $res = $this->utilService->destroy($id);
        return $res ? redirect()->back() : $this->error400("Lỗi phía backend !");
    }

    public function setStatus(Request $request)
    {
        $res = $this->utilService->setStatus($request->only('id', 'status'));
        return $res ? true : $this->error400("Lỗi từ phía máy chủ !");
    }
}
