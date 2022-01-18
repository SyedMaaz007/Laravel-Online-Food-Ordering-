@extends('admin/dev_layout')
@section('page_title','Admin Dashboard')
@section('container')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    <span class="badge badge-success">Success</span>
    {{session('message')}}
 </div>
 @endif
    <div class="row">
      <div class="col-md-12">
        <h1 class="db-header-title">Welcome, {{$delivery_name}}</h1>
      </div>

      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Assigned Orders</h6>
          </div>

          <div class="ms-panel-body">

            <div class="table-responsive">
                <table class="table table-hover thead-primary" id="dataTable" >
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Restaurant Address</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Number</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td><?php
                            $result = DB::select('select * from orders where order_id = ? group by order_id', [$list->id]);
                            foreach ($result as $data) {
                            echo $data->res_name;
                          }

                        ?></td>
                        <td>{{$list->res_address}}</td>
                        <td>{{$list->user_name}}</td>
                        <td>{{$list->number}}</td>
                        <td>{{$list->address}}</td>
                        <td>{{$list->payment_type}}</td>
                        <td>INR {{$list->total_price}}</td>
                            <td>

                                @if ($list->order_status==3)
                                <a href='complete/{{$list->id}}'>Ordered Deliverd</a>
                                @elseif ($list->order_status==2)
                                <span class="badge badge-pill badge-dark">Order Processing</span>
                                @elseif ($list->order_status==1)
                                <span class="badge badge-pill badge-secondary">Order Placed</span>
                                @endif
                            </td>
                           </td>
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
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order_completed as $list)
                    <tr>
                        <td>{{$list->order_id}}</td>
                        <td>{{$list->res_name}}</td>
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
