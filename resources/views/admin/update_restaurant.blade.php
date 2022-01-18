@extends('admin/res_layout')
@section('page_title','Update Restaurant')
@section('container')

<div class="row">

    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="{{url('res_admin/dashboard')}}"> Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Restaurant Management</li>
        </ol>
      </nav>
    </div>



    <div class="col-md-12">
        @error('image')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('res_id')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('restaurant_name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('address')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('restaurant_loc')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('food_catagory')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-header">
          <h6>Restaurant Management</h6>
        </div>
        <div class="ms-panel-body">
          <form method="POST" action="{{route('res_update')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Restaurant Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="restaurant_name" value="{{$restaurant_name}}" placeholder="Restaurant Name" required>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Restaurant ID</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="res_id" value="{{$res_id}}" readonly>
                </div>
              </div>




              <div class="col-md-6 mb-3">
                <label>Restaurant Signatures</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="res_sign" value="{{$res_sign}}" placeholder="Restaurant Signature" required>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Restaurant Trending</label>
                <div class="input-group">
                    <select class="form-control" name="trending"  required>

                      @if($trending=='1')
                      <option value="1" selected>Yes</option>
                          <option value="0">No</option>
                          @else
                          <option value="1">Yes</option>
                          <option value="0" selected>No</option>
                          @endif
                    </select>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Restaurant Catagory</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="food_catagory" value="{{$food_catagory}}" readonly>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Location</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="restaurant_loc" value="{{$restaurant_loc}}" placeholder="Location" required>

                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Restaurant Image</label>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label>Address</label>
                <div class="input-group">
                  <textarea rows="3" class="form-control" name="address" placeholder="Address" required> {{$address}}</textarea>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$id}}"/>
                </div>
              </div>


              <input type="submit" class="btn btn-primary d-block w-100" name="" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection
