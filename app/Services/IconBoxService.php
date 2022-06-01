<?php

namespace App\Services;

use App\Repositories\IconBoxRepository;

class IconBoxService
{
    protected $iconBoxRepo = null;

    public function __construct(IconBoxRepository $iconBoxRepo)
    {
        $this->iconBoxRepo = $iconBoxRepo;
    }

    public function getData()
    {
        return $this->iconBoxRepo->model::first();
    }

    public function updateIconBox($request)
    {
        $iconBox = $this->iconBoxRepo->model::find(1);
        $result = $iconBox->update([
            'html' => $request['html']
        ]);

        return $result ? true : false;
    }
}