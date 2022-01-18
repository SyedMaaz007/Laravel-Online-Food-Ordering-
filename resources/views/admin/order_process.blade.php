@extends('admin/res_layout')
@section('page_title','Invoice Details')

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
            <li class="breadcrumb-item"><a href="{{url('res_admin/dashboard')}}"> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
          </ol>
        </nav>
    </div>
    <div class="col-md-12">
     <div class="ms-panel">
        <div class="ms-panel-header header-mini">
          <div class="d-flex justify-content-between">
            <h6>Invoice</h6>
          </div>
        </div>
        <div class="ms-panel-body">
          <!-- Invoice To -->
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="invoice-address">
                <h3>Reciever : {{$user_name}}</h3>
                <h5>{{$email}}</h5>
                <p>{{$user_no}}</p>
                <p class="mb-0">{{$address}}</p>
                <p class="mb-0">{{$instruction}}</p>
              </div>
            </div>
            <div class="col-md-6 text-md-right">
              <ul class="invoice-date">
                <li>Invoice Date : {{$time}}</li>

              </ul>
            </div>
          </div>
          <!-- Invoice Table -->
          <div class="ms-invoice-table table-responsive mt-5">
            <table class="table table-hover text-right thead-light">
              <thead>
                <tr class="text-capitalize">
                  <th class="text-center w-5">id</th>
                  <th class="text-left">description</th>
                  <th>qty</th>
                  <th>Food Type</th>
                  <th>total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $list)
                <tr>
                  <td class="text-center">{{$list->order_id}}</td>
                  <td class="text-left">{{$list->dish_name}}</td>
                  <td>{{$list->quantity}}</td>
                  <td>{{$list->food_type}}</td>
                  <td>{{$list->price}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4">Delivery Charges :</td>
                  <td>50</td>
                </tr>
                <tr>
                    <td colspan="4">Restaurant Charges :</td>
                    <td>50</td>
                  </tr>
                <tr>
                    <td colspan="4">Grand Total Cost:</td>
                    <td>{{$total}}</td>
                  </tr>
              </tfoot>
            </table>
          </div>
          @if ($list->order_status !='4')
          <form method="POST" action="{{route('status')}}">
            @csrf
            <input type="hidden" name="order_id" value="{{$list->order_id}}">
          <div class="invoice-buttons text-left">  <label>Order Status</label>
            <div class="input-group">
              <select class="form-control" name="order_status"  required>
                @foreach ($order_status as $list)
                @if($status==$list->id)
                <option selected value="{{$list->id}}">
                    @else
                    <option value="{{$list->id}}">
                    @endif
                    @if ($list->id == '4')
                    @break
                @endif
                    {{$list->order_status}}</option>
                @endforeach
              </select>
            </div>
            <div class="invoice-buttons text-right">
                <input type="submit" class="btn btn-primary" value="Update Order Status">
              </div>
          </div>
          </form>
          @endif

        </div>
      </div>
      </div>
    </div>
    </div>

  </div>
@endsection
