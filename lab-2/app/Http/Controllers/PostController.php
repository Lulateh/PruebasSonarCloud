<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog_post;

use App\Models\Blog_comment;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function indexJSON(){
        $posts = Blog_post::select(
            'blog_posts.id',
            'blog_posts.title',
            'blog_posts.content',
            Blog_post::raw('(SELECT COUNT(*) FROM blog_comments WHERE blog_comments.blog_posts_id = blog_posts.id) AS comments_count')
        )->get();
        return response()->json($posts);
    }
    public function showJSON($id){
        $post = Blog_post::with(['comments' => function ($query) {
                        $query->select('id', 'blog_posts_id', 'name', 'content');
                    }])
                    ->select('id', 'title', 'content')
                    ->where('id', $id)
                    ->first();

        return response()->json($post);
    }

    public function index()
    {
        //
        $posts = Blog_post::all();
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.blogEntry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Blog_post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect()->route('blog.index');  
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $post = Blog_post::find($id);
        $comments = Blog_comment::where('blog_posts_id', $id)->get();
        return view('blog.blogPage', compact('post','comments'));

/**/

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Blog_post::find($id);
        return view('blog.blogEntryEdit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = Blog_post::find($id);
        if ($post) {
             $post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
            return redirect()->route('blog.index');
    }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = Blog_post::find($id);
        $comments = Blog_comment::where('blog_posts_id', $id)->get();
        foreach ($comments as $comment) {
            $comment->delete();
        }
        $query->delete();
        return redirect()->route('blog.index');
    }
}
