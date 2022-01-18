@extends('admin/res_layout')
@section('page_title','Add Menu')
@section('container')

<div class="row">

    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"> Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/menus')}}"> Menu Deatils</a></li>
          <li class="breadcrumb-item active" aria-current="page">Menu Management</li>
        </ol>
      </nav>
    </div>



    <div class="col-md-12">
        @error('image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        @error('dish_name')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        @error('res_name')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-header">
          <h6>Menu Management</h6>
        </div>
        <div class="ms-panel-body">
          <form method="POST" action="{{route('menu_manage')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Dish Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="dish_name" value="{{$dish_name}}" placeholder="Dish Name" required>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Food Type</label>
                <div class="input-group">
                    <select class="form-control" name="food_type"  required>
                        <option value="">Select type</option>
                        @if($food_type=="VEG")
                        <option value="VEG" selected>VEG</option>
                        <option value="NON-VEG">NON-VEG</option>
                        <option value="not_required">Others</option>
                        @elseif($food_type=='NON-VEG')
                        <option value="VEG">VEG</option>
                        <option value="NON-VEG" selected>NON-VEG</option>
                        <option value="not_required">Others</option>
                        @else
                        <option value="VEG">VEG</option>
                        <option value="NON-VEG">NON-VEG</option>
                        <option value="not_required" selected>Others</option>
                        @endif
                    </select>
                  </div>
              </div>

              <div class="col-md-6 mb-3">
                <label>Menu Catagory</label>
                <div class="input-group">
                    <select class="form-control" name="menu_catagory"  required>
                        <option value="">Select Catagory</option>
                        @if($menu_catagory=="starters")
                        <option value="starters" selected>Starters</option>
                        <option value="main">Main Course</option>
                        <option value="dessert">Dessert</option>
                        @elseif($menu_catagory=='main')
                        <option value="starters">Starters</option>
                        <option value="main" selected>Main Course</option>
                        <option value="dessert">Dessert</option>
                        @else
                        <option value="starters">Starters</option>
                        <option value="main">Main Course</option>
                        <option value="dessert" selected>Dessert</option>
                        @endif
                    </select>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Food Image</label>
                <div class="form-group">
                    <input type="file" name="food_image" class="form-control">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label>Food Description</label>
                <div class="input-group">
                  <textarea rows="3" class="form-control" name="food_desc" placeholder="Food Description" required> {{$food_desc}}</textarea>
                </div>
              </div>


              <div class="col-md-12 mb-3">
                <label>Base Price</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="base_price" value="{{$base_price}}" placeholder="Base Price" required>
                </div>
              </div>
              <div class="alert alert-info" role="alert">
                Put "0" If Large Price And Small Price Does Not Required
            </div>

              <div class="col-md-12 mb-3">
                <label>Small Price</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="small_price" value="{{$small_price}}" placeholder="Small Price" required>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label>Large Price</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="large_price" value="{{$large_price}}" placeholder="Lagre Price" required>
                </div>
              </div>
              <input type="hidden" name="res_name" class="form-control" value="{{$res_name}}"/>
              <input type="hidden" name="res_id" class="form-control" value="{{$res_id}}"/>
              <input type="hidden" name="id" value="{{$id}}"/>
              <input type="submit" class="btn btn-primary d-block w-100" name="" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
