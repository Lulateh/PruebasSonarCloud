@extends('blog.layout')
@section('content')

<main class="container mx-auto px-4 py-8">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

  @foreach ($posts as $post)
    <article class="bg-white p-6 rounded-lg shadow-md flex justify-between items-start">
      <div class="truncate">
        <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
        <p class="text-gray-700 mb-4 ">{{ $post->content }}.</p>
        <a class="text-indigo-500 hover:text-indigo-700" href="{{ route('blog.show',$post->id) }}">Leer más...</a>
      </div>

       <form action="{{ route('blog.destroy',$post->id) }}" method="POST">
    
      @csrf
      @method('DELETE')
        
      <button class="text-red-500 hover:text-red-700 ml-4" type="submit">Delete</button>
      </form>

    </article>
  @endforeach

  </div>
</main>
@endsection