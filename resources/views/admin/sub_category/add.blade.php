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
            <form method="post" action="{{ route('sub_category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><i class="fas fa-hamburger"></i><b> Add Sub Category</b></h4>
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
                <div class="form-group row mb-3 @error('sub_cat_name') is-invalid @enderror">
                    <label class="col-sm-3 col-form-label"><b>Sub Category Name:<span class="text-danger">*</span></b></label>

                    <div class="col-sm-6">

                    <input type="text" class="form-control" name="sub_cat_name" value="{{old('sub_cat_name')}}" placeholder="Sub Category Name" required>
                    @error('sub_cat_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group row mb-3 @error('category_id') is-invalid @enderror">
                    <label class="col-sm-3 col-form-label"><b>Category Name:<span class="text-danger">*</span></b></label>
                    <div class="col-sm-6">
                    <select name="category_id" id="" class="form-control">
                        <option value="" >Select Category</option>
                        @forelse ($categories as $cat )
                        <option value="{{ $cat->food_categories_id }}">{{ $cat->food_categories_name }}</option>
                        @empty
                        No Category found
                        @endforelse
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                </div>
                <div class="card-footer card_footer text-center">

                    <button type="submit" class="btn btn-md btn-primary">Add Sub Category</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection





