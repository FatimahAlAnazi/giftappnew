@extends('categoriee.layout')

@section('content')

<div class="jumbotron container">
  
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="{{route('categories.create')}}" role="button">Create</a>
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

    
    <th scope="col"> # </th>
     
      <th scope="col"> id </th>
      <th scope="col"> name </th>
      
      
    </tr>
  </thead>
  <tbody>

  @php
   $i = 0;
  @endphp

  @foreach($categoriee as $item)
    <tr>
      <th scope="row">{{++$i}}</th>

     
      <td>{{ $item-> id}}</td>
      <td> {{ $item-> name}} </td>
      
      
      
      <td>
      <div class="row">
    <div class="col-sm">
    <a class="btn btn-success" href="{{ route('categories.edit',$item->id)}}">Edit</a>
    </div>
    <div class="col-sm">
    <a class="btn btn-primary" href=" {{ route('categories.show',$item-> name)}}">Show</a>
    </div>
    <div class="col-sm">
    <form action="{{ route('categories.destroy',$item->id)}}">
      
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

{{ $categoriee->links() }}

</div>

@endsection