<!DOCTYPE html>
<html lang="en" dir="ltr" >
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo e(asset('Login.css')); ?>" type="text/css" rel="stylesheet">

        <title>َLogin Admin</title>
<?php 
    if(isset($_GET['alert'])){
        $status = $_GET['alert'];

        if($status =="warning"){
            echo "<script>alert(\"SILAHKAN LOGIN TERLEBIH DAHULU\")</script>";
        }elseif($status =="wrong" ){
            echo "<script>alert(\"USERNAME ATAU PASSWORD SALAH!\")</script>";
        }
    }
    ?>
</head>
<body>
    <form method="POST" class="box" action="<?php echo e(route('admin.login.submit')); ?>">
        <?php echo csrf_field(); ?>
        <h1>Login Admin</h1>
        <div id="Login">
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div id="login">
            <input id="username" type="text" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Username" />
            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password"/>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <input type="submit" name="login" value="Login"></input>
    </form>
</body>
<?php /**PATH D:\semester 4\pratikum prognet\Prognet Kelompok 23\Prognet Kelompok 23\resources\views/auth/admin-login.blade.php ENDPATH**/ ?>