@extends('front/layout')
@section('container')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    <span class="badge badge-success">Success</span>
    {{session('message')}}
 </div>
 @endif
@foreach ($res as $list )
<div class="offer-section py-4">
    <div class="container position-relative">
    <img alt="#"  src="{{asset('storage/media/Restaurants/'.$list->image)}}" class="restaurant-pic">
    <div class="pt-3 text-white">
    <h2 class="font-weight-bold">{{$list->restaurant_name}}</h2>
    <p class="text-white m-0">{{$list->res_address}}</p>
    <div class="rating-wrap d-flex align-items-center mt-2">
        <p class="label-rating text-white ml-2 small">{{$list->restaurant_loc}}</p>
        </div>
    </div>
    <div class="pb-4">
    <div class="row">
    <div class="col-6 col-md-2">
    <p class="text-white-50 font-weight-bold m-0 small">Open time</p>
    <p class="text-white m-0">8:00 AM</p>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="container">
        <div class="p-3 bg-primary bg-primary mt-n3 rounded position-relative">
        <div class="d-flex align-items-center">
        <h5>{{$list->restaurant_name}}</h5>
        <a href="contact-us.html" class="btn btn-sm btn-outline-light ml-auto">Contact</a>
        </div>
        </div>
    </div>
        @endforeach

        <div class="container position-relative">
            <div class="row">
            <div class="col-md-8 pt-5">
            <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
            <div class="d-flex item-aligns-center">
            <p class="font-weight-bold h6 p-3 border-bottom mb-0 w-100">Menu</p>
            </div>
            @if(isset($starters[0]))
            <div class="row m-0">
                <h6 class="p-3 m-0 bg-light w-100">{{$starter}}</h6>
                <div class="col-md-12 px-0 border-top">
                @foreach ($starters as $list )
                <div class="p-3 border-bottom menu-list">

                    <div class="media">
                        @if ($list->food_image!=NULL)
                        <img alt="#" src="{{asset('storage/media/Menu/'.$list->food_image)}}"  class="mr-3 rounded-pill">
                        @elseif ($list->food_type=='VEG')
                        <div class="mr-3 font-weight-bold text-success veg">.</div>
                        @elseif  ($list->food_type=='NON-VEG')
                        <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                        @else
                        <div class="mr-3 font-weight-bold text-danger"></div>
                        @endif
                    <div class="media-body">
                    <h6 class="mb-1">{{$list->dish_name}}@if ($list->food_type=='VEG')
                        <span class="badge badge-success">Pure Veg</span>
                        @elseif ($list->food_type=='NON-VEG')
                        <span class="badge badge-danger">Non Veg</span>
                        @endif</h6>
                    <h6 class="mb-1">{{$list->food_desc}} </h6>
                    <br>

                        <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="base" value="{{$list->base_price}}" onchange="get_base()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Regular </span><span> Rs{{$list->base_price}} </span>

                          &nbsp;
                          @if($list->small_price!=0 && $list->large_price!=0)
                          <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="small" value="{{$list->small_price}}" onchange="get_small()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Small </span><span> Rs{{$list->small_price}} </span>

                          &nbsp;

                          <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="large" value="{{$list->large_price}}" onchange="get_large()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Large </span><span> Rs{{$list->large_price}} </span>
                          @endif
                          &nbsp; &nbsp; &nbsp; &nbsp;


                            <span class="float-right"><a href='javascript:edit({{
                                        $doc = json_encode(
                                                [
                                                    'data'=>$list->dish_name,
                                             'food_type'=>$list->food_type

                                                ],true)
                                        }})'>
                                        <button type='button' class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</button></a></span>
                    </div>
                    </div>
                 </div>
                 @endforeach
            </div>
            </div>
            @endif

            @if(isset($mains[0]))
            <div class="row m-0">
                <h6 class="p-3 m-0 bg-light w-100">{{$main}}</h6>
                <div class="col-md-12 px-0 border-top">
                @foreach ($mains as $list )
                <div class="p-3 border-bottom menu-list">

                    <div class="media">
                        @if ($list->food_image!=NULL)
                        <img alt="#" src="{{asset('storage/media/Menu/'.$list->food_image)}}"  class="mr-3 rounded-pill">
                        @elseif ($list->food_type=='VEG')
                        <div class="mr-3 font-weight-bold text-success veg">.</div>
                        @elseif  ($list->food_type=='NON-VEG')
                        <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                        @else
                        <div class="mr-3 font-weight-bold text-danger"></div>
                        @endif
                    <div class="media-body">
                    <h6 class="mb-1">{{$list->dish_name}}@if ($list->food_type=='VEG')
                        <span class="badge badge-success">Pure Veg</span>
                        @elseif ($list->food_type=='NON-VEG')
                        <span class="badge badge-danger">Non Veg</span>
                        @endif</h6>
                    <h6 class="mb-1">{{$list->food_desc}} </h6>
                    <br>

                        <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="base" value="{{$list->base_price}}" onchange="get_base()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Regular </span><span> Rs{{$list->base_price}} </span>

                          &nbsp;
                          @if($list->small_price!=0 && $list->large_price!=0)
                          <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="small" value="{{$list->small_price}}" onchange="get_small()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Small </span><span> Rs{{$list->small_price}} </span>

                          &nbsp;

                          <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="large" value="{{$list->large_price}}" onchange="get_large()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Large </span><span> Rs{{$list->large_price}} </span>
                          @endif
                          &nbsp; &nbsp; &nbsp; &nbsp;


                            <span class="float-right"><a href='javascript:edit({{
                                        $doc = json_encode(
                                                [
                                                    'data'=>$list->dish_name,
                                             'food_type'=>$list->food_type

                                                ],true)
                                        }})'>
                                        <button type='button' class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</button></a></span>
                    </div>
                    </div>
                 </div>
                 @endforeach
            </div>
            </div>
            @endif

            @if(isset($desserts[0]))
            <div class="row m-0">
                <h6 class="p-3 m-0 bg-light w-100">{{$dessert}}</h6>
                <div class="col-md-12 px-0 border-top">
                @foreach ($desserts as $list )
                <div class="p-3 border-bottom menu-list">

                    <div class="media">
                        @if ($list->food_image!=NULL)
                        <img alt="#" src="{{asset('storage/media/Menu/'.$list->food_image)}}"  class="mr-3 rounded-pill">
                        @elseif ($list->food_type=='VEG')
                        <div class="mr-3 font-weight-bold text-success veg">.</div>
                        @elseif  ($list->food_type=='NON-VEG')
                        <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                        @else
                        <div class="mr-3 font-weight-bold text-danger"></div>
                        @endif
                    <div class="media-body">
                    <h6 class="mb-1">{{$list->dish_name}}@if ($list->food_type=='VEG')
                        <span class="badge badge-success">Pure Veg</span>
                        @elseif ($list->food_type=='NON-VEG')
                        <span class="badge badge-danger">Non Veg</span>
                        @endif</h6>
                    <h6 class="mb-1">{{$list->food_desc}} </h6>
                    <br>

                        <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="base" value="{{$list->base_price}}" onchange="get_base()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Regular </span><span> Rs{{$list->base_price}} </span>

                          &nbsp;
                          @if($list->small_price!=0 && $list->large_price!=0)
                          <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="small" value="{{$list->small_price}}" onchange="get_small()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Small </span><span> Rs{{$list->small_price}} </span>

                          &nbsp;

                          <label class="ms-checkbox-wrap">
                            <input type="radio" name="prices" id="large" value="{{$list->large_price}}" onchange="get_large()" required> <i class="ms-checkbox-check"></i>
                          </label> <span> Large </span><span> Rs{{$list->large_price}} </span>
                          @endif
                          &nbsp; &nbsp; &nbsp; &nbsp;


                            <span class="float-right"><a href='javascript:edit({{
                                        $doc = json_encode(
                                                [
                                                    'data'=>$list->dish_name,
                                             'food_type'=>$list->food_type

                                                ],true)
                                        }})'>
                                        <button type='button' class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</button></a></span>
                    </div>
                    </div>
                 </div>
                 @endforeach
            </div>
            </div>
            @endif
            </div>
            </div>
            @if (isset($cart[0]))
            <div class="col-md-4 pt-5">
                <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                <div class=" border-bottom osahan-cart-item-profile bg-white p-3">
                <div class="flex-column">
                <h6 class="mb-1 font-weight-bold">Order Cart</h6><a class="text-danger ml-1" href='emptycart/{{$res_name}}'><i class="feather-x-circle"></i></a>
                </div>
                </div>
                <div class="bg-white border-bottom py-2">
                    @foreach ($cart as $list )
                <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                <div class="media align-items-center">
                    @if ($list->food_type=='VEG')
                    <div class="mr-3 font-weight-bold text-success veg">.</div>
                    @elseif  ($list->food_type=='NON-VEG')
                    <div class="mr-3 font-weight-bold text-danger non_veg">.</div>
                    @else
                    <div class="mr-3 font-weight-bold text-danger"></div>
                    @endif

                        &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="media-body">
                <p class="m-0">{{$list->dish_name}}</p>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;
               <p class="m-0">{{$list->size}}</p>
                </div>

                 <p class="m-0">{{$list->quantity}}</p>

                <div class="d-flex align-items-center">
                <p class="text-gray mb-0 float-right ml-2 text-muted small">Rs {{$list->price}}</p>
                </div>
                </div>



                @endforeach
                </div>
                <div class="bg-white p-3 clearfix border-bottom">
                <p class="mb-1">Item Total <span class="float-right text-dark">Rs {{$cart_total}}</span></p>
                <p class="mb-1">Restaurant Charges <span class="float-right text-dark">Rs 50</span></p>
                <p class="mb-1">Delivery Fee<span class="text-info ml-1"></span><span class="float-right text-dark">$50</span></p>
                <hr>
                <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">Rs {{$total}}</span></h6>
                </div>
                <div class="p-3">
                <a class="btn btn-success btn-block btn-lg" href="{{url('front/checkout')}}">PAY Rs {{$total}}<i class="feather-arrow-right"></i></a>
                </div>
                </div>
                </div>
                @endif
        </div>
        </div>


        <div class="container">
        <div class="">
        <p class="font-weight-bold pt-4 m-0">FEATURED ITEMS</p>

        <div class="trending-slider rounded">
            @foreach ($all_res as $list )
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
            <h6 class="mb-1"><a href="{{url('front/restaurant/'.$list->restaurant_name)}}" class="text-black">{{$list->restaurant_name}}
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
        <script>

            function get_base() {


                  get_value = document.getElementById('size').value='Regular';

                    console.log(get_value);
            }

                      function get_small() {


                  get_value = document.getElementById('size').value='Small';

                    console.log(get_value);
            }
                      function get_large() {

                  get_value = document.getElementById('size').value='Large';
                    console.log(get_value);

            }
            (function () {
                var r1 = document.getElementsByName('prices');
                for(var i=0;i<r1.length;i++)
                {
                    r1[i].onclick=function () {
                        console.log(this.value);
                         document.getElementById('price').value= this.value;
                    }
                }
            })();
        </script>
