<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
  public function index(User $user)
  {
    // $follows is true or false
    $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

    // Pre-calculate the posts, follwers, and following count for the $user with Cache support
    $postsCount = Cache::remember(
      'count.posts.'.$user->id,
      now()->addSeconds(30),
      function() use($user)
      {
        return $user->posts->count();
      }
    );

    $followersCount = Cache::remember(
      'count.followers.'.$user->id,
      now()->addSeconds(30),
      function() use($user)
      {
        return $user->profile->followers->count();
      }
    );

    $followingCount = Cache::remember(
      'count.following.'.$user->id,
      now()->addSeconds(30),
      function() use($user)
      {
        return $user->following->count();
      }
    );

    return view('profiles/index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));

    // $user = User::findOrFail($user);
    // return view('profiles/index', [
    //   'user' => $user,
    //   'follows' => $follows,
    // ]);
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
