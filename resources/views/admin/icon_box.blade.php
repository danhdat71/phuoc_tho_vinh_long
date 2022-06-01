@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý icons</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <textarea name="" id="code">{{$data['html']}}</textarea>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-12 text-right">
                    <a
                        target="_blank"
                        href="https://fontawesome.com/search?m=free&s=solid%2Cbrands"
                        class="btn btn-info"
                    >Đi lấy icon <i class="nav-icon fas fa-icons"></i></a>
                    <button id="save-icon-box" class="btn btn-info">Lưu lại <i class="fa-solid fa-floppy-disk"></i></button>
                </div>
            </div>
        </section>
    </div>
@endsection
