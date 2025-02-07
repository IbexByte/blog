<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('welcome', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'author' => Auth::user()->name,
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Get related posts by matching similar words in the title (excluding current post)
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->where('title', 'LIKE', '%' . $post->title . '%')
            ->latest()
            ->take(3)
            ->get();

        // If no related posts found, fallback to recent posts
        if ($relatedPosts->isEmpty()) {
            $relatedPosts = Post::where('id', '!=', $post->id)
                ->latest()
                ->take(3)
                ->get();
        }
        return view('post.show', compact('post', 'relatedPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Post $post)
    {


        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // معالجة تحميل الصورة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($post->image) {
                Storage::delete($post->image);
            }

            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        // تحديث البيانات
        $post->update($validated);

        return redirect()->route('posts.show', $post)
            ->with('success', 'تم تحديث المقالة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
