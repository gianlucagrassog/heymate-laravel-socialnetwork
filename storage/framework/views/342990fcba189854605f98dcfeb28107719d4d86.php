<?php $__env->startSection('title',"Signup"); ?> 
<?php $__env->startSection('info1',"Sei già registrato?"); ?>
<?php $__env->startSection('info2',"Torna al login"); ?>
<?php $__env->startSection('href'); ?>
<?php echo e(route("login")); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<form name='nome_form' method='post' action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>            

                <div class='forminputs'>
                <div class='inputs'>
                <label>Nome utente <input class='username' type='text' name='username' value='<?php echo e(old("username")); ?>' verifyUsername="<?php echo e(route('verifica_username')); ?>">
                    </label>
                    <div class='erroreusername errore hidden'>Username già esistente</div>
            
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
                    <label>Nome <input type='text' name='name' value='<?php echo e(old("name")); ?>'></label>
                    <?php $__errorArgs = ['name'];
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
                    <label>Cognome<input type='text' name='surname' value='<?php echo e(old("surname")); ?>'></label>
                <?php $__errorArgs = ['surname'];
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
                    <label>Password <input type='password' name='password'></label> 
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
                <div class='inputs'>
                    <label>Conferma password <input type='password' name='password_confirmation'></label>
                   
                </div>
                <div class='inputs'>
                    <label>Email <input type='text' name='email' value='<?php echo e(old("email")); ?>'></label>
                     <?php $__errorArgs = ['email'];
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
                    <label id='ciao'>Immagine profilo<input type='file' name='photo'></label>
                    <?php $__errorArgs = ['photo'];
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
            </div>
                <div class='submit'>
                    <input type='submit' value="Registrati">
                </div>
            </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/signup.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\grass\Desktop\UNIVERSITÀ\TERZO ANNO\DB & WEBPROGRAMMING\WEBPROGRAMMING\portingHeyMate\resources\views/auth/register.blade.php ENDPATH**/ ?>