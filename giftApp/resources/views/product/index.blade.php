@extends('product.layout')

@section('content')

<div class="jumbotron container">
  
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">Create</a>
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

      <th scope="col">category_id </th>
      <th scope="col">name </th>
      <th scope="col">product_image </th>
      <th scope="col"> description</th>
      <th scope="col"> price </th>
      <th scope="col">  discount</th>
      <th scope="col"> stock</th>
      <th scope="col"> color</th>
      <th scope="col">warp_paper </th>
      <th scope="col" style="with 100px"> card</th>
    </tr>
  </thead>
  <tbody>

  @php
   $i = 0;
  @endphp

  @foreach($product as $item)
    <tr>
      <th scope="row">{{++$i}}</th>

      <td>{{ $item->category_id}}</td>
      <td>{{ $item->name}}</td>
      <td> {{ $item->product_image}} </td>
      <td> {{ $item->description}} </td>
      <td> {{ $item->price}} </td>
      <td> {{ $item->discount}} </td>
      <td> {{ $item->stock}} </td>
      <td> {{ $item->color}} </td>
      <td> {{ $item->warp_paper}} </td>
      <td> {{ $item->card}} </td>
      
      
      <td>
      <div class="row">
    <div class="col-sm">
    <a class="btn btn-success" href="{{ route('products.edit',$item->id)}}">Edit</a>
    </div>
    <div class="col-sm">
    <a class="btn btn-primary" href=" {{ route('products.show',$item->id)}}">Show</a>
    </div>
    <div class="col-sm">
    <form action="{{ route('products.destroy',$item->id)}}">
      
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

{{ $product->links() }}

</div>

@endsection