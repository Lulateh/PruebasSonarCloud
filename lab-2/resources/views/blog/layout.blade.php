<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900">

<nav class="bg-white shadow-md">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <a class="text-2xl font-bold" href="{{ route('blog.index') }}" >LAB-02-BLOG</a>
    <div class="flex items-center gap-4">
        <a class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-700" href="{{ route('blog.create') }}">Crear Post</a>
        <a class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-700" href="{{ route('blog.index') }}">atrás</a>
    </div>
  </div>
</nav>
@yield('content')
</body>
</html>