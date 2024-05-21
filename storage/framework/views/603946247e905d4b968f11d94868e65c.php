<?php $__env->startSection('content'); ?>
   <div class="container mx-auto px-4 pt-16">

      <div class="popular-movie">
        <h2 class="capitalize text-white text-lg font-semibold">人気の映画</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 gap-8">
          <?php $__currentLoopData = $popularMovie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->index < 16): ?>
            <div class="mt-8 relative">
                <a href="<?php echo e(route('movie.show', $movie['id'] )); ?>">
                  <img src="<?php echo e('https://image.tmdb.org/t/p/w500/'. $movie['poster_path']); ?>" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                </a>
                <span class="ml-3 mt-3 border-2 border-sky-500 rounded-full w-8 h-8 text-center absolute top-0 left-0 text-white font-semibold text-sm  flex justify-center items-center">
                  <?php echo e(floor($movie['vote_average'] * 10)); ?> <small class="text-xs">%</small>
                </span>
                <div class="mt-2">
                  <a href="#" class="text-md pt-4 text-white font-semibold hover:text-yellow-500"> <?php echo e($movie['original_title']); ?></a>
                  <div class="flex items-center text-gray-400 text-sm"> 
                      <span><?php echo e($movie['release_date']); ?></span>
                  </div>
                </div>
            </div>
            <?php endif; ?> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div class="popular-movie pb-6">
        <h2 class="capitalize text-white text-lg font-semibold">公開予定の映画</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 gap-8">
          <?php $__currentLoopData = $upcomingMovie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->index< 16 ): ?>
            <div class="mt-8 relative">
                <a href="<?php echo e(route('movie.show', $movie['id'] )); ?>">
                  <img src="<?php echo e('https://image.tmdb.org/t/p/w500/'. $movie['poster_path']); ?>" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                </a>
                <span class="ml-3 mt-3 border-2 border-sky-500 rounded-full w-8 h-8 text-center absolute top-0 left-0 text-white font-semibold text-sm  flex justify-center items-center">
                  <?php echo e(floor($movie['vote_average'] * 10)); ?> <small class="text-xs">%</small>
                </span>
                <div class="mt-2">
                  <a href="#" class="text-md pt-4 text-white font-semibold hover:text-yellow-500"> <?php echo e($movie['original_title']); ?></a>
                  <div class="flex items-center text-gray-400 text-sm"> 
                      <span><?php echo e($movie['release_date']); ?></span>
                  </div>
                </div>
            </div>
            <?php endif; ?> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/movie/index.blade.php ENDPATH**/ ?>