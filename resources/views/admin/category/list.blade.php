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
                                    <th>Danh mục cha</th>
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
                                    <td>{{is_null($value->getParent) ? 'Danh mục cha' : $value->getParent->title}}</td>
                                    <td><span class="tag tag-success">Kích hoạt</span></td>
                                    <td><a class="btn btn-info btn-sm" href="{{asset('admin/category/edit/'.$value->slug.'')}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Sửa
                                    </a></td>
                                    <td><a data-id="{{$value->id}}" data-url="/admin/category/delete" class="delete btn btn-danger btn-sm" href="javascript:;">
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
