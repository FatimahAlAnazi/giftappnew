@extends('customer.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('customers.store')}}" method="POST">
    @csrf

    <div class="form-group">
          <label for="exampleFormControlInput1"> customer_name </label>
          <input type="text" name="customer_name" class="form-control"  placeholder="customer_name  ">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">  location</label>
          <input type="text" name="location" class="form-control"  placeholder=" location">
        </div>
         
        <div class="form-group">
          <label for="exampleFormControlInput1"> number_of_orders </label>
          
          <input type="text" name="number_of_orders " class="form-control"  placeholder=" number_of_orders ">
        </div>

    

          <div class="form-group">
            <label for="exampleFormControlInput1"> total_spending </label>
            <input type="text" name=" total_spending" class="form-control"  placeholder=" total_spending ">
          </div>

          


         

        

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>



    </form>
</div>





@endsection