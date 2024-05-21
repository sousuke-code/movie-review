<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
   </head>

   <body class="bg-gray-800">
   <nav class="bg-gray-900 border-b border-gray-700">
  <div class="container mx-auto px-2">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
        <span class="absolute -inset-0.5"></span>
        <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.
            
            Menu open: "hidden", Menu closed: "block"
          -->
            
            <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
         
          </button>
        <!-- Mobile menu button-->
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            
            <a href="<?php echo e(route('movie.index')); ?>" class=" text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">ランキング</a>
            <a href="<?php echo e(route('movie.reserch')); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">映画検索</a>
            <a href="<?php echo e(route('user.mypage')); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">マイページ</a>
            <a href="<?php echo e(route('reviews.index')); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">レビューリスト</a>
           
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
       

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
             <a href="<?php echo e(route('user.mypage')); ?>" >
              <!-- <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>

              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->

              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-8 w-8 rounded-full bg-gray-100" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </a >
            
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="<?php echo e(route('movie.index')); ?>" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">ランキング</a>
      <a href="<?php echo e(route('movie.reserch')); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">映画検索</a>
      <a href="<?php echo e(route('user.mypage')); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">マイページ</a>
      <a href="<?php echo e(route('reviews.index')); ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">レビューリスト</a>
    </div>
  </div>
</nav>
    
<?php echo $__env->yieldContent('content'); ?>
   </body>
</html><?php /**PATH /var/www/html/resources/views/layout/app.blade.php ENDPATH**/ ?>