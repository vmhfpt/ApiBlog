@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper" style="min-height: 2171.31px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên </th>
                                    <th> Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Tag</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataItem  as $key => $value )
                                <tr id="{{$value->id}}">
                                    <td>{{$key + 1}}</td>
                                    <td>{{$value->title}}</td>
                                    <td> <img src="{{url($value->thumb)}}" width="90" height="90"> </td>
                                    <td>{{$value->getPostCategory->getCategory->title}}</td>
                                    <td>{{$value->getPostTag->getTag->title}}</td>
                                    <td><span class="tag tag-success">{{$value->active == 0 ? 'Chưa kích hoạt' : 'Kích hoạt'}}</span></td>
                                    <td><a class="btn btn-info btn-sm" href="{{asset('admin/post/edit/'.$value->slug.'')}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Sửa
                                    </a></td>
                                    <td><a data-id="{{$value->id}}" data-url="/admin/post/delete" class="delete btn btn-danger btn-sm" href="javascript:;">
                                        <i class="fas fa-trash">
                                        </i>
                                        Xóa
                                    </a></td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <script src="{{url('Admin/main/category.js')}}"> </script>
@endsection
