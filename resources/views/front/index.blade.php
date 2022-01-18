@extends('front/layout')
@section('container')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    <span class="badge badge-success">Success</span>
    {{session('message')}}
 </div>
 @endif
 @if (session()->has('error'))
 <div class="alert alert-danger" role="alert">

     {{session('error')}}
  </div>
  @endif
<div class="osahan-home-page">
<div class="container">
<div class="cat-slider">
    @foreach ($home_catagory as $list )

    <div class="cat-item px-1 py-3">
        <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="{{url('front/food_catagory/'.$list->catagory_slug)}}">
            <img alt="#" src="{{asset('storage/media/Food_catagory/'.$list->catagory_image)}}" class="img-fluid mb-2">
            <p class="m-0 small">{{$list->catagory_name}}</p>
        </a>
    </div>

    @endforeach

</div>
</div>
<div class="bg-white">
    <div class="container">
    <div class="offer-slider">
    <div class="cat-item px-1 py-3">
    <a class="d-block text-center shadow-sm">
    <img alt="#" src="{{asset('front.assest/img/pro1.jpg')}}" class="img-fluid rounded">
    </a>
    </div>
    <div class="cat-item px-1 py-3">
    <a class="d-block text-center shadow-sm">
    <img alt="#" src="{{asset('front.assest/img/pro2.jpg')}}" class="img-fluid rounded">
    </a>
    </div>
    <div class="cat-item px-1 py-3">
    <a class="d-block text-center shadow-sm">
    <img alt="#" src="{{asset('front.assest/img/pro3.jpg')}}" class="img-fluid rounded">
    </a>
    </div>
    <div class="cat-item px-1 py-3">
    <a class="d-block text-center shadow-sm">
    <img alt="#" src="{{asset('front.assest/img/pro4.jpg')}}" class="img-fluid rounded">
    </a>
    </div>
    <div class="cat-item px-1 py-3">
    <a class="d-block text-center shadow-sm">
    <img alt="#" src="{{asset('front.assest/img/pro3.jpg')}}" class="img-fluid rounded">
    </a>
    </div>
    </div>
    </div>
    </div>
<div class="container">

<div class="pt-4 pb-2 title d-flex align-items-center">
<h5 class="m-0">Trending this week</h5>
<a class="font-weight-bold ml-auto" href="{{url('front/trending')}}">View all <i class="feather-chevrons-right"></i></a>
</div>

<div class="trending-slider">
    @foreach ($trend_res as $list )
    <div class="osahan-slider-item">
    <div class="list-card bg-white rounded overflow-hidden position-relative shadow-sm">
    <div class="list-card-image">
    <div class="member-plan position-absolute"></div>
    <a href="{{url('front/restaurant/'.$list->res_id)}}">
    <img alt="#"  src="{{asset('storage/media/Restaurants/'.$list->image)}}" class="img-fluid item-img w-100">
    </a>
    </div>
    <div class="p-3 position-relative">
    <div class="list-card-body">
    <h6 class="mb-1"><a href="{{url('front/restaurant/'.$list->res_id)}}" class="text-black">{{$list->restaurant_name}}
    </a>
    </h6>
    <p class="text-gray mb-3">{{$list->res_sign}}</p>
    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">{{$list->restaurant_loc}} </span> <span class="float-right text-black"><i class="feather-clock"></i> 15-30 min</span></p>
    </div>
    </div>
    </div>
    </div>
    @endforeach

    </div>

<div class="py-3 title d-flex align-items-center">
<h5 class="m-0">Most popular</h5>
<a class="font-weight-bold ml-auto" href="{{url('front/popular')}}">View all <i class="feather-chevrons-right"></i></a>
</div>

<div class="most_popular">
<div class="row">
    @foreach ($all_res as $list )
<div class="col-md-3 pb-3">
<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
<div class="list-card-image">
    <a href="{{url('front/restaurant/'.$list->res_id)}}">
    <img alt="#"  src="{{asset('storage/media/Restaurants/'.$list->image)}}" class="img-fluid item-img w-100">
</a>
</div>
<div class="p-3 position-relative">
    <div class="list-card-body">
    <h6 class="mb-1"><a href="{{url('front/restaurant/'.$list->res_id)}}" class="text-black">{{$list->restaurant_name}}
    </a>
    </h6>
    <p class="text-gray mb-3">{{$list->res_sign}}</p>
    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2">{{$list->restaurant_loc}} </span> <span class="float-right text-black"><i class="feather-clock"></i> 15-30 min</span></p>
    </div>
    </div>

</div>
</div>
@endforeach


</div>

</div>
</div>
</div>
</div>
@endsection
