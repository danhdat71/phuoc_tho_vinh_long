@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý nội dung</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                @foreach($contents as $item)
                <div class="col-12">
                    <div class="row">
                        <div class="col-10">
                            <input
                                data-id="{{$item->id}}"
                                type="text"
                                class="form-control content-title"
                                value="{{$item->title}}"
                            >
                        </div>
                        <div class="col-2">
                            <label for="checkbox{{$item->id}}">Ẩn/hiện</label>
                            <input
                                class="content-status"
                                data-id="{{$item->id}}"
                                style="width:20px;height:20px"
                                type="checkbox"
                                id="checkbox{{$item->id}}"
                                @if($item->status)
                                {{"checked"}}
                                @endif
                            >
                        </div>
                        <div class="col-12">
                            <input  
                                data-id="{{$item->id}}"
                                type="file"
                                name="image"
                                class="content-image form-control"
                                accept="image/*"
                            >
                            <div class="w-100" style="height: 200px">
                                <img
                                    style="width: 100%;height:100%;object-fit:cover"
                                    class="w-50"
                                    src="{{$item->thumb_img}}"
                                    alt=""
                                >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea
                            id="editor{{$item->id}}"
                            class="main-content"
                            name="editor{{$item->id}}"
                            data-id="{{$item->id}}"
                        >
                            {{$item->content}}
                        </textarea>
                    </div>
                </div>
                <br>
                <hr>
                @endforeach
            </div>
        </section>
        <script>
            window.addEventListener('DOMContentLoaded', function(){
                for(let i = 0; i<6; i++){
                    CKEDITOR.replace(`editor${i+1}`);
                }
            });
        </script>
    </div>
@endsection