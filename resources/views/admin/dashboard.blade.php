@extends('admin/layout')
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
        <h1 class="db-header-title">Welcome, Admin</h1>
      </div>
      <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Dasboard Overview</h6>
          </div>
          <div class="ms-panel-body">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-sm-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body mb-0">
                            <h5 class="card-title text-white">Total Orders No : {{$orders}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-3">
                    <div class="card text-white bg-secondary">
                        <div class="card-body mb-0">
                            <h5 class="card-title text-white">Total Users No : {{$customer}}</h5>

                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body mb-0">
                            <h5 class="card-title text-white">Restaurants : {{$all_res}}</h5>

                        </div>

                    </div>
                </div>

        <div class="col-xl-3 col-lg-3 col-sm-3">
            <div class="card text-white bg-success">
                <div class="card-body mb-0">
                    <h5 class="card-title text-white">Total Profit : {{$order_price}}</h5>

                </div>

            </div>
        </div>
            </div>
          </div>
        </div>
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
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Orderd Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delivery Man ID</th>
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
                        <td>INR {{$list->total_price}}</td>
                        <td>
                            @if ($list->delivery_id == NULL)
                            <a href='assign/{{$list->id}}'>Assign Delivery Man</a>
                            @else
                            {{$list->delivery_id}}
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

      <div class="col-md-6">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Customers List</h6>
          </div>

          <div class="ms-panel-body">

            <div class="table-responsive">
                <table class="table table-hover thead-primary" id="dataTable_2" >
                <thead>
                  <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Email</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cus as $list)
                    <tr>

                        <td>{{$list->user_name}}</td>
                        <td>{{$list->user_email}}</td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Restaurants List</h6>
          </div>

          <div class="ms-panel-body">

            <div class="table-responsive">
                <table class="table table-hover thead-primary" id="dataTable_3" >
                <thead>
                  <tr>
                    <th scope="col">Restaurant ID</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Restaurant Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($res as $list)
                    <tr>
                        <td>{{$list->res_id}}</td>
                        <td>{{$list->restaurant_name}}</td>
                        <td>
                            @if ($list->status==1)
                            <span class="badge badge-pill badge-success">Opened</span>
                            @elseif ($list->status==2)
                            <span class="badge badge-pill badge-primary">Closed</span>
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
