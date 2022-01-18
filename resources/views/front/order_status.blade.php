@extends('front/layout')
@section('container')
<section class="py-4 osahan-main-body">
    <div class="container">
    <div class="row">
    <div class="col-md-12">

    <section class="bg-white osahan-main-body rounded shadow-sm overflow-hidden">
    <div class="container p-0">
    <div class="row">
    <div class="col-lg-12">
        @foreach ($order as $list)

    <div class="osahan-status">

    <div class="p-3 status-order border-bottom bg-white">
    <p class="small m-0"><i class="feather-calendar text-primary"></i>Order Placed Time {{$list->added_on}}</p>

    </div>
    <div class="p-3 border-bottom">
    <div class="d-flex">
    <h6 class="font-weight-bold">Order Status</h6>

    </div>

    <div class="tracking-wrap">
        @if ($list->order_status==4)
        <div class="my-1 step active">
            <span class="icon text-danger"><i class="feather-x-circle"></i></span>
            <span class="text">Order Placed</span>
            </div>
            <div class="my-1 step active">
                <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                <span class="text">Preparing order</span>
                </div>
                <div class="my-1 step">
                    <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                    <span class="text">On the way </span>
                    </div>
        <div class="my-1 step">
            <span class="icon text-success"><i class="feather-check-circle"></i></span>
            <span class="text">Delivered Order</span>
            </div>
        @elseif ($list->order_status==3)
        <div class="my-1 step active">
            <span class="icon text-danger"><i class="feather-x-circle"></i></span>
            <span class="text">Order Placed</span>
            </div>
            <div class="my-1 step active">
                <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                <span class="text">Preparing order</span>
                </div>
                <div class="my-1 step">
                    <span class="icon text-success"><i class="feather-check-circle"></i></span>
                    <span class="text">On the way </span>
                    </div>
        <div class="my-1 step">
            <span class="icon text-danger"><i class="feather-x-circle"></i></span>
            <span class="text">Delivered Order</span>
            </div>
        @elseif ($list->order_status==2)
        <div class="my-1 step active">
            <span class="icon text-danger"><i class="feather-x-circle"></i></span>
            <span class="text">Order Placed</span>
            </div>
            <div class="my-1 step active">
                <span class="icon text-success"><i class="feather-check-circle"></i></span>
                <span class="text">Preparing order</span>
                </div>
                <div class="my-1 step">
                    <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                    <span class="text">On the way </span>
                    </div>
        <div class="my-1 step">
            <span class="icon text-danger"><i class="feather-x-circle"></i></span>
            <span class="text">Delivered Order</span>
            </div>
        @elseif ($list->order_status==1)
        <div class="my-1 step active">
            <span class="icon text-success"><i class="feather-check-circle"></i></span>
            <span class="text">Order Placed</span>
            </div>
            <div class="my-1 step active">
                <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                <span class="text">Preparing order</span>
                </div>
                <div class="my-1 step">
                    <span class="icon text-danger"><i class="feather-x-circle"></i></span>
                    <span class="text">On the way </span>
                    </div>
        <div class="my-1 step">
            <span class="icon text-danger"><i class="feather-x-circle"></i></span>
            <span class="text">Delivered Order</span>
            </div>
        @endif


    <br>
    <div class="d-flex align-items-center mb-2">
        <h6 class="font-weight-bold mb-1">Order Dishes</h6>

        @foreach ($orders as $data)
        <br>
        <h6 class="font-weight-bold ml-auto mb-1">{{$data->dish_name}} &nbsp;X &nbsp;{{$data->quantity}}</h6>

        @endforeach

        </div>
        <div class="d-flex align-items-center mb-2">
            <h6 class="font-weight-bold mb-1">Total Cost</h6>
            <h6 class="font-weight-bold ml-auto mb-1">{{$list->total_price}}</h6>
            </div>
    </div>
    </div>

    <div class="p-3 border-bottom bg-white">
        <h6 class="font-weight-bold">Destination</h6>
        <p class="m-0">{{$list->address}}</p>
        <p class="m-0">{{$list->instruction}}</p>
        </div>

        @endforeach
    </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    </div>
    </div>
    </section>
@endsection
