<?php $__env->startSection('content'); ?>
    <div class="content-wrapper" style="min-height: 2171.31px;">
        <!-- Content Header (Page header) -->

        <section class="content">
            <?php if(Session::has('success')): ?>
            <div class="alert alert-success">
                <strong>Thành công!</strong> <?php echo Session::get('success'); ?>

              </div>
            <?php endif; ?>

            <div class="container-fluid">
                <div class="row">

                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo e($title); ?> </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="<?php echo e(route('post.admin.add')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên bài viết</label>
                                        <input value="<?php echo e(old('name')); ?>" type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nhập tên bài đăng">
                                    </div>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Cảnh báo !</strong> <?php echo e($message); ?>.
                                      </div>
                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Từ khóa Seo</label>
                                        <input value="<?php echo e(old('key_seo')); ?>" type="text" name="key_seo" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nhập từ khóa">
                                    </div>
                                    <?php $__errorArgs = ['key_seo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Cảnh báo !</strong> <?php echo e($message); ?>.
                                      </div>
                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả bài viết</label>
                                        <input value="<?php echo e(old('description')); ?>" type="text" name="description" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nhập mô tả">
                                    </div>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Cảnh báo !</strong> <?php echo e($message); ?>.
                                      </div>
                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="category_id" class="form-control">
                                           <?php $__currentLoopData = $dataCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($value->id); ?>"><?php echo e($value->title); ?></option>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thẻ tag</label>
                                        <select name="tag_id" class="form-control">
                                           <?php $__currentLoopData = $dataTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($value->id); ?>"><?php echo e($value->title); ?></option>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <textarea type="text" class="form-control" rows="5" id="content" name="content">  <?php echo e(old('content')); ?></textarea>

                                    </div>
                                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger">
                                            <strong>Lỗi !</strong> <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                    <?php $__errorArgs = ['thumb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger">
                                            <strong>Lỗi !</strong> <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
    <script src="<?php echo e(url('/Admin/ckeditor/ckeditor.js')); ?>"> </script>
    <script src="<?php echo e(url('/Admin/main/post.js')); ?>"> </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaraveBlog\resources\views/admin/post/add.blade.php ENDPATH**/ ?>