@extends('admin/res_layout')
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
        @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        <span class="badge badge-success">Success</span>
        {{session('message')}}
     </div>
     @endif
        <div class="ms-panel-body">
            <a href="{{url('res_admin/menus/manage_menu')}}"><button type="button" class="btn btn-gradient-info">Add Menu</button></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Menu List</h6>
          </div>
          <div class="ms-panel-body">

            <div class="table-responsive">
              <table class="table table-hover thead-primary"  id="dataTable">
                <thead>
                  <tr>
                    <th scope="col">Dish Name</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Menu Catagory</th>
                    <th scope="col">Food Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit / Delete</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{$list->dish_name}}</td>
                        <td>{{$list->res_name}}</td>
                        <td>{{$list->menu_catagory}}</td>
                        <td>{{$list->food_type}}</td>
                        <td>{{$list->food_desc}}</td>
                        <td>{{$list->base_price}}</td>
                        <td>

                            <a href='menus/manage_menu/{{$list->id}}'><i class='fas fa-pencil-alt text-secondary'></i></a>
                            <a href='menus/delete/{{$list->id}}'><i class='far fa-trash-alt ms-text-danger'></i></a>
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
