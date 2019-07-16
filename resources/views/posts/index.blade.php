@extends('layouts.app')

@section('content')
<div class="container">
  <?php foreach ($posts as $post): ?>
    <div class="row d-flex pb-5">

      <!-- Post Image -->
      <div class="col-6 d-flex">
        <a href="/p/{{$post->id}}" class="d-flex justify-content-end">
          <img src="/storage/{{$post->image}}" class="w-75">
        </a>
      </div>

      <div class="col-4 offset-1">
        <div class="">

          <!-- Profile Image -->
          <div class="d-flex align-items-center">
            <div class="">
              <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle" style="max-width: 50px;">
            </div>

            <!-- Linked Username -->
            <div class="pl-2 d-flex">
              <div class="font-weight-bold">
                <a href="/profile/{{$post->user->id}}">
                  <span class="text-dark">{{$post->user->username}}</span>
                </a>
              </div>
            </div>
          </div>

          <hr>

          <!-- Linked Username and Caption -->
          <div class="">
            <p>
              <span class="font-weight-bold">
                <a href="/profile/{{$post->user->id}}">
                  <span class="text-dark">{{$post->user->username}}</span>
                </a>
              </span> {{$post->caption}}
            </p>
          </div>

        </div>
      </div>
    </div>

  <?php endforeach; ?>

  <div class="row">
    <div class="col-12 d-flex justify-content-end p-0">
      {{$posts->links()}}
    </div>
  </div>

</div>

@endsection
