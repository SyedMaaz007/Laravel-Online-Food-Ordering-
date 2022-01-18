@extends('front/layout')
@section('container')
<div class="container">
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
    <div class="most_popular py-5">
    <div class="d-flex align-items-center mb-4">
    <h3 class="font-weight-bold text-dark mb-0">All Popular Restaurant</h3>
    </div>
    <div class="row">
        @foreach ($all_res as $list )
    <div class="col-lg-4 mb-3">
    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">
    <div class="list-card-image">
    <div class="member-plan position-absolute">
        @if ($list->trending==1)
        <span class="badge badge-dark">Trending</span>
        @endif
    </div>
    <a href="{{url('front/restaurant/'.$list->res_id)}}">
        <img alt="#"  src="{{asset('storage/media/Restaurants/'.$list->image)}}" class="img-fluid item-img w-100">
        </a>
    </div>
    <div class="p-3 position-relative">
    <div class="list-card-body">
        <h6 class="mb-1"> <a href="{{url('front/restaurant/'.$list->res_id)}}" class="text-black">{{$list->restaurant_name}}
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
@endsection
