@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tiện ích</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form action="util" method="post" enctype="multipart/form-data" class="pb-3" id="wrap-box-file">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Số thứ tự</label>
                                    <input type="text" class="form-control" name="number">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Tiêu đề</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">File</label>
                                    <input class="form-control input-image" type="file" name="image" accept="image/*" />
                                </div>
                            </div>
                            <div
                                class="col-lg-12 pb-2"
                                style="width:100%;max-height:400px;"
                            >
                                <img
                                    class="preview-image"
                                    src=""
                                    style="width: 100%;height: 100%;object-fit:cover"
                                >
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-sm btn-info w-100">Tạo mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Danh sách hiện có</div>
                        <div class="card-body">
                            <form action="util" method="get" class="d-flex align-items-center">
                                <div class="form-group mr-2">
                                    <label for="">Tìm kiếm</label>
                                    <input type="text" name="keyword" class="form-control">
                                </div>
                                <div class="form-group mr-2">
                                    <label for="">Trạng thái</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="all">Tất cả</option>
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <div class="form-group mr-2">
                                    <label for="">Sắp xếp</label>
                                    <select name="order_by" class="form-control">
                                        <option value="id|desc">Mới nhất</option>
                                        <option value="id|asc">Cũ nhất</option>
                                        <option value="status|desc">Hiện trước</option>
                                        <option value="status|asc">Ẩn trước</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button
                                        style="transform: translateY(15px)"
                                        class="btn btn-info"
                                    >
                                        <i class="fas fa-filter"></i>
                                    </button>
                                </div>
                            </form>
                            <table id="main-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="image">Ảnh</th>
                                        <td>Number | Name</td>
                                        <th>Ẩn/Hiện</th>
                                        <th>Timestamps</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($utils as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <div
                                                style="width: 200px;height: 150px;"
                                            >
                                                <img
                                                    style="width:100%;height:100%;object-fit:cover"
                                                    src="{{$item->thumb_img}}"
                                                    alt=""
                                                >
                                            </div>
                                        </td>
                                        <td>
                                            <div>{{$item->number}}</div>
                                            <div>{{$item->name}}</div>
                                        </td>
                                        <td>
                                            <input
                                                data-id="{{$item->id}}"
                                                style="width:20px;height:20px"
                                                type="checkbox"
                                                @if($item->status == true)
                                                {{"checked"}}
                                                @endif
                                                class="util-status"
                                            >
                                        </td>
                                        <td>
                                            <div>{{$item->created_at}}</div>
                                            <div>{{$item->updated_at}}</div>
                                        </td>
                                        <td>
                                            <button
                                                data-toggle="modal" data-target="#editModal"
                                                class="btn btn-sm btn-warning edit-util"
                                                data-id="{{$item->id}}"
                                            >Edit</button>
                                            <a class="btn btn-sm btn-danger" href="util/{{$item->id}}/delete">Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pt-4">
                                {{
                                    $utils
                                        ->appends($request)
                                        ->links("pagination::bootstrap-4")
                                }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="editModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 900px">
                <form action="util/update" method="post" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Number</label>
                            <input type="text" class="form-control" name="number" id="number">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh</label>
                            <input class="input-image-util" type="file" accept="image/*" name="image">
                            <div
                                class="wrap-img"
                                style="width: 100%;max-height:200px;overflow:hidden"
                            >
                                <img
                                    class="preview-image-util"
                                    src=""
                                    style="width:100%;height:100%;object-fit:cover"
                                    id="util-image"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
