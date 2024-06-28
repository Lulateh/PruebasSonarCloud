@extends('blog.layout')
@section('content')

  <main class="container mx-auto px-4 py-8">
    <article class="bg-white p-6 rounded-lg shadow-md">
      <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
      <p class="text-gray-700 mb-6">{{ $post->content }}</p>
      <a class="text-indigo-500 hover:text-indigo-700" href="{{ route('blog.edit',$post->id) }}">Editar</a>
    </article>
    <section class="mt-8">
    <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
      <form class="bg-white p-6 rounded-lg shadow-md mb-8" action="{{ route('comments.store') }}"  method="POST">
              @csrf
              <input type="hidden" name="blog_posts_id" value="{{ $post->id }}">
        <h3 class="text-xl font-semibold mb-4">Deja un comentario</h3>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 mb-2" >Nombre</label>
          <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Tu nombre" name="name" required value="">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 mb-2" for="content">Comentario</label>
          <textarea class="w-full p-2 border border-gray-300 rounded-lg" rows="4" placeholder="Escribe tu comentario aquí" name="content" required></textarea>
        </div>
        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Enviar</button>
      </form>
      <div class="space-y-6">
        @foreach ($comments as $comment)
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-gray-600 mb-2 font-bold">{{ $comment->name }}</p>
          <p class="text-gray-700">{{ $comment->content }}</p>
      <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
         @csrf
      @method('DELETE')
      <input type="hidden" name="blog_posts_id" value="{{ $post->id }}">
       <button class="text-red-500 hover:text-red-700 mt-4">Eliminar</button> 
     </form>
      </div>
      @endforeach  
      </div>
    </section>
  </main>

  <script>
    
  </script>

  @endsection
