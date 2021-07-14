@extends('categoriee.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
        <p class="card-text">  <span><a href="{{ route('categories.index')}}"> back</a> </span>     categoriee  : {{ $categoriee-> id  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('categories.update', ($categoriee->id) )}}" method="POST">
    @csrf
    @method('PUT')

        <div class="form-group">
          <label for="exampleFormControlInput1">  id </label>
          <input type="text" name="id " value="{{ $categoriee->id }} " class="form-control"  placeholder=" id ">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">  name </label>
          <input type="text" name=" name " value="{{ $categoriee->name  }} " class="form-control"  placeholder=" name ">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>

        </div>



    </form>
</div>





@endsection