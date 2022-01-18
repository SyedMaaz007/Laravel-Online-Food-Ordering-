@extends('admin/res_layout')
@section('page_title','Restaurant Dashboard')
@section('container')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    <span class="badge badge-success">Success</span>
    {{session('message')}}
 </div>
 @endif
    <div class="row">
      <div class="col-md-12">
        <h1 class="db-header-title">Welcome, {{$res_name}}</h1>
        <h5 class="text-left">Restaurant ID : {{$res_id}}</h5>
      </div>
      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Recently Placed Orders</h6>
          </div>

          <div class="ms-panel-body">

            <div class="table-responsive">
                <table class="table table-hover thead-primary" id="dataTable" >
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Items</th>
                    <th scope="col">Quantites</th>
                    <th scope="col">Food Type</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Orderd Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order Details</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order as $list)
                    <tr>
                        <td>{{$list->order_id}}</td>
                        <td>{{$list->dish_name}}</td>
                        <td>{{$list->quantity}}</td>
                        <td> @if ($list->food_type=='VEG')
                            <span class="badge badge-pill badge-success">VEG</span>
                            @elseif ($list->food_type=="not_required")
                            <span class="badge badge-pill badge-dark">Not Requied</span>
                            @elseif ($list->food_type=="NON-VEG")
                            <span class="badge badge-pill badge-primary">NON-VEG</span>
                            @endif
                        </td>

                        <td>{{$list->user_name}}</td>

                        <td>
                            @if ($list->order_status==4)
                            <span class="badge badge-pill badge-success">Delivered</span>
                            @elseif ($list->order_status==3)
                            <span class="badge badge-pill badge-warning">Onthe Way</span>
                            @elseif ($list->order_status==2)
                            <span class="badge badge-pill badge-dark">Order Processing</span>
                            @elseif ($list->order_status==1)
                            <span class="badge badge-pill badge-secondary">Order Placed</span>
                            @endif
                        </td>
                        <td>{{$list->added_on}}</td>
                        <td>{{$list->price}}</td>
                        <td> <a href='manage_order/{{$list->id}}'>Process Order</a></td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Completed Orders</h6>
          </div>

          <div class="ms-panel-body">

            <div class="table-responsive">
                <table class="table table-hover thead-primary" id="dataTable_2" >
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Order Details</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order_completed as $list)
                    <tr>
                        <td>{{$list->order_id}}</td>
                        <td>{{$list->user_name}}</td>

                        <td>
                            @if ($list->order_status==4)
                            <span class="badge badge-pill badge-success">Delivered</span>
                            @elseif ($list->order_status==3)
                            <span class="badge badge-pill badge-waring">Onthe Way</span>
                            @elseif ($list->order_status==2)
                            <span class="badge badge-pill badge-dark">Order Processing</span>
                            @elseif ($list->order_status==1)
                            <span class="badge badge-pill badge-secondary">Order Placed</span>
                            @endif
                        </td>
                        <td> <a href='manage_order/{{$list->id}}'>Click Here</a></td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
