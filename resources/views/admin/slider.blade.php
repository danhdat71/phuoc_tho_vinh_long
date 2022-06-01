@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sliders</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form class="wrap-box-file" id="wrap-box-file">
                        Tải lên
                        <input id="slider-input" type="file" name="images[]" multiple accept="image/*" />
                        <div class="loading"></div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Danh sách hiện có</div>
                        <div class="card-body">
                            <form action="slider" class="d-flex align-items-center">
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
                                        <th>Ẩn/Hiện</th>
                                        <th>Timestamps</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <div class="wrap-img">
                                                    <img style="width: 300px" src="{{ $item->big_img }}" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <input 
                                                    data-id="{{$item->id}}"
                                                    class="active-slider" 
                                                    style="width: 20px;height:20px" 
                                                    type="checkbox"
                                                    @if($item->status == true)
                                                    {{"checked"}}
                                                    @endif
                                                >
                                            </td>
                                            <td>
                                                <div>{{ $item->created_at }}</div>
                                                <div>{{ $item->updated_at }}</div>
                                            </td>
                                            <td>
                                                <a href="slider/{{$item->id}}/delete"
                                                    class="btn btn-sm btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pt-4">
                                {{
                                    $sliders
                                        ->appends($request)
                                        ->links("pagination::bootstrap-4")
                                }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