<div class="modal fade" id="extras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">QUANTITY</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form method="POST"  action="{{route('add_cart')}}" >
            @csrf
            <input type="hidden" name="size"  id="size" required>
            <input type="hidden" name="res_name"  value="{{$res_name}}" required>
            <input type="hidden" name="res_id"  value="{{$res_id}}" required>
                  <input type="hidden" name="dish_name" id="dish" required>
                  <input type="hidden" name="food_type" id="food" required>
                  <input type="hidden" name="price"  id="price" required>
                  <div class="d-flex align-items-center">
                  <p class="m-0" id="qtny">Item Quantity</p>
                  <div class="ml-auto">
                  <span class="count-number"><button type="button" class="btn-lg left dec btn btn-outline-secondary" id="btn" onclick="minus()"> <i class="feather-minus"></i> </button>
                    <input class="count-number-input" type="text" id="qt" name="quantity" value="1" required>
                    <button type="button" class="btn-lg right inc btn btn-outline-secondary" onclick="add()"> <i class="feather-plus"></i> </button></span>
                  </div>
                  </div>

    </div>
    <div class="modal-footer p-0 border-0">
        <div class="col-6 m-0 p-0">
        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
        </div>
        <div class="col-6 m-0 p-0">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Apply"/>
        </div>
        </div>
    </form>
    </div>
    </div>
    </div>
<script type="text/javascript">
 var g=0;
    function edit(doc)
    {
        console.log(doc);
        $('#dish').val(doc.data);
        $('#food').val(doc.food_type);
    }
    function add() {
        g++;
       val=document.getElementById("qt").value=g;
        document.getElementById("qtny").value=val;
    }
    function minus() {
        if(g<1)
        {
            document.getElementById("btn").disabled = true;
        }
        else{
        g--;
        document.getElementById("qt").value=g;
        document.getElementById("qtny").value=g;
        }
    }
    </script>
@endsection
