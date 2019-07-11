<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
  // Require authentication before use of any actionable Post functions
  public function __construct()
  {
    $this->middleware('auth');
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

    auth()->user()->posts()->create([
      'caption' => $data['caption'],
      'image' => $imagePath,
    ]);

    return redirect('/profile/'.auth()->user()->id);
  }
}
