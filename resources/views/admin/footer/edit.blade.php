
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
                            <form action="{{ route('footer.admin.update', ['slug' => $dataItem->slug]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu đề chân trang</label>
                                        <input value="{{old('name') ? old('name') : $dataItem->title}}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Tiêu đề chân trang">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Cảnh báo !</strong> {{$message}}.
                                      </div>
                                      @enderror
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea type="text" class="form-control" rows="5" id="content" name="content">  {{old('content') ? old('content') : $dataItem->content}}</textarea>

                                    </div>
                                    @error('content')
                                        <div class="alert alert-danger">
                                            <strong>Lỗi !</strong> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Lưu lại</button>
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
