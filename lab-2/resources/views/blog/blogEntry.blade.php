
@extends('blog.layout')
@section('content')

  <main class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8">Crear Nuevo Post</h1>

    <form class="bg-white p-6 rounded-lg shadow-md" action="{{ route('blog.store') }}"  method="POST">
      @csrf
      <div class="mb-4">
        <label for="title" class="block text-gray-700 mb-2">Título</label>
        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="title" placeholder="Título de la entrada" required>
      </div>
      <div class="mb-4">
        <label for="content" class="block text-gray-700 mb-2">Contenido</label>
        <textarea type="text" class="w-full p-2 border border-gray-300 rounded-lg" rows="10" name="content" placeholder="Escribe el contenido aquí" required ></textarea>
      </div>
      <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Publicar</button>
    </form>
  </main>

  @endsection
