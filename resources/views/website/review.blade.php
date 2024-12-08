@extends('layouts.website.index')
@section('contents')
<section class="shop product-single pb-0 mt-10">
    <div class="container">
      <div class="row">


      @foreach($review as $data)
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <h4 class="text-success text-center"><b>{{$data->customerInfo->name}}</b></h4>
      
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-12">
      <span class="text-dark"><b>{{ $data->review}}<br><br><hr></b></span>      


      </div>
      
      

    
    <hr><br>





    @endforeach




      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.product single -->
@endsection

