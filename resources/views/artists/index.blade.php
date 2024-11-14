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

  <table class="table-auto">
  <thead>
    <tr>
      <th>Name</th>
      <th>Sex</th>
      <th>Age</th>
      <th>Style</th>
      <th>Website</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($artists as $artist) 
    <tr>
      <td> {{ $artist->name }} </td>
      <td> {{ $artist->sex }} </td>
      <td> {{ $artist->age }} </td>
      <td> {{ $artist->style }} </td>
      <td> {{ $artist->website }} </td>
      <td> {{ $artist->still_active }} </td>
    </tr>
    @endforeach

  </tbody>
</table>

</body>
</html>