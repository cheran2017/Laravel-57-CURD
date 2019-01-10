@extends('layouts.app')

@section('content')
	<form action="{{ url('customers') }}/{{$data['customer']->id}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
	    @csrf
	    <div class="container">
	        <div class="card ">
	          <div class="card-header text-center">
	            Edit Customer
	          </div>
	          <div class="card-body">
	              <div class="form-row">
	                <div class="form-group col-md-6">
	                  <label for="inputName">Name </label>
	                  <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="{{ $data['customer']->name }}">
	                </div>
	                <div class="form-group col-md-6">
	                  <label for="inputEmail">Email</label>
	                  <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="{{ $data['customer']->email }}">
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputAddress">Address</label>
	                <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="Enter Address 1" value="{{ $data['customer']->address1 }}">
	              </div>
	              <div class="form-group">
	                <label for="inputAddress2">Address 2</label>
	                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Enter Address 2" value="{{ $data['customer']->address2 }}">
	              </div>
	              @if ($errors->any())
	                @foreach ($errors->all() as $error)
	                <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                  <strong>Customer</strong> {{ $error }}.
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                  </button>
	                </div>
	                @endforeach
	            @endif
	          </div>
	          <div class="card-footer ">
	              <a href="{{url('home')}}" class="btn btn-primary ">back</a>
	              <button type="submit" class="btn btn-primary text-right">Update Customer</button>
	          </div>
	        </div>
	    </div>
	</form>
@endsection