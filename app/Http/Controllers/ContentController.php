<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContentService;

class ContentController extends Controller
{
    protected $contentService = null;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    public function index()
    {
        $result = $this->contentService->getAll();
        return view('admin.content', [
            'contents' => $result
        ]);
    }

    public function updateTitle(Request $request)
    {
        $result = $this->contentService->updateTitle($request->only('title', 'id'));
        return $result ? true : $this->error400("Lỗi từ phía máy chủ !");
    }

    public function setStatus(Request $request)
    {
        $res = $this->contentService->setStatus($request->only('id', 'status'));
        return $res ? true : $this->error400("Lỗi từ phía máy chủ !");
    }

    public function updateMainContent(Request $request)
    {
        $res = $this->contentService->updateMainContent($request->only('id', 'content'));
        return $res ? true : $this->error400("Lỗi từ phía máy chủ !");
    }

    public function updateImage(Request $request)
    {
        $res = $this->contentService->updateImage(
            $request->id,
            $request->file('image')
        );
        return $res 
            ? $this->success($res)
            : $this->error400("Lỗi từ phía máy chủ !");
    }
}
