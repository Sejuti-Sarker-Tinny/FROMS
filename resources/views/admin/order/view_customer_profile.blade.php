@extends('layouts.admin.dashboard')
@section('contents')
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <div class="profile-img">
                <img src="{{asset('uploads/customer/'.$data->photo)}}" alt=""  height="100"/>
                <h3 class="mt-2 text-info">
                    {{ $data->name }}
                </h3>
            </div>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <label>Name : </label>
                </div>
                <div class="col-md-6">
                    <p>{{ $data->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Email :</label>
                </div>
                <div class="col-md-6">
                    <p>{{ $data->email }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Phone :</label>
                </div>
                <div class="col-md-6">
                    <p>{{ $data->phone }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Address :</label>
                </div>
                <div class="col-md-6">
                    <p>{{ $data->address }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    








</style>

@endsection


@section('scripts')


@endsection