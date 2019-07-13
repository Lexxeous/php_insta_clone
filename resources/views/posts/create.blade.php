@extends('layouts.app')

@section('content')
<div class="container">
  <form class="" action="/p" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
      <div class="col-8 offset-2">

        <!-- Header -->
        <div class="row pl-0"> <h1>Add New Post</h1> </div>

        <!-- Caption Form -->
        <div class="form-group row">
            <label for="caption" class="col-md-4 col-form-label pl-0">Add a Caption</label>

              <input id="caption"
                type="text"
                class="form-control @error('caption') is-invalid @enderror"
                name="caption"
                value="{{ old('caption') }}"
                autocomplete="caption" autofocus>

              @error('caption')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
        </div>

        <!-- Image Form -->
        <div class="form-group row">
          <label for="image" class="col-md-4 col-form-label pl-0">Add an Image</label>
          <!-- An accept="image/*" property is the HTML way of validating that the form only takes image files -->
          <!-- The HTML method doesn't even let you select files that are not images and may be better -->
          <input id="image"
            type="file"
            class="form-control-file"
            name="image"
            accept="image/*"
            onchange="loadFile(event)">
          <img id="output" class="pt-4" style="max-height: 300px"/>
          <script>
            var loadFile = function(event) {
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
            };
          </script>

          @error('image')
              <strong>{{ $message }}</strong>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="row pt-2">
          <button class="btn btn-primary">Submit Post</button>
        </div>

      </div>
    </div>
  </form>
</div>

@endsection
