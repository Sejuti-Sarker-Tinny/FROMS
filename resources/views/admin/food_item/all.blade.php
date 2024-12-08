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
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><i class="fas fa-hamburger"></i><b>Food Item Overview</b></h4>
                        </div>
                        <div class="col-md-4 text-right">
                        </div>
                    </div>
                </div>


                <div class="card-body">

                <div class="table-responsive">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover dt-responsive">


                    <thead class="bg-primary text-white">

                        <tr>


                            <th>#</th>
                            <th>Food Item Name</th>
                            <th>Item Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Photo</th>
                            <th>Spice Level</th>
                            <th>Sugar</th>
                            <th>Manage</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                            $c=1;
                        @endphp
                        @foreach($fooditems as $data)
                        <tr>
                            <td>{{$c++}}</td>
                            <td>{{$data->food_item_name}}</td>
                            <td>{{ number_format($data->price ,2)}} Tk</td>
                            <td>{{$data->category->food_categories_name ?? 'N\A'}}</td>
                            <td>{{$data->subcategory->sub_cat_name ?? 'N\A'}}</td>
                            <td>
                                <img src="{{asset($data->food_item_img)}}" height="70">
                            </td>


                            <td>{{$data->spice_level}}</td>
                            <td>{{$data->sugar_level}}</td>
                            <td class="d-flex">
                                <a class="btn btn-info" href="{{ route('food_item_edit', ['slug' => $data->food_item_slug]) }}" title="Edit">Edit</a>


                                <form action="{{ route('food_item_delete', $data->id) }}" method="POST"
                                    class="ml-1">

                                    @method('DELETE')
                                    @csrf
                                    <a href="" data-id="{{ $data->id }}"class="dltbtn btn btn-danger mr-1"> Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
				    });
				    $('.dltbtn').click(function(e) {
				        var form = $(this).closest('form');
				        var dataId = $(this).data('id');
				        e.preventDefault();
				        swal({
				                title: "Are you sure?",
				                text: "Once deleted, you will not be able to recover this food item!",
				                icon: "warning",
				                buttons: true,
				                dangerMode: true,
				            })
				            .then((willDelete) => {
				                if (willDelete) {
				                    form.submit();
				                    swal("Food Item Deleted Successfully!", {
				                        icon: "success",
				                    });
				                } else {
				                    swal("Your food item is safe!");
				                }
				            });

				    });
</script>
@endsection

