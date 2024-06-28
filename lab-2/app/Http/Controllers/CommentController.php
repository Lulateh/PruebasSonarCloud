<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog_comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $comment = Blog_comment::create([
            "blog_posts_id" => $request->blog_posts_id,
            "name" => $request->name,
            "content" => $request->content
        ]);

        return redirect("/blog/{$request->blog_posts_id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //
        Blog_comment::destroy($id);
        return redirect("/blog/{$request-> blog_posts_id}");
    }
}
