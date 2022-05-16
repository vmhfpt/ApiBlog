@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper" style="min-height: 2171.31px;">
        <!-- Content Header (Page header) -->

        <section class="content">
            @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>Thành công!</strong> {!! Session::get('success') !!}
              </div>
            @endif

            <div class="container-fluid">
                <div class="row">

                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }} </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('post.admin.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên bài viết</label>
                                        <input value="{{old('name')}}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nhập tên bài đăng">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Cảnh báo !</strong> {{$message}}.
                                      </div>
                                      @enderror
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Từ khóa Seo</label>
                                        <input value="{{old('key_seo')}}" type="text" name="key_seo" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nhập từ khóa">
                                    </div>
                                    @error('key_seo')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Cảnh báo !</strong> {{$message}}.
                                      </div>
                                      @enderror
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả bài viết</label>
                                        <input value="{{old('description')}}" type="text" name="description" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nhập mô tả">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Cảnh báo !</strong> {{$message}}.
                                      </div>
                                      @enderror
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="category_id" class="form-control">
                                           @foreach ($dataCategory as $value)
                                           <option value="{{$value->id}}">{{$value->title}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thẻ tag</label>
                                        <select name="tag_id" class="form-control">
                                           @foreach ($dataTag as $value)
                                           <option value="{{$value->id}}">{{$value->title}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thuộc bài đăng</label>
                                        <select name="parent_id" class="form-control">

                                           <option value="0">-- Danh mục cha --</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea type="text" class="form-control" rows="5" id="content" name="content">  {{ old('content') }}</textarea>

                                    </div>
                                    @error('content')
                                        <div class="alert alert-danger">
                                            <strong>Lỗi !</strong> {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input name="active" type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">
                                                Trạng thái kích hoạt
                                            </label>
                                        </div>
                                    </div>
                                    <div class="custom-file">

                                        <input accept="image/*" name="thumb[]" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Chọn một ảnh đại diện bài đăng</label>
                                    </div> <br /> <br />
                                    @error('thumb')
                                        <div class="alert alert-danger">
                                            <strong>Lỗi !</strong> {{ $message }}
                                        </div>
                                    @enderror
                                    <img id="imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png"
                                        style="margin-top : 30px" class="rounded" width="304" height="236">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </form>
                        </div>


                        <div class="col-md-6">

                        </div>

                    </div>

                </div>
        </section>

    </div>
    <script src="{{url('/Admin/ckeditor/ckeditor.js')}}"> </script>
    <script src="{{url('/Admin/main/post.js')}}"> </script>
@endsection
