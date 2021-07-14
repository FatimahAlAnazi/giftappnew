@extends('customer.layout')

@section('content')

<div class="jumbotron container">
  
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="{{route('customers.create')}}" role="button">Create</a>
</div>

<div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
      @endif

  </div>


<div class="container">
<table class="table table-dark">
  <thead>
    <tr>
    

    <th scope="col">id </th>

      <th scope="col"> customer_name </th>
      <th scope="col"> location </th>
      <th scope="col"> number_of_orders </th>
      <th scope="col"> total_of_orders</th>
      <th scope="col"> total_spending </th>
     
    </tr>
  </thead>
  <tbody>

  @php
   $i = 0;
  @endphp

  @foreach($customers as $customer)
    <tr>
      <th scope="row">{{++$i}}</th>

      <td>{{ $customer->customer_name}}</td>
      <td>{{ $customer->location  }}</td>
      <td> {{ $customer->number_of_orders }} </td>
      <td> {{ $customer->total_of_orders}} </td>
      <td> {{ $customer->total_spending}} </td>
      
      
      
      <td>
      <div class="row">
    <div class="col-sm">
    <a class="btn btn-success" href="{{ route('customers.edit',$item->id)}}">Edit</a>
    </div>
    <div class="col-sm">
    <a class="btn btn-primary" href=" {{ route('customers.show',$item->id)}}">Show</a>
    </div>
    <div class="col-sm">
    <form action="{{ route('customers.destroy',$item->id)}}">
      
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>

    </div>
  </div>


      
     

      
      
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $customers->links() }}

</div>

@endsection