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
                            <h4 class="card-title"><i class="fas fa-hamburger"></i><b> All Sub Category</b></h4>
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
                            <th>Sub Category</th>
                            <th> Category</th>
                            {{-- <th>Created By</th>
                            <th>Updated By</th> --}}
                            <th>Manage</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                            $c=1;
                        @endphp
                        @foreach($sub_categories as $data)

                        <tr>
                            <td>{{$c++}}</td>
                            <td>{{$data->sub_cat_name}}</td>
                            <td>{{$data->category->food_categories_name ?? 'N\A'}}</td>
                            {{-- <td>{{$data->created_by}}</td>
                            <td>{{$data->updated_by}}</td> --}}
                            <td>
                                <a class="btn btn-info" href="{{ route('sub_category_edit', ['slug' => $data->sub_cat_slug]) }}" title="Edit">Edit</a>
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


