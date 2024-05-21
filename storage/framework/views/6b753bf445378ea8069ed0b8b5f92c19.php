<?php $__env->startSection('content'); ?>
<div class="movie-info">
    <div class="container mx-auto px-4 pt-16 flex flex-col md:flex-row">
      <!--ポスター写真-->
      <div class="flex-none">
        <?php if(isset($movie['poster_path'])): ?>
                        <img src="<?php echo e('https://image.tmdb.org/t/p/w500/'. $movie['poster_path']); ?>" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                    <?php else: ?>
                        <img src="placeholder.jpg" class="hover:opacity-50 transition ease-in-out duration-150 border-150 rounded"/>
                    <?php endif; ?>
      </div>
      <div class="md:ml-24">
         <!--レビュー投稿欄-->

          <section class="text-gray-600 body-font relative">
            <form  action="<?php echo e(route('reviews.store')); ?>" method="POST">
              <input type="hidden" name="movie_id" value="<?php echo e($movie['id']); ?>" method="POST">
              <?php echo csrf_field(); ?>
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white font-semibold">レビュー作成</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-white font-semibold">この映画に関する感想や良かった点、悪かった点について気軽に投稿してみよう！</p>
              </div>
              <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="name" class="leading-7 text-sm text-white font-semibold">お名前</label>
                      <div type="text" id="name" name="name" value="<?php echo e($user->name); ?>" class="w-full bg-white-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><?php echo e($user->name); ?>

                    </div>
                    </div>
                  </div>

                 
                  <div class="p-2 w-full">
                    <div class="relative">
                      <label for="message" class="leading-7 text-sm text-white font-semibold">レビュー内容</label>
                      <textarea id="message" name="review" class="w-full bg-white-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                  </div>
                  <div class="p-2 w-full">
                    <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">作成する</button>
                  </div>
                  <div class="p-2 w-full">
                    <a href="<?php echo e(route('movie.index')); ?>">
                      <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button>
                    </a>
                  </div>
                </form>
                
                </div>
              </div>
            </div>
          </section>

       

      
      
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/reviews/create.blade.php ENDPATH**/ ?>