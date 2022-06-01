<?php
namespace App\Services;

use App\Repositories\UtilRepository;
use App\Traits\ImageTrait;
use App\Constants\ImageConstants;
use App\Constants\Paginate;

class UtilService
{
    use ImageTrait;

    public $utilRepo = null;

    public function __construct(UtilRepository $utilRepo)
    {
        $this->utilRepo = $utilRepo;
    }

    public function store($request, $image)
    {
        $path = $this->savePublicImage(
            $image,
            "utils",
            ImageConstants::UTIL, 100,
            true,
            false
        );
        $result = $this->utilRepo->model::create([
            'name' => $request['name'],
            'number' => $request['number'],
            'status' => false,
            'big_img' => $path['big_image'],
            'thumb_img' => $path['thumb_image']
        ]);

        return $result ? true : false;
    }

    public function getAll($request)
    {
        $utils = $this->utilRepo->db()
            ->when(isset($request['order_by']), function($q) use($request) {
                $orderBy = explode('|', $request['order_by']);
                $q->orderBy($orderBy[0], $orderBy[1]);
            })
            ->when(isset($request['keyword']), function($q) use($request) {
                $q->where(function($q) use($request){
                    $q->where('number', 'like', "%" . $request['keyword'] . "%");
                    $q->orWhere('name', 'like', "%" . $request['keyword'] . "%");
                });
            })
            ->when(isset($request['status']), function($q) use($request){
                $q->when($request['status'] == "all", function($q) use($request) {
                    $q->whereIn('status', [true, false]);
                });
                $q->when($request['status'] != "all", function($q) use($request) {
                    $q->where('status', $request['status']);
                });
            })
            ->paginate($request['limit'] ?? Paginate::UTIL);

        return [
            'utils' => $utils,
            'request' => $request
        ];
    }

    public function destroy($id)
    {
        $util = $this->utilRepo->model::find($id);
        $this->deleteImage([$util->big_img, $util->thumb_img]);
        $res = $util->delete();
        return $res ? true : false;
    }

    public function show($id)
    {
        $result = $this->utilRepo->model::find($id);
        return $result ? $result : false;
    }

    public function update($request, $image)
    {
        $util = $this->utilRepo->model::find($request['id']);
        if($image){
            $this->deleteImage([$util->big_img, $util->thumb_img]);
            $path = $this->savePublicImage(
                $image,
                "utils",
                ImageConstants::UTIL, 100,
                true,
                false
            );
            $util->big_img = $path['big_image'];
            $util->thumb_img = $path['big_image'];
        }
        $util->name = $request['name'] ?? null;
        $util->status = $request['status'] ?? 0;
        $util->number = $request['number'] ?? 1;
        $res = $util->save();
        return $res ? true : false;
    }

    public function setStatus($request)
    {
        return $this->utilRepo->model::where('id', $request['id'])->update([
            'status' => $request['status']
        ]);
    }
}