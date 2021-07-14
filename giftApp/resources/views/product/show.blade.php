@extends('product.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
        <p class="card-text">  <span><a href="{{ route('products.index')}}"> back</a> </span>     Product name : {{ $product->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">


    <div class="form-group">
          <label for="exampleFormControlInput1">{{ $product-> category_id }}  </label>
          
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">    {{ $product-> name }}   </label>
          
        </div>
         
        <div class="form-group">
          <label for="exampleFormControlInput1">  {{ $product-> product_image }} </label>
          
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">  {{ $product-> description  }}  </label>
          
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $product-> price }} </label>
            
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $product-> discount }} </label>

          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $product-> stock }} </label>
            
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">   {{ $product-> color }} </label>
            
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $product-> warp_paper  }} </label>
            
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">  {{ $product-> card }}</label>
            
          </div>

        

        


    
</div>





@endsection