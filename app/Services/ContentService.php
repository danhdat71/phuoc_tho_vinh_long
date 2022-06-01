<?php

namespace App\Services;

use App\Repositories\ContentRepository;
use App\Traits\ImageTrait;
use App\Constants\ImageConstants;

class ContentService
{
    use ImageTrait;

    protected $contentRepo = null;

    public function __construct(ContentRepository $contentRepo)
    {
        $this->contentRepo = $contentRepo;
    }

    public function getAll()
    {
        return $this->contentRepo->model::all();
    }

    public function updateTitle($request)
    {
        $content = $this->contentRepo->model::find($request['id']);
        $res = $content->update([
            'title' => $request['title']
        ]);
        return $res ? true : false;
    }

    public function setStatus($request)
    {
        return $this->contentRepo->model::where('id', $request['id'])->update([
            'status' => $request['status']
        ]);
    }

    public function updateMainContent($request)
    {
        return $this->contentRepo->model::where('id', $request['id'])->update([
            'content' => $request['content']
        ]);
    }

    public function updateImage($id, $image)
    {
        $content = $this->contentRepo->model::find($id);
        $this->deleteImage([$content->big_img, $content->thumb_img]);
        $path = $this->savePublicImage(
            $image,
            "contents",
            ImageConstants::CONTENT,
            100,
            true,
            false
        );
        $result = $content->update([
            'big_img' => $path['big_image'],
            'thumb_img' => $path['thumb_image']
        ]);

        return $result ? $path['big_image'] : false;
    }
}