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
<form action="{{ route('products.update', $product->id)}}" method="POST">
    @csrf
    @method('PUT')


    <div class="form-group">
          <label for="exampleFormControlInput1"> category_id </label>
          <input type="text" name="category_id" value="{{ $product-> category_id }} "  class="form-control"  placeholder=" category_id">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $product->name  }} "  class="form-control"  placeholder=" name">
        </div>
         
        <div class="form-group">
          <label for="exampleFormControlInput1"> product_image </label>
          <input type="text" name=" product_image" value="{{ $product->product_image  }} " class="form-control"  placeholder="product_image ">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1"> description </label>
          <textarea class="form-control" name="description"   rows="3">
          {!! $product->description  !!}
          </textarea>
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1">  Price</label>
            <input type="text" name="price" value="{{ $product->price  }} " class="form-control"  placeholder=" price">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1"> discount </label>
            <input type="text" name=" discount" value="{{ $product->discount  }} " class="form-control"  placeholder="discount ">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1"> stock </label>
            <input type="text" name=" stock" value="{{ $product->stock  }} " class="form-control"  placeholder="stock ">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1"> color </label>
            <input type="text" name=" color" value="{{ $product->color  }} " class="form-control"  placeholder="color ">
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1"> warp_paper </label>
            <input type="text" name=" warp_paper" value="{{ $product->warp_paper  }} " class="form-control"  placeholder=" warp_paper ">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1"> card </label>
            <input type="text" name=" card" value="{{ $product->card  }} " class="form-control"  placeholder=" card ">
          </div>

        

        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>

        </div>



    </form>
</div>





@endsection