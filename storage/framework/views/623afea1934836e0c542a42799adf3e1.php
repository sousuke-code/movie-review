<?php $__env->startSection('content'); ?>
<div class="p-10">
  <h2 class="font-semibold text-center text-white mb-4 text-2xl">最近投稿されたレビュー・感想</h2>

  <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($movies[$review->movie_id]['poster_path'])): ?>
    <div
   class="flex flex-col rounded-lg bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-whitemb-10  md:flex-row mb-10
    w-full ">
    <a href="<?php echo e(route('movie.show', $review->movie_id )); ?>">
      <img
        class="w-full md:w-48 h-96 md:h-auto rounded-t-lg md:rounded-none object-contain hover:opacity-50"
        src="<?php echo e('https://image.tmdb.org/t/p/w500/'. $movies[$review->movie_id]['poster_path']); ?>"
        alt="" />
    </a>
   <div class="flex flex-col justify-start p-6">

    <div class="flex items-center mb-3">
      <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>

            <a href="<?php echo e(route('user.show', $review->user->id )); ?>">
              <h5 class="mb-2 text-xl font-medium font-semibold hover:opacity-50"><?php echo e($review->user->name); ?></h5>
            </a>

          </div>
          
              
     <p class="mb-4 text-base font-semibold text-lg">
       <?php echo e($review-> review); ?>

     </p>

       <p class="text-xs text-surface/75 dark:text-neutral-300 font-semibold ">
         <?php echo e($review-> created_at); ?>

       </p>
   </div>
 </div>
     <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   <div class="mt-4">
       <?php echo e($reviews->links()); ?>

   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/reviews/index.blade.php ENDPATH**/ ?>