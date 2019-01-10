@extends('layouts.app')

@section('content')
<form action="{{ url('customers') }}" method="POST">
    @csrf
    <div class="container">
     
        <div class="card ">
          <div class="card-header text-center">
            Add Customer
          </div>
          <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Name </label>
                  <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="Enter Address 1">
              </div>
              <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Enter Address 2">
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
          <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">Create Customer</button>
          </div>
        </div>
    </div>
</form>
<br><br>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address1</th>
        <th scope="col">Address2</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @if(count($data['customers']) > 0)
        <?php $i=1; ?>
        @foreach($data['customers'] as $customer)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->address1}}</td>
            <td>{{$customer->address2}}</td>
            <td>
              <a href="/customers/{{ $customer['id'] }}" class="btn btn-sm btn-warning ">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </a>
              <form method="POST" action="{{url('customers')}}/{{$customer->id}}">
                {{ method_field('DELETE') }}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-sm btn-danger "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="5" class="text-center">No Records found</td>
        </tr>
      @endif
    </tbody>
    <tfoot>
        <tr>
          <td colspan="5" >
              {{ $data['customers']->onEachSide(2)->links() }}
          </td>
        </tr>
    </tfoot>
  </table>
</div>
@endsection
