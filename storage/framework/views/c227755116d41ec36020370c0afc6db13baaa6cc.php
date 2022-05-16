<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="<?php echo e(url('Admin/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo e(url('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('Admin/dist/css/adminlte.min.css')); ?>">

</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Đăng nhập</b>Admin console.log</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bạn là Vũ Minh Hùng ?</p>

                <form action="<?php echo e(route('login.admin.user')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input value="<?php echo e(old('email')); ?>" name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <?php $__errorArgs = ['email'];
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
                    <div class="input-group mb-3">
                        <input value="<?php echo e(old('password')); ?>" name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    <?php $__errorArgs = ['password'];
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
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ghi nhớ tôi
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>

                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Quên mật khẩu</a>
                </p>
                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger">
                        <strong>Cảnh báo!</strong> <?php echo Session::get('error'); ?>.
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->

    <script src="<?php echo e(url('Admin/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(url('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>


    <script src="<?php echo e(url('Admin/dist/js/adminlte.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\LaraveBlog\resources\views/admin/user/login.blade.php ENDPATH**/ ?>