@extends('layouts.app')

@section('content')
<div class="container">
  <form class="" action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')

    <div class="row">
      <div class="col-8 offset-2">

        <!-- Header -->
        <div class="row pl-0"> <h1>Edit Profile</h1> </div>

        <!-- Bio Title Form -->
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label pl-0">Biography Title</label>

              <input id="title"
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                name="title"
                value="{{ old('title') ?? $user->profile->title }}"
                autocomplete="title" autofocus>

              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
        </div>

        <!-- Bio Form -->
        <div class="form-group row">
            <label for="bio" class="col-md-4 col-form-label pl-0">Biography</label>

              <input id="bio"
                type="text"
                class="form-control @error('bio') is-invalid @enderror"
                name="bio"
                value="{{ old('bio') ?? $user->profile->bio }}"
                autocomplete="bio" autofocus>

              @error('bio')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
        </div>

        <!-- URL Form -->
        <div class="form-group row">
            <label for="url" class="col-md-4 col-form-label pl-0">URL</label>

              <input id="url"
                type="text"
                class="form-control @error('url') is-invalid @enderror"
                name="url"
                value="{{ old('url') ?? $user->profile->url }}"
                autocomplete="url" autofocus>

              @error('url')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
        </div>

        <!-- Profile Image Form -->
        <div class="form-group row">
          <label for="profile_image" class="col-md-4 col-form-label pl-0">Profile Image</label>
          <!-- An accept="image/*" property is the HTML way of validating that the form only takes image files -->
          <!-- The HTML method doesn't even let you select files that are not images and may be better -->
          <input id="profile_image"
            type="file"
            class="form-control-file"
            name="profile_image"
            accept="image/*"
            onchange="loadFile(event)">
          <img id="output" class="pt-4" style="max-height: 300px"/>
          <script>
            var loadFile = function(event) {
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
            };
          </script>

          @error('profile_image')
              <strong>{{ $message }}</strong>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="row pt-2">
          <button class="btn btn-primary">Submit Changes</button>
        </div>

      </div>
    </div>
  </form>
</div>

@endsection
