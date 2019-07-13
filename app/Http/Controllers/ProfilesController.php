<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
  public function index($user)
  {
    $user = User::findOrFail($user);

    return view('profiles/index', [
      'user' => $user,
    ]);
  }

  public function edit(\App\User $user)
  {
    $this->authorize('update', $user->profile);

    return view('profiles/edit', compact('user'));
  }

  public function update(\App\User $user)
  {
    $this->authorize('update', $user->profile);

    $data = request()->validate([
      'title' => '',
      'bio' => 'required',
      'url' => '',
      'profile_image' => 'image',
    ]);

    auth()->user()->profile->update($data);

    return redirect("/profile/{$user->id}");

    dd($data);
  }
}

// The findOrFail line can be replaced by the \App\User automagic functionality
// The array passing can be replaced by the compact() function
