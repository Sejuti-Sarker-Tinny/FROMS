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
            <form method="post" action="{{ route('update_food_category') }}" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><i class="fas fa-hamburger"></i><b> Edit Food Category</b></h4>
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
                
                <input type="hidden" name="id" value="{{$data->food_categories_id}}">
                <div class="form-group row mb-3 @error('name') is-invalid @enderror">
                
                    <label class="col-sm-3 col-form-label"><b>Food Category:<span class="text-danger">*</span></b></label>
                    <div class="col-sm-6">
                    
                    <input type="text" class="form-control" name="name" value="{{$data->food_categories_name}}" required>
                    @error('name')
                    
                        <div class="alert alert-danger">{{ $message }}</div>
                    
                    
                    @enderror
                    </div>
                </div>

                </div>
                
                
                <div class="card-footer card_footer text-center">
                    <button type="submit" class="btn btn-md btn-primary">Edit Food Category</button>
                </div>
            </div>
            
            </form>
        </div>

    </div>
</div>
@endsection

