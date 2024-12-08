@extends('layouts.website.index')
@section('contents')
<section class="shop product-single pb-0 mt-10">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="product__single-img">
            <img src="{{ asset($fooditem->food_item_img) }}" class="zoomin" alt="product">
          </div><!-- /.product-img -->
        </div><!-- /.col-lg-6 -->
        <div class="col-sm-12 col-md-6 col-lg-6">
          <h4 class="product__title">{{ $fooditem->food_item_name }}</h4>
          <span class="product__price">&#2547; {{ $fooditem->price }}</span>
          <hr class="hr-dashed mt-30 mb-30">
          <div class="product__desc">
            <p>{{ $fooditem->food_item_details }}</p>
          </div><!-- /.product-desc -->
          <div class="product__meta">
            <div class="product__meta-cat">
              <span class="product__meta-title">Categories :</span>
              <a href="#"><b class="text-success">{{ $fooditem->category->food_categories_name }}</b></a>
            </div><!-- /.product__meta-cat -->
            <div class="product__meta-tags">
              <span class="product__meta-title">Sub Category :</span>
              <a href="#"><b class="text-success">{{ $fooditem->subcategory->sub_cat_name }}</b></a>
            </div><!-- /.product__meta-tags -->      
          
            @php
                $total_rating_no = $fooditem->number_of_total_ratings;
                $foodrating = 0;
                if($total_rating_no!=0){
                    $foodrating = $fooditem->total_rating_point/$total_rating_no;
                } 
            @endphp
            <div class="product__meta-tags">
              
              <span class="product__meta-title">Total Review : </span>
              <a href="#" class="text-success"><b id="total_review">{{$fooditem->number_of_total_ratings}}</b></a>
            </div>
            
            <div class="product__meta-tags">
              
              <span class="product__meta-title">Rating : </span>
              <a href="#" class="text-info"><b id="rating">{{number_format($foodrating,1)}} (5)</b></a>
            </div>

          </div><!-- /.product__meta -->
          <hr class="hr-dashed mt-30 mb-30">
          <div class="product__share d-flex align-items-center">
          </div><!-- /.product-share -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1">
          <div class="product__tabs mt-90">
            <div class="tab-content" id="nav-tabContent">
            </div>
          </div><!-- /.product-tabs -->
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.product single -->

            <hr>
            <div class="row">
                <div class="col-md-12">
    
                <br><br>
                    
                  <form method="" id="review_rating" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

              
                        <div class="col-md-4"></div>
                        <div class="col-md-5">
                            
                        
                          <span class="rating"><h5><b>Give your rating to food item <span class="text-danger">*</span></b></h5></span>
                          
                            <div class="stars">
                            <input type="hidden" name="id" value="{{$fooditem->id}}">
                            <input class="star_first_rating star_first_rating-5" id="star_first_rating-5" type="radio" name="rate" value="5" required/>
                            <label class="star_first_rating star_first_rating-5" for="star_first_rating-5"></label>
                            <input class="star_first_rating star_first_rating-4" id="star_first_rating-4" type="radio" name="rate" value="4" required/>
                            <label class="star_first_rating star_first_rating-4" for="star_first_rating-4"></label>
                            <input class="star_first_rating star_first_rating-3" id="star_first_rating-3" type="radio" name="rate" value="3" required/>
                            <label class="star_first_rating star_first_rating-3" for="star_first_rating-3"></label>
                            <input class="star_first_rating star_first_rating-2" id="star_first_rating-2" type="radio" name="rate" value="2" required/>
                            <label class="star_first_rating star_first_rating-2" for="star_first_rating-2"></label>
                            <input class="star_first_rating star_first_rating-1" id="star_first_rating-1" type="radio" name="rate" value="1" required/>
                            <label class="star_first_rating star_first_rating-1" for="star_first_rating-1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    </form>
                </div>
            </div>
            <hr>


<script>

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Review & Rating Submit
$('#review_rating').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    console.log(formData);
        $.ajax({
            type:'POST',
            url:"{{url('rating/submit')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                this.reset();
                console.log(data);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    text: data.success,
                    toast: '',
                    showConfirmButton: false,
                    timer: '2000',
                });
                document.getElementById('total_review').innerHTML=data.total_review;
                document.getElementById('rating').innerHTML=data.rating+' (5)';
            },
            error: function(data){
                console.log(data);
        }
    });

});


</script>
@endsection






