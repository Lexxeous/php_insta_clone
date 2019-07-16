@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row d-flex">
    <div class="col-6 d-flex justify-content-end">
      <img src="/storage/{{$post->image}}" class="w-75">
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
              </a> •
            </div>
            <a href="#" class="pl-1">Follow</a>
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
</div>

@endsection
