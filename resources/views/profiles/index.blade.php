@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-3 p-5">
        <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
      </div>
      <div class="col-9 p-5">

        <!-- Main Items -->
        <div class="d-flex justify-content-between align-items-baseline">
          <h1 class="d-flex">

            <!-- Username -->
            {{$user->username}}

            <!-- Edit Profile Gear -->
            @can('update', $user->profile)
              <a href="/profile/{{$user->id}}/edit" class="pl-2">
                <img src="/storage/png/edit_profile_gear.png" style="max-height: 25px;">
              </a>
            @endcan

            <!-- Follow/Unfollow Button -->
            @cannot('update', $user->profile)
              <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
            @endcan
          </h1>

          <!-- Add New Post Link -->
          @can('update', $user->profile)
            <a href="/p/create">Add New Post</a>
          @endcan
        </div>

        <!-- Social Media Details -->
        <div class="d-flex py-2">
          <div class="pr-5 "> <strong>{{$user->posts->count()}}</strong> {{$user->posts->count() == 1 ? "post" : "posts"}} </div>
          <div class="pr-5 "> <strong>{{$user->profile->followers->count()}}</strong> {{$user->profile->followers->count() == 1 ? "follower" : "followers"}} </div>
          <div class="pr-5 "> <strong>{{$user->following->count()}}</strong> following </div>
        </div>

        <!-- Profile Details -->
        <div class=""> <strong>{{$user->profile->title ?? 'No Biography Title'}}</strong> </div>
        <div class="">{{$user->profile->bio ?? 'No Biography'}}</div>
        <div class=""><strong><a href="#">{{$user->profile->url ?? 'No personal website'}}</a></strong></div>

      </div>
    </div>

    <!-- Posts -->
    <div class="row pt-5">
      <?php foreach ($user->posts as $post): ?>
        <div class="col-4 pb-4">
          <a href="/p/{{$post->id}}">
            <img src="/storage/{{$post->image}}" class="w-100">
          </a>
        </div>
      <?php endforeach; ?>
    </div>

</div>

@endsection
