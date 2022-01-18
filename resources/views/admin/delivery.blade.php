@extends('admin/layout')
@section('page_title','Delivery Man Details')

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
            <li class="breadcrumb-item active" aria-current="page">Delivery Man Details</li>
          </ol>
        </nav>
    </div>
    <div class="col-md-12">
        <div class="ms-panel-body">
            <a href="{{url('admin/delivery/manage_delivery')}}"><button type="button" class="btn btn-gradient-info">Add Delivery Man</button></a>
        </div>
    </div>
    <div class="col-md-12">

    <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Delivery Man List</h6>
          </div>
          <div class="ms-panel-body">

            <div class="table-responsive">
              <table class="table table-hover thead-primary" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">Delivery Man ID</th>
                    <th scope="col">Delivery Man Email</th>
                    <th scope="col">Delivery Man Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Edit/Delete</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{$list->delivery_id}}</td>
                        <td>{{$list->delivery_email}}</td>
                        <td>{{$list->delivery_name}}</td>
                        <td>{{$list->delivery_no}}</td>
                        <td>
                            <a href='{{url('admin/delivery/manage_delivery')}}/{{$list->id}}'><i class='fas fa-pencil-alt text-secondary'></i></a>
                            <a href='delivery/delete/{{$list->id}}'><i class='far fa-trash-alt ms-text-danger'></i></a>
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
