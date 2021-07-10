@extends('customer.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
        <p class="card-text">  <span><a href="{{ route('customers.index')}}"> back</a> </span>     customer  : {{ $customer->customer_name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('customers.update', $customer->id)}}" method="POST">
    @csrf
    @method('PUT')


    <div class="form-group">
          <label for="exampleFormControlInput1"> customer_name </label>
          <input type="text" name="customer_name" value="{{ $customer->customer_name }} "  class="form-control"  placeholder=" customer_name">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">  location</label>
          <input type="text" name=" location" value="{{ $customer->location  }} "  class="form-control"  placeholder=" location">
        </div>
         
        <div class="form-group">
          <label for="exampleFormControlInput1"> number_of_orders </label>
          <input type="text" name=" number_of_orders" value="{{ $customer-> number_of_orders  }} " class="form-control"  placeholder=" number_of _orders ">
        </div>

        


        <div class="form-group">
            <label for="exampleFormControlInput1">  total_spending</label>
            <input type="text" name="total_spending" value="{{ $customer->total_spending }} " class="form-control"  placeholder=" total_spending">
          </div>

          

          

          

        

        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>

        </div>



    </form>
</div>





@endsection