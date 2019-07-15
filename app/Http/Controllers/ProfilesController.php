<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
    // $imagePath = null;

    $this->authorize('update', $user->profile);

    $data = request()->validate([
      'title' => '',
      'bio' => '',
      'url' => '',
      'profile_image' => 'image',
    ]);

    if(request('profile_image'))
    {
      $imagePath = request('profile_image')->store('profile', 'public');

      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
      $image->save();

      $imgArr = ['profile_image' => $imagePath];
    }

    auth()->user()->profile->update(array_merge(
      $data,
      $imgArr ?? [],
    ));

    return redirect("/profile/{$user->id}");
  }
}

// The findOrFail line can be replaced by the \App\User automagic functionality
// The array passing can be replaced by the compact() function
