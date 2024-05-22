<?php $__env->startSection('content'); ?>

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 text-white font-semibold">Film Sercher 
        <br >
      </h1>
      <p class="mb-8 leading-relaxed text-white font-semibold">最近公開されたサイトから、過去に公開されていたサイトまではバイ広いジャンルの映画を検索することができます。また、自身のこれまでに見た映画を管理したり、レビューを投稿・作成することができます。Film Sercherを使い、新たな映画を発見していこう!</p>
      <div class="flex justify-center">

       
      <?php if(Route::has('login')): ?>
        <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(url('/dashboard')); ?>">
          <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">始める</button>
        </a>

      <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">
          <button class="ml-4 inline-flex text-white bg-indigo-500  border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">ログインする</button>
        </a>
      <?php if(Route::has('register')): ?>
       <a href="<?php echo e(route('register')); ?>">
       <button class="ml-4 inline-flex text-white bg-indigo-500  border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">会員登録する</button>
       </a>
      <?php endif; ?> 
      <?php endif; ?>
    <?php endif; ?>



      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <img class="object-cover object-center rounded" alt="hero" src="<?php echo e(asset('images/app-img.png')); ?>">
    </div>
  </div>
</section>


<section class="text-white font-semibold body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="text-center mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-white font-semibold mb-4">このサイトでできること</h1>
      
      <div class="flex mt-6 justify-center">
        <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
      </div>
    </div>

    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
      <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
          </svg>
        </div>
        <div class="flex-grow">
          <h2 class="text-white font-semibold text-lg title-font font-medium mb-3">映画の検索・ランキング</h2>
          <p class="leading-relaxed text-base">上映中の映画や、人気作品を一覧することが出ます。また、検索欄から詳細が知りたい映画の詳細を閲覧、お気に入り登録することができます。</p>
          
        </div>
      </div>
      <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
            <circle cx="6" cy="6" r="3"></circle>
            <circle cx="6" cy="18" r="3"></circle>
            <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
          </svg>
        </div>
        <div class="flex-grow">
          <h2 class="text-white font-semibold text-lg title-font font-medium mb-3">映画の詳細表示</h2>
          <p class="leading-relaxed text-base">映画のあらすじやキャスト情報・上映時間など閲覧することができます。</p>
         
        </div>
      </div>

      <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <div class="flex-grow">
          <h2 class="text-white font-semibold text-lg title-font font-medium mb-3">マイページ</h2>
          <p class="leading-relaxed text-base">会員登録をすることでマイページを作成することができ、マイページ上でお気に入り登録や、レビューの投稿を行うことができます。</p>
        </div>
      </div>
    </div>
    
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/login/index.blade.php ENDPATH**/ ?>