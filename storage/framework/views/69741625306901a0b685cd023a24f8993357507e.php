<?php $__env->startSection('title',"Create post"); ?> 
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/create_post.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/create_post.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>

        <div id="inputs" >
                 <select name="servizio">
                    <option value="deezer">Musica</option>
                    <option value="giphy">Gif</option>
                    <option value="pixabay">Foto</option>
                </select>
                <input type="text" class="textbox" name="inputstr" placeholder='Search'>
                <img class="buttonstyle" src='<?php echo e(asset('images/search.png')); ?>'>
                
        </div>   
                  <div class="titolo"></div>
        
        </section>

        
        <div id="result-view">


        </div>
        <div id="modal-view" class="hidden">
          
        </div>
        <div id="srcdosearch" url="<?php echo e(route('dosearchcontent')); ?>" class="hidden"></div>
        <div id="srcnewcontent" url="<?php echo e(route('newcontent')); ?>" class="hidden"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('wbar'); ?>
<div class="headerphoto">
  <div class="testo"> Crea un nuovo post scegliendo fra Musica e Gif<div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\grass\Desktop\UNIVERSITÀ\TERZO ANNO\DB & WEBPROGRAMMING\WEBPROGRAMMING\portingHeyMate\resources\views/createpost.blade.php ENDPATH**/ ?>