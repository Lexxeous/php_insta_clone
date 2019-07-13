@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-3 p-5">
        <img src="https://scontent-atl3-1.cdninstagram.com/vp/a67a299e0ec566398230a95489b39152/5DB5125D/t51.2885-19/s150x150/36967469_453622505113239_5983831497159737344_n.jpg?_nc_ht=scontent-atl3-1.cdninstagram.com" class="rounded-circle">
      </div>
      <div class="col-9 p-5">

        <!-- Main Items -->
        <div class="d-flex justify-content-between align-items-baseline">
          <h1>
            {{$user->username}}
            @can('update', $user->profile)
              <a href="/profile/{{$user->id}}/edit">
                <img src="/png/edit_profile_gear.png" style="max-height: 25px;">
              </a>
            @endcan
          </h1>
          <a href="/p/create">Add New Post</a>
        </div>

        <!-- Social Media Details -->
        <div class="d-flex py-2">
          <div class="pr-5 "> <strong>{{$user->posts->count()}}</strong> posts </div>
          <div class="pr-5 "> <strong>456</strong> followers </div>
          <div class="pr-5 "> <strong>789</strong> following </div>
        </div>

        <!-- Profile Details -->
        <div class=""> <strong>{{$user->profile->title ?? 'No Biography Title'}}</strong> </div>
        <div class="">{{$user->profile->bio ?? "No Biography"}}</div>
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
