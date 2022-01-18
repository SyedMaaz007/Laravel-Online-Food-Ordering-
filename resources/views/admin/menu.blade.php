@extends('admin/layout')
@section('page_title','Menu Details')

@section('container')
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu Details</li>
          </ol>
        </nav>
    </div>
    <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Menu List</h6>
          </div>
          <div class="ms-panel-body">

            <div class="table-responsive">
              <table class="table table-hover thead-primary" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">Dish Name</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Menu Catagory</th>
                    <th scope="col">Food Type</th>
                    <th scope="col">Price</th>


                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{$list->dish_name}}</td>
                        <td>{{$list->res_name}}</td>
                        <td>{{$list->menu_catagory}}</td>
                        <td>{{$list->food_type}}</td>

                        <td>{{$list->base_price}}</td>
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
