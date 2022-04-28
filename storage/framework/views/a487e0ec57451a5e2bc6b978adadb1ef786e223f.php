<?php $__env->startSection('title',"Search People"); ?> 
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/searchpeople.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/search_people.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section >
            <div>
              <div class='inputs'>
                <input type="text" class="textbox" placeholder='Search'> 
                <img class="buttonstyle" src='<?php echo e(asset('images/search.png')); ?>'>
               </div>
               
                
               <div class='results' >
                   
               </div>
        </section>
      <div id="publicroutes" class="hidden">
        <div id="srcpeople" url="<?php echo e(route('searchp')); ?>" class="hidden"></div>
        <div id="srcfollow" url="<?php echo e(route('follow')); ?>" class="hidden"></div>
        <div id="srcunfollow" url="<?php echo e(route('unfollow')); ?>" class="hidden"></div>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('wbar'); ?>
    <div class="headerphoto"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\grass\Desktop\portingHeyMate\resources\views/searchpeople.blade.php ENDPATH**/ ?>