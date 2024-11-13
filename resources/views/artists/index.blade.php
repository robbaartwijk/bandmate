<!-- resources/views/instruments/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- FIX LATERm FOR NOW USE CDN -->
  <!-- <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

  <script src="https://cdn.tailwindcss.com"></script>

  <title>Welcome to Laravel with Tailwind CSS - ARTISTS</title>
</head>
<body>
  <h1 class="text-4xl font-bold text-center text-blue-500 mt-20">Welcome to Laravel with Tailwind CSS - ARTISTS</h1>

  @foreach ($artists as $artist) 
    <div class="container mx-auto mt-10">
      <div class="grid grid-cols-12 gap-2">
        <div class="bg-gray-200">{{ $artist->name }}</div>
        <div class="bg-gray-200">{{ $artist->sex }}</div>
        <div class="bg-gray-200">{{ $artist->age }}</div>
        <div class="bg-gray-200">{{ $artist->style }}</div>
        <div class="bg-gray-200">{{ $artist->website }}</div>
        <div class="bg-gray-200">{{ $artist->still_active }}</div>
        <div class="bg-gray-200">{{ $artist->description }}</div>
      </div> 
    </div>
  @endforeach

</body>
</html>