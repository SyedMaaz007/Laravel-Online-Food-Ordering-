@extends('admin/layout')
@section('page_title','Restaurant Details')

@section('container')
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    <span class="badge badge-success">Success</span>
    {{session('message')}}
 </div>
 @endif
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Restaurant Details</li>
          </ol>
        </nav>
    </div>
    <div class="col-md-12">
        <div class="ms-panel-body">
            <a href="{{url('admin/restaurants/manage_res')}}"><button type="button" class="btn btn-gradient-info">Add Restaurant</button></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Restaurant List</h6>
          </div>
          <div class="ms-panel-body">

            <div class="table-responsive">
                <table class="table table-hover thead-primary" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">Restaurant ID</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Food Catagory</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit / Delete</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{$list->res_id}}</td>
                        <td>{{$list->restaurant_name}}</td>
                        <td>{{$list->restaurant_loc}}</td>
                        <td>{{$list->food_catagory}}</td>
                        <td>{{$list->res_address}}</td>
                        <td>

                            @if ($list->status==1)
                            <a href='restaurants/status/0/{{$list->id}}'  class="badge badge-success">Active</a>
                           @elseif ($list->status==0)
                           <a href='restaurants/status/1/{{$list->id}}'  class="badge badge-warning">Deactive</a>
                           @endif
                        </td>
                        <td>

                            <a href='restaurants/manage_res/{{$list->id}}'><i class='fas fa-pencil-alt text-secondary'></i></a>

                            <a href='restaurants/delete/{{$list->id}}'><i class='far fa-trash-alt ms-text-danger'></i></a>
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
    </div>

  </div>
@endsection
