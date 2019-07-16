<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
  // Require authentication before use of any actionable Post functions
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    // Get all the user_ids that any one user is following
    $users = auth()->user()->following()->pluck('profiles.user_id');

    $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(3);

    return view('posts/index', compact('posts'));
  }

  public function create()
  {
    return view('posts/create');
  }

  public function store()
  {
    $data = request()->validate([
      'caption' => 'required',
      'image' => 'required|image', // pipe notation for validating properties
    ]);
    // <validation>|<validation>|... is the Laravel way of validating properties

    $imagePath = request('image')->store('uploads', 'public');

    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
    $image->save();

    auth()->user()->posts()->create([
      'caption' => $data['caption'],
      'image' => $imagePath,
    ]);

    return redirect('/profile/'.auth()->user()->id);
  }

  public function show(\App\Post $post)
  {
    return view('posts/show', compact('post'));
  }
}
