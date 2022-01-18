@extends('front/layout')
@section('container')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    <span class="badge badge-success">Success</span>
    {{session('message')}}
 </div>
 @endif
<div class="osahan-checkout">
    <div class="container position-relative">
    <div class="py-5 row">
    <div class="col-md-12 mb-3">
        <div class="modal-header">
    <h5 class="modal-title">Add Delivery Address</h5>

    </div>
        <div class="modal-body">
    <form action="{{route('checkout_process')}}" method="POST" >
        @csrf
    <div class="form-row">
    <div class="col-md-6 form-group">
    <label class="form-label">User Name</label>
    <div class="input-group">
     <input placeholder="User Name" type="text" class="form-control" name="user_name">
    </div>
    </div>
    <div class="col-md-6 form-group">
        <label class="form-label">Phone Number</label>
        <div class="input-group">
         <input placeholder="Phone Number" type="text" class="form-control" name="number">
        </div>
        </div>
        <div class="col-md-6 form-group">
            <label class="form-label">Email Address</label>
            <div class="input-group">
             <input placeholder="Phone Number" type="email" class="form-control" name="email">
            </div>
            </div>
    <div class="col-md-12 form-group"><label class="form-label">Complete Address</label><input placeholder="Complete Address e.g. house number, street name, landmark" type="text" class="form-control" name="address"></div>
    <div class="col-md-12 form-group"><label class="form-label">Delivery Instructions</label><input placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text" class="form-control" name="instruction"></div>
    <div class="mb-0 col-md-12 form-group">
    <label class="form-label">Payment Method</label><br>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-outline-secondary active">
    <input type="radio" name="payment_type" id="option1" value="COD"> Cash On Delivery
    </label>
    </div>
    </div>
    </div>
    </div>
    <input type="hidden" name="price"  value="{{$total}}">

    </div>
    @if (isset($cart[0]))
    <div class="col-md-12">
        <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
        <div class=" border-bottom osahan-cart-item-profile bg-white p-3">
        <div class="flex-column">
        <h5 class="mb-1 font-weight-bold">Order Cart</h5>
        </div>
        </div>
        <div class="bg-white border-bottom py-2">
            @foreach ($cart as $list )
        <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
        <div class="media align-items-center">

                <a class="text-danger ml-1" href='delete/{{$list->id}}'><i class="feather-x-circle"></i></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="media-body">
        <p class="m-0">{{$list->dish_name}}</p>
        </div>

        </div>
        <p class="m-0">{{$list->size}}</p>

         <p class="m-0">{{$list->quantity}}</p>

        <div class="d-flex align-items-center">
        <p class="text-gray mb-0 float-right ml-2 text-muted small">${{$list->price}}</p>
        </div>
        </div>



        @endforeach
        </div>
        <div class="bg-white p-3 clearfix border-bottom">
        <p class="mb-1">Item Total <span class="float-right text-dark">{{$cart_total}}</span></p>
        <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$50</span></p>
        <p class="mb-1">Delivery Fee<span class="text-info ml-1"></span><span class="float-right text-dark">$50</span></p>
        <hr>
        <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">${{$total}}</span></h6>
        </div>
        <div class="p-3">
        <input type="submit" class="btn btn-success btn-block btn-lg" value="PAY ${{$total}}"/>
        </div>
    </form>
        </div>
        </div>
    @else
    <div class="col-md-12">
        <div class=" border-bottom osahan-cart-item-profile bg-white p-3">
            <div class="flex-column">
            <h3 class="mb-1 font-weight-bold">Order Cart Is Empty</h3>
            </div>
            </div>
    </div>
    @endif

    </div>
    </div>
    </div>

@endsection

