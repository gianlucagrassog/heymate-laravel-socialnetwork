<?php $__env->startSection('title',"Login"); ?> 
<?php $__env->startSection('info1',"Non sei ancora registrato?"); ?>
<?php $__env->startSection('info2',"Registrati"); ?>
<?php $__env->startSection('href'); ?>
<?php echo e(route("register")); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<form name='nome_form' action="<?php echo e(route('login')); ?>" method='post'>
    <?php echo csrf_field(); ?>
            
                <div class='inputs'>
                    <label>Nome utente <input type='text' name='username' value='<?php echo e(old("username")); ?>'> </label>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class='inputs'>
                    <label>Password <input type='password' name='password' value='<?php echo e(old("password")); ?>'></label>
                </div>
                <div class='inputs'>
                    <label>Ricordami <input type='checkbox' name='remember' value='yes'></label>
                    
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class='submit'>
                    <input type='submit' value='Accedi'>
                </div>
            </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\grass\Desktop\portingHeyMate\resources\views/auth/login.blade.php ENDPATH**/ ?>