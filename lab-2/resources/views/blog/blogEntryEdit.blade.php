
@extends('blog.layout')
@section('content')

  <main class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8">Editar Post</h1>


    <form class="bg-white p-6 rounded-lg shadow-md" action="{{ route('blog.update', $post->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="title" class="block text-gray-700 mb-2">Título</label>
        <input value="{{ $post->title }}" type="text" id="title" class="w-full p-2 border border-gray-300 rounded-lg" required name="title">
      <div class="mb-4">
        <label for="content" class="block text-gray-700 mb-2">Contenido</label>
        <textarea id="content" class="w-full p-2 border border-gray-300 rounded-lg" rows="10" placeholder="Escribe el contenido aquí" required name="content">{{ $post->content }}</textarea>
      </div>
      <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Submit</button>
    </form>
  </main>
  
    @endsection
