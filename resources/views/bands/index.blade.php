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

  <title>Welcome to Laravel with Tailwind CSS - BANDS</title>
</head>
<body>
  <h1 class="text-4xl font-bold text-center text-blue-500 mt-20">Welcome to Laravel with Tailwind CSS - BANDS</h1>

  @foreach ($bands as $band) 
    <div class="container mx-auto mt-10">
      <div class="grid grid-cols-12 gap-2">
        <div class="bg-gray-200">{{ $band->name }}</div>
        <div class="bg-gray-200">{{ $band->number_of_members }}</div>
        <div class="bg-gray-200">{{ $band->style }}</div>
        <div class="bg-gray-200">{{ $band->rehearsal_room }}</div>
        <div class="bg-gray-200">{{ $band->website }}</div>
        <div class="bg-gray-200">{{ $band->still_active }}</div>
        <div class="bg-gray-200">{{ $band->description }}</div>
      </div> 
    </div>
  @endforeach

</body>
</html>