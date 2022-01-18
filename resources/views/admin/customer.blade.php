@extends('admin/layout')
@section('page_title','Customer Details')

@section('container')
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customer Details</li>
          </ol>
        </nav>
    </div>
    <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Customer List</h6>
          </div>
          <div class="ms-panel-body">

            <div class="table-responsive">
              <table class="table table-hover thead-primary" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Mobile Number</th>


                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->user_email}}</td>
                        <td>{{$list->user_name}}</td>
                        <td>{{$list->user_no}}</td>
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
