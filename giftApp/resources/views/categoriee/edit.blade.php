@extends('categoriee.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
        <p class="card-text">  <span><a href="{{ route('categories.index')}}"> back</a> </span>     categoriee  : {{ $categoriee->categoriee  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('categories.update', ($categoriee->id) )}}" method="POST">
    @csrf
    @method('PUT')

        <div class="form-group">
          <label for="exampleFormControlInput1">  categoriee </label>
          <input type="text" name=" name" value="{{ $categoriee->name }} " class="form-control"  placeholder=" categoriee ">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">  product_id </label>
          <input type="text" name=" type" value="{{ $categoriee->product_id  }} " class="form-control"  placeholder=" product_id ">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>

        </div>



    </form>
</div>





@endsection