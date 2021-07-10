@extends('categoriee.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('categories.store')}}" method="POST">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  categoriee </label>
          <input type="text" name=" name" class="form-control"  placeholder="categoriee ">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">  product_id </label>
          <input type="text" name=" product_id" class="form-control"  placeholder=" product_id ">
        </div>
        
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>



    </form>
</div>





@endsection