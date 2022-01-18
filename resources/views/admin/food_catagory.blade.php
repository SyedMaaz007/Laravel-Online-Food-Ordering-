@extends('admin/layout')
@section('page_title','Food Catagory')

@section('container')
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"> Home</a></li>
            <li class="breadcrumb-item  active" aria-current="page">Food Catagory</a></li>

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
    </div>
    <div class="col-md-12">
    <div class="ms-panel-header">
        <a href="{{url('admin/food_catagory/manage_catagory')}}"><button type="button" class="btn btn-gradient-info">Add New Catagory</button></a>
    </div>
    </div>

    <div class="col-md-12">
        <div class="ms-panel">
          <div class="ms-panel-header">
            <h6>Catagory List</h6>
          </div>
          <div class="ms-panel-body">

            <div class="table-responsive">
                <table class="table table-hover thead-primary" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">Catagory Name</th>
                    <th scope="col">Catagory Slug</th>
                    <th scope="col">Catagory Image</th>
                    <th scope="col">Edit / Delete</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{$list->catagory_name}}</td>
                        <td>{{$list->catagory_slug}}</td>
                        <td><img alt="#" src="{{asset('storage/media/Food_catagory/'.$list->catagory_image)}}"></td>
                        <td>
                            <a href='{{url('admin/food_catagory/manage_catagory')}}/{{$list->id}}'><i class='fas fa-pencil-alt text-secondary'></i></a>
                            <a href='food_catagory/delete/{{$list->id}}'><i class='far fa-trash-alt ms-text-danger'></i></a>
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
