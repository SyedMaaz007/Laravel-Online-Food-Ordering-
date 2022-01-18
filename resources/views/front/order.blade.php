@extends('front/layout')
@section('container')
<section class="py-4 osahan-main-body">
    <div class="container">
    <div class="row">
    <div class="tab-content col-md-12">
    <div class="tab-pane fade show active">
    <div class="order-body">
        @foreach ($all_res as $list)

    <div class="pb-3">
    <div class="p-3 rounded shadow-sm bg-white">
    <div class="d-flex border-bottom pb-3">
    <div class="text-muted mr-3">
    <img alt="#"  src="{{asset('storage/media/Restaurants/'.$list->image)}}" class="img-fluid order_img rounded">
     </div>
    <div>
    <p class="mb-1 font-weight-bold"><a href="#" class="text-dark">{{$list->res_name}}</a></p>
    <p class="mb-1">{{$list->res_address}}</p>
    <p>ORDER NO &nbsp;{{$list->order_id}}</p>

    <p class="mb-0">Order Placed Time</p>
    <p class="mb-1 small font-weight-bold"><i class="feather-clock"></i> {{$list->added_on}}</p>
    </div>

    <div class="ml-auto">
        @if ($list->order_status==4)
        <p class="bg-success text-white py-2 px-2 rounded">Delivered</p>
        @elseif ($list->order_status==3)
        <p class="bg-warning text-white py-2 px-2 rounded">On The Way</p>

        @elseif ($list->order_status==2)
        <p class="bg-warning text-white py-2 px-2 rounded">On process</p>

        @elseif ($list->order_status==1)
        <p class="bg-info text-white py-2 px-2 rounded">Order Placed</p>

        @endif
    </div>
    </div>
    <div class="d-flex pt-3">
        <div>
            <?php
                $result = DB::select('select * from orders where order_id = ?', [$list->order_id]);
                foreach ($result as $data) {
                echo '<p class="text- font-weight-bold mb-1">'.$data->dish_name.'&nbsp;X&nbsp;'.$data->quantity.'</p>';
              }

            ?>
        </div>
        <div class="text-muted m-0 ml-auto mr-3 ">Total Payment<br>
        <span class="text-dark font-weight-bold">INR {{$list->total_price}}</span>
        </div>
        @if ($list->order_status==4)
        <div class="text-right">
            <a href="#" class="btn btn-success px-3">Ordered Delivered</a>
            </div>
        </div>
        @elseif ($list->order_status==3)
        <div class="text-right">
            <a href="{{url('front/order_status/'.$list->order_id)}}" class="btn btn-primary px-3">Track</a>
            </div>
        </div>
        @elseif ($list->order_status==2)
        <div class="text-right">
            <a href="{{url('front/order_status/'.$list->order_id)}}" class="btn btn-primary px-3">Track</a>
            </div>
        </div>
        @elseif ($list->order_status==1)
        <div class="text-right">
            <a href="{{url('front/order_status/'.$list->order_id)}}" class="btn btn-primary px-3">Track</a>
            </div>
        </div>
        @endif

    </div>
    </div>
    @endforeach

    </div>
    </div>

    </div>
    </div>
    </div>
    </section>
@endsection
