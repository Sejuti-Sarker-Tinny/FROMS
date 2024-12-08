@extends('layouts.admin.dashboard')
@section('contents')
@if(Session::has('success'))
<script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    text: '{{Session::get('success')}}',
    showConfirmButton: true,
    timer: '5000',
})
</script>
@endif
@if(Session::has('error'))
<script>
    Swal.fire({
    position: 'center',
    icon: 'error',
    text: '{{Session::get('error')}}',
    showConfirmButton: true,
    timer: '5000',
})

</script>

@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('food_item.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title"><i class="fas fa-hamburger"></i><b> Edit Food Item</b></h4>
                            </div>
                            <div class="col-md-4 text-right">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group row mb-3 @error('food_item_name') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Food Item Name:<span
                                        class="text-danger">*</span></b></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="food_item_name"
                                    value="{{ $data->food_item_name }}" required>
                                @error('food_item_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3 @error('category_id') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Category Name:<span
                                        class="text-danger">*</span></b></label>
                            <div class="col-sm-6">
                                <select name="category_id" id="category" class="form-control">
                                    @forelse ($categories as $cat )
                                    <option value="{{ $cat->food_categories_id }}" @if ( $data->category_id ==
                                        $cat->food_categories_id) selected @endif >{{ $cat->food_categories_name }}
                                    </option>
                                    @empty
                                    No Category found
                                    @endforelse
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3 @error('category_id') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Sub Category Name:<span
                                        class="text-danger">*</span></b></label>
                            <div class="col-sm-6">
                                <select name="sub_category_id" id="subcategory" class="form-control">
                                    <option value="{{ $data->sub_category_id }}">{{ $data->subcategory->sub_cat_name ??'N\A'}}</option>
                                </select>
                                @error('sub_category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3 @error('food_item_img') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Photo:</b></label>
                            <div class="col-sm-6">
                            <input type="file" onchange="readCustomerURL(this);" class="form-control" name="food_item_img" value="{{ $data->food_item_img }}">
                            @error('food_item_img')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <img id="customer_photo_review"  height="80" src="{{ asset($data->food_item_img) }}" alt=""/>
                            </div>
                        </div>
                        <div class="form-group row mb-3 @error('price') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Food Item Price:<span
                                        class="text-danger">*</span></b></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="price" value="{{ $data->price }}"
                                    required>
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3 @error('food_item_details') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Food Item Details:<span
                                        class="text-danger">*</span></b></label>

                            <div class="col-sm-6">
                                <textarea type="text" class="form-control" name="food_item_details"
                                    value="{{old('food_item_details')}}" placeholder="Sub Category Name"
                                    required> {{ $data->food_item_details }} </textarea>
                                @error('food_item_details')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3 @error('is_non_allergic') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Spice level:<span
                                        class="text-danger">*</span></b></label>

                            <div class="col-sm-6">
                                <input class="" @if ( $data->spice_level == 'Normal') checked @endif type="radio"
                                name="spice_level" id="" value="Normal"> <span>Normal</span>
                                <input class="" @if ( $data->spice_level == 'Medium') checked @endif type="radio"
                                name="spice_level" id="" value="Medium"> <span>Medium</span>
                                <input class="" @if ( $data->spice_level == 'High') checked @endif type="radio"
                                name="spice_level" id="" value="High"> <span>High</span>
                                <input class="" @if ( $data->spice_level == 'None') checked @endif type="radio"
                                name="spice_level" id="" value="None"> <span>None</span>
                            </div>
                        </div>
                        <div class="form-group row mb-3 @error('sugar_level') is-invalid @enderror">
                            <label class="col-sm-3 col-form-label"><b>Sugar:<span
                                        class="text-danger">*</span></b></label>

                            <div class="col-sm-6">
                                <input class="" @if ( $data->sugar_level == 'Yes') checked @endif type="radio"
                                name="sugar_level" id="" value="Yes"> <span>Yes</span>
                                <input class="" @if ( $data->sugar_level == 'No') checked @endif type="radio"
                                name="sugar_level" id="" value="No"> <span>No</span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer card_footer text-center">

                        <button type="submit" class="btn btn-md btn-primary">Update Food Item</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#category').change(function(){
            let id = $(this).val();
            //console.log(id)
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
           });




            $.ajax({
                dataType: 'json',
                url: "/dashboard/getSubcategory/"+id,
                type: "GET",
                success: function (data) {
                  //  console.log(data);
                    $('select[name="sub_category_id"]').empty();
                    $.each(data, function(key,data){
                      $('select[name="sub_category_id"]').append('<option selected value="'+ data.id +'">'+ data.sub_cat_name +'</option>');
                });
                },
               error: function(error) {
                    console.log(error);
               }
            });
        });

    });

</script>
@endsection
