@extends('layouts.website.index')
@section('contents')

<!-- ========================
       page title
    =========================== -->
<section class="page-title page-title-layout6 text-center bg-overlay bg-parallax mt-10">
    <div class="bg-img"><img src="{{ asset('contents/website') }}/assets/images/backgrounds/6.jpg" alt="background">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <span class="pagetitle__subheading">Food Items</span>
                <h1 class="pagetitle__heading">Food Item</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Food Item</li>
                    </ol>
                </nav>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.page-title -->

<!-- ========================
         Food Item
      =========================== -->
      
<section class="shop-grid">
    <div class="container">
        
        <div class="row">
            
            <div class="col-sm-12 col-md-12 col-lg-3">
                <aside class="sidebar sidebar-layou2">
                    <form action="" class="widget__form-search" method="get">

                        <div class="widget widget-filter">
                            <h5 class="widget__title">Price Range</h5>
                            <div id="slider-range" data-min="{{ helper::minPrice() }}"
                                data-max="{{ helper::maxPrice() }}"
                                class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                data-value-min="0" data-value-max="1350" data-label-result="Price:">
                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            </div>
                            <div>
                                <input type="hidden" id="price_range" value="" name="price_range">
                                <label for="">Price:</label>
                                <input style="border: 0" type="text" readonly id="amount"
                                    value=" &#2547; {{ helper::minPrice() }} - &#2547; {{ helper::maxPrice() }}">
                            </div>

                        </div>
                        <div class="widget widget-filter">
                            <h5 class="widget__title">Spice Level</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spice_level"
                                    id="flexRadioDefault1" value="Normal" @if ($spice_level=='Normal')
                                    checked
                                    @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                   Normal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spice_level"
                                    id="flexRadioDefault1" value="Medium" @if ($spice_level=='Medium')
                                    checked
                                    @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                 Medium
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spice_level"
                                    id="flexRadioDefault1" value="High"@if ($spice_level=='High')
                                    checked
                                    @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    High
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spice_level"
                                    id="flexRadioDefault1" value="None"@if ($spice_level=='None')
                                    checked
                                    @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    None
                                </label>
                            </div>
                        </div>
                        <div class="widget widget-filter">
                            <h5 class="widget__title">Sugar</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sugar_level"
                                    id="flexRadioDefault1" value="Yes" @if ($sugar_level=='Yes')
                                    checked
                                    @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                   Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sugar_level"
                                    id="flexRadioDefault1" value="No" @if ($sugar_level=='No')
                                    checked
                                    @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    No
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Recommend</button>
                    </form>
                </aside><!-- /.sidebar -->
            </div>

            <!-- /.col-lg-3 -->
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="row">
                <!-- cart -->

                <div class="container">

                <div class="row">

                    <div class="col-lg-12 col-sm-12 col-12 main-section mb-4">

                        <div class="dropdown">

                            <button type="button" class="btn btn-info" data-toggle="dropdown">

                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>

                            </button>

                            <div class="dropdown-menu">

                                <div class="row total-header-section">

                                    <div class="col-lg-6 col-sm-6 col-6">

                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>

                                    </div>

                                    @php $total = 0 @endphp

                                    @foreach((array) session('cart') as $id => $details)

                                        @php $total += $details['price'] * $details['quantity'] @endphp

                                    @endforeach

                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">

                                        <p>Total: <span class="text-info">{{ $total }} Taka</span></p>

                                    </div>

                                </div>

                                @if(session('cart'))

                                    @foreach(session('cart') as $id => $details)

                                        <div class="row cart-detail">

                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">

                                                <img src="{{asset($details['image'] ?? 'NA')}}" />

                                            </div>

                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">

                                                <p>{{ $details['name'] }}</p>

                                                <span class="price text-info">{{ $details['price'] }} Taka</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>

                                            </div>

                                        </div>

                                    @endforeach

                                @endif

                                <div class="row">

                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">

                                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                </div>


                <!-- cart -->
                </div><!-- /.row -->
                <div class="row">

                    @forelse ($subcategories as $fooditem)
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="product-item">
                            <div class="product__img">
                                <a href=""><img src="{{ asset($fooditem->food_item_img ?? 'NA')  }}" height="180px" width="260px" alt="Product"></a>
                                <div class="product__action">
                                    <a href="{{ route('single_food', ['slug'=> $fooditem->food_item_slug]) }}" class="btn btn__primary btn__hover2">View Details</a>
                                </div>
                            </div>
                            <div class="product__content">
                                <div class="product__cat">
                                </div>
                                <h4 class="product__title"><a
                                        href="{{ route('single_food', ['slug'=> $fooditem->food_item_slug ?? 'NA']) }}">{{
                                        $fooditem->food_item_name ?? 'NA'}}</a></h4>

                                <span class="product__price">Tk {{ $fooditem->price ?? 'NA' }}</span>
                                <p class="btn-holder"><a href="{{ route('add.to.cart', $fooditem->id) }}" class="btn btn-danger btn-block text-center" role="button">Add to cart</a> </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    Food Item No found
                    @endforelse


                </div><!-- /.row -->

            </div><!-- /.col-lg-9 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.shop -->
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        if($('#slider-range').length >0){
            const max_value = parseInt($('#slider-range').data('max'));
            const min_value = parseInt($('#slider-range').data('min'));
            let price_range = min_value+'-'+max_value;

           if($('#price_range').length > 0 && $('#price_range').val()){
               price_range = $('#price_range').val().trim();
           }
           let price = price_range.split('-');
           $('#slider-range').slider({
               range:true,
               min:min_value,
               max:max_value,
               values:price,
               slide:function(event,ui){
                   $('#amount').val(ui.values[0]+"-"+ui.values[1]);
                   $('#price_range').val(ui.values[0]+"-"+ui.values[1]);
               }
           })
        }
    });

</script>
@endsection

