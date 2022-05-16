<?php $__env->startSection('content'); ?>
    <div class="content-wrapper" style="min-height: 2171.31px;">
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
                      <h3 class="card-title"><?php echo e($title); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo e(route('tag.admin.update', ['slug' => $dataItem->slug])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thẻ tag</label>
                                <input type="text" value="<?php echo e(old('name') ? old('name') : $dataItem->title); ?>" name="name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nhập tên thẻ tag">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaraveBlog\resources\views/admin/tag/edit.blade.php ENDPATH**/ ?>