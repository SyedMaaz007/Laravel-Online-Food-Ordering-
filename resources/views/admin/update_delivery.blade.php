@extends('admin/dev_layout')
@section('page_title','Update Delivery Man')
@section('container')


<div class="row">

    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="{{url('dev_admin/dashboard')}}"> Home</a></li>

          <li class="breadcrumb-item active" aria-current="page">Delivery Man Management</li>
        </ol>
      </nav>
    </div>



    <div class="col-md-12">
        @error('image')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('delivery_id')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('delivery_name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('delivery_address')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('delivery_no')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @error('delivery_email')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-header">
          <h6>Delivery Management</h6>
        </div>
        <div class="ms-panel-body">
          <form method="POST" action="{{route('dev_update')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Delivery Man Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="delivery_name" value="{{$delivery_name}}" placeholder="Delivery Man Name" required>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Delivery ID</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="delivery_id" value="{{$delivery_id}}" placeholder="Delivery ID" readonly>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label>Delivery Man Email</label>
                <div class="input-group">
                  <input type="email" class="form-control" name="delivery_email" value="{{$delivery_email}}" placeholder="Delivery Man Email" readonly>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label>Phone Number</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="delivery_no" value="{{$delivery_no}}" placeholder="Phone Number" required>

                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label>Delivery Man Image</label>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label>Address</label>
                <div class="input-group">
                  <textarea rows="3" class="form-control" name="delivery_address" placeholder="Address" required> {{$delivery_address}}</textarea>
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
