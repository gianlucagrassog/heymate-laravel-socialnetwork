<?php $__env->startSection('title',"Home "); ?> 
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/home.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/post.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
    <article>
        
    </article>
</section>

<div id="modal-view" class="hidden">

</div>


<div id="srcpost" url="<?php echo e(route('getpost')); ?>" class="hidden"></div>
<div id="srclike" url="<?php echo e(route('like')); ?>" class="hidden"></div>
<div id="srcdislike" url="<?php echo e(route('dislike')); ?>" class="hidden"></div>
<div id="srcuserslike" url="<?php echo e(route('userslike')); ?>" class="hidden"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('wbar'); ?>
<div id="wbar">

    </div>
            <div id="utente">
            <img src="<?php echo e($photo); ?>">
            
            <div><?php echo e($nome); ?>&nbsp;<?php echo e($cognome); ?></div> 
    </div>

    <div id="follower"> <div class="count">Follower<div><?php echo e($follower); ?></div></div> <div class="count">Seguiti<div><?php echo e($seguiti); ?></div></div> </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\grass\Desktop\UNIVERSITÀ\TERZO ANNO\DB & WEBPROGRAMMING\WEBPROGRAMMING\portingHeyMate\resources\views/home.blade.php ENDPATH**/ ?>