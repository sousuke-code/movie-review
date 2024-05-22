<?php $__env->startSection('content'); ?>

<div class="py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-6 flex items-end justify-between gap-4">

      <h2 class="text-2xl font-bold font-semibold text-white lg:text-3xl sm:text-l"><?php echo e($user-> name); ?> のお気に入り登録映画一覧</h2>

      </div>
  </div>
</div>

<div class="container mx-auto px-4 pt-16">
    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 gap-8">
    <?php if(isset($movies)): ?>
        <?php if(count($movies) > 0): ?>
           
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="mt-8 relative">
                <a href="<?php echo e(route('movie.show', $movie['id'] )); ?>">
                  <img src="<?php echo e('https://image.tmdb.org/t/p/w500/'. $movie['poster_path']); ?>" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                </a>
                <span class="ml-3 mt-3 border-2 border-yellow-500 rounded-full w-8 h-8 text-center absolute top-0 left-0 text-white font-semibold text-sm  flex justify-center items-center">
                  <?php echo e($movie['vote_average'] * 10); ?> <small class="text-xs">%</small>
                </span>
                <div class="mt-2">
                  <a href="#" class="text-md pt-4 text-white font-semibold hover:text-yellow-500"> <?php echo e($movie['original_title']); ?></a>
                  <div class="flex items-center text-gray-400 text-sm"> 
                      <span><?php echo e($movie['release_date']); ?></span>
                  </div>
                </div>
            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php else: ?>
                <p class="mx-auto text-center font-semibold text-white">No results found.</p>
                <?php endif; ?>
            <?php endif; ?>
            </div>
        </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/users/index.blade.php ENDPATH**/ ?>