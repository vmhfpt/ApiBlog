<?php $__env->startSection('content'); ?>
    <div class="content-wrapper" style="min-height: 2171.31px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e($title); ?></h3>

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
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $dataItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="<?php echo e($value->id); ?>">
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($value->title); ?></td>
                                    <td><a class="btn btn-info btn-sm" href="<?php echo e(asset('admin/tag/edit/'.$value->slug.'')); ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Sửa
                                    </a></td>
                                    <td><a data-id="<?php echo e($value->id); ?>" data-url="/admin/tag/delete" class="delete btn btn-danger btn-sm" href="javascript:;">
                                        <i class="fas fa-trash">
                                        </i>
                                        Xóa
                                    </a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <script src="<?php echo e(url('Admin/main/category.js')); ?>"> </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaraveBlog\resources\views/admin/tag/list.blade.php ENDPATH**/ ?>