<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
   </head>

  <body class="bg-gray-800">
   <nav class="bg-gray-900 border-b border-gray-700">
    <div class="container mx-auto px-2">
      <div class="relative flex h-16 items-center justify-between">
       
       </div>
    </div>
   </nav>
    
@yield('content')
   </body>
</html>