<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
</head>

<body>
<div id='social'>
        </div>
        <main>
            <div id="logo">
                <img src="<?php echo e(asset('img/logo.png')); ?>">
            </div> 
            <div class='login'>
               <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div id='registrati'>
               <?php echo $__env->yieldContent('info1'); ?> <a href="<?php echo $__env->yieldContent('href'); ?>"><?php echo $__env->yieldContent('info2'); ?></a>
            </div>
        </main>  
</body>
</html>
 <!--  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form> -->

                                 <?php /**PATH C:\Users\grass\Desktop\portingHeyMate\resources\views/layouts/app.blade.php ENDPATH**/ ?>