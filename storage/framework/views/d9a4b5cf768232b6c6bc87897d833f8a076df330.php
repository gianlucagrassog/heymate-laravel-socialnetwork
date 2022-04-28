<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body>
<header>
    <nav> 
        <div id="logo">
       <img src="img/logo.png">
        </div>
        <div class="dx">
        <div id="links"><!-- cambiare href--->
          <a href="<?php echo e(route('home')); ?>">Home</a>
          <a href='<?php echo e(route('createpost')); ?>'>Nuovo post</a>
          <a href='<?php echo e(route('searchpeople')); ?>'>Ricerca Utenti</a>
          <a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        <?php echo e(__('Logout')); ?>>Logout</a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
       
        <img id="hey" src="<?php echo e($photo); ?>">
        <span > Hey <?php echo e($username); ?>!</span> 
        
</div>
    </nav>
    <?php echo $__env->yieldContent('wbar'); ?>
</header>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\Users\grass\Desktop\portingHeyMate\resources\views/layouts/page.blade.php ENDPATH**/ ?>