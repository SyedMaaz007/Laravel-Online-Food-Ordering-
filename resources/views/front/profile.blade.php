@extends('front/layout')
@section('container')
@if (session()->has('message'))
<div class="alert alert-success alert-outline" role="alert">
  {{session('message')}}
 </div>
  @endif
  @error('image')
  <div class="alert alert-danger" role="alert">
      {{$message}}
  </div>
  @enderror

<div class="container position-relative">
<div class="py-3 osahan-profile row">
<div class="col-md-4 mb-3">
<div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
<a href="profile.html" class="">
<div class="d-flex align-items-center p-3">
<div class="left mr-3">
   @if ($user_img==NULL)

   @else
   <img alt="#"  src="{{asset('storage/media/Customers/'.$user_img)}}" class="rounded-circle">
   @endif

</div>
<div class="right">
<h6 class="mb-1 font-weight-bold">Welcome {{$user_name}} <i class="feather-check-circle text-success"></i></h6>
<p class="text-muted m-0 small"><span >{{$user_email}}</span></p>
</div>
</div>
</a>
</div>
</div>
</div>
<div class="col-md-12">
<div class="rounded shadow p-4 bg-white">
<h5 class="mb-4">My account</h5>
<div  class="additional">
<div>
<form action="{{route('update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>User Name</label>
        <input type="text" name="user_name" class="form-control"  value="{{$user_name}}">
        </div>
<div class="form-group">
<label>First Name</label>
<input type="text" class="form-control" name="first_name" value="{{$first_name}}">
</div>
<div class="form-group">
<label>Last Name</label>
<input type="text" class="form-control" name="last_name" value="{{$last_name}}">
</div>
<div class="form-group">
<label >Mobile Number</label>
<input type="number" class="form-control" name="user_no" value="{{$user_no}}">
</div>
<div class="form-group">
<label >Email</label>
<input type="email" class="form-control" name="user_email" value="{{$user_email}}">
<input type="hidden" class="form-control" name="id" value="{{$id}}">
</div>
<div class="form-group">
    <label >Image</label>
    <input type="file" name="image" class="form-control">
    </div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn">Save Changes</button>
</div>
</form>
</div>

</div>
</div>
</div>
</div>
</div>
@endsection
