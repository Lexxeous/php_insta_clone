@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-3 p-5">
        <img src="https://scontent-atl3-1.cdninstagram.com/vp/a67a299e0ec566398230a95489b39152/5DB5125D/t51.2885-19/s150x150/36967469_453622505113239_5983831497159737344_n.jpg?_nc_ht=scontent-atl3-1.cdninstagram.com" class="rounded-circle">
      </div>
      <div class="col-9 p-5">
        <div class=""> <h1>{{$user->username}}</h1> </div>
        <div class="d-flex py-2">
          <div class="pr-5 "> <strong>123</strong> posts </div>
          <div class="pr-5 "> <strong>456</strong> followers </div>
          <div class="pr-5 "> <strong>789</strong> following </div>
        </div>
        <div class=""> <strong>{{$user->profile->title}}</strong> </div>
        <div class="">{{$user->profile->bio}}</div>
        <div class=""><strong><a href="#">{{$user->profile->url ?? 'No personal website.'}}</a></strong></div>
      </div>
    </div>

    <div class="row pt-5">
      <div class="col-4">
        <img src="https://scontent-atl3-1.cdninstagram.com/vp/de69cd8b34f866615bcb389217ed55de/5DB64462/t51.2885-15/e35/40893784_245257959382781_8110698046170226755_n.jpg?_nc_ht=scontent-atl3-1.cdninstagram.com" class="w-100">
      </div>
      <div class="col-4">
        <img src="https://scontent-atl3-1.cdninstagram.com/vp/adef1aa6afefc09c500608f4f7b4bfac/5DA49070/t51.2885-15/sh0.08/e35/s750x750/37386354_216582085863661_4865903062503391232_n.jpg?_nc_ht=scontent-atl3-1.cdninstagram.com" class="w-100">
      </div>
      <div class="col-4">
        <img src="https://scontent-atl3-1.cdninstagram.com/vp/fd08108bcfc543126e16570324b764ec/5DB4E833/t51.2885-15/e35/36161287_2015553048775015_1554685007606317056_n.jpg?_nc_ht=scontent-atl3-1.cdninstagram.com" class="w-100">
      </div>
    </div>
</div>

@endsection
