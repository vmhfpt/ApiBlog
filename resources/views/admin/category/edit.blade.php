@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper" style="min-height: 2171.31px;">
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
                      <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.admin.update', ['slug' => $dataItem->slug]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{{old('name') ? old('name') : $dataItem->title}}" name="name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            @error('name')
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Cảnh báo !</strong> {{$message}}.
                              </div>
                              @enderror
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">-- Danh mục cha --</option>
                                   @foreach ($listCategory as $value)
                                   <option {{$value->id == $dataItem->parent_id ? 'selected': ''}} value="{{$value->id}}">{{$value->title}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input {{$dataItem->active == 1 ? 'checked': ''}} name="active" type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">
                                        Trạng thái kích hoạt
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                  </div>
                  <!-- /.card -->
                  </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->


              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
    </div>
@endsection
