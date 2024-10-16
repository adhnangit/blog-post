<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * Display all the posts
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * Create new post page
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * store post data in to database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => 'pending', // default to pending
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully and is pending approval.');
    }

    /**
     * Approved post status and updated the status in to the post table
     */
    public function approve($id)
    {
        $post = Post::find($id);
        $post->status = 'approved';
        $post->save();

        return redirect()->back()->with('success', 'Post approved successfully.');
    }


    /**
     * Display admin aproved post
     */
    public function showApprovedPosts()
    {
        $posts = Post::where('status', 'approved')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display admin aproved post in to the landing page
     */
    public function showApprovedPostsLanding()
    {
        $posts = Post::where('status', 'approved')->get();
        return view('welcome', compact('posts'));
    }

}
