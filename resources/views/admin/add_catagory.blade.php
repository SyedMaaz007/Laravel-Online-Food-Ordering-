@extends('admin/layout')
@section('page_title','Add Catagory')
@section('container')
<div class="row">

    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"> Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/food_catagory')}}">Food Catagory</a></li>
          <li class="breadcrumb-item active" aria-current="page">Food Catagory Management</li>
        </ol>
      </nav>
    </div>

    <div class="col-md-12">
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-header">
          <h6>Food Catagory Management</h6>
        </div>
        <div class="ms-panel-body">
          <form method="POST" action="{{route('catagory_manage')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Catagory Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" value="{{$catagory_name}}" name="catagory_name" placeholder="Catagory Name" required>
                </div>

                @error('catagory_name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label>Catagory Slug</label>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{$catagory_slug}}" name="catagory_slug" placeholder="Catagory Slug" required>
                </div>
                @error('catagory_slug')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$id}}"/>
                </div>
              </div>
              @if ($id==0)
              <div class="col-md-12 mb-3">
                <label>Catagory Image</label>
                <div class="form-group">
                    <input type="file" name="catagory_image" class="form-control" >
                </div>
              </div>
              @endif

              <input type="submit" class="btn btn-primary d-block w-25" name="" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
