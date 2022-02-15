@extends('Layout.app')
@section('title','Home')
@section('content')


    <div class="container">
        <div class="row mt-3">

            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$total_visitor}}</h3>
                        <h3 class="count-card-text">Total Visitor</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$total_service}}</h3>
                        <h3 class="count-card-text">Total Services</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$total_project}}</h3>
                        <h3 class="count-card-text">Total Projects</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$total_course}}</h3>
                        <h3 class="count-card-text">Total Courses</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{ $total_contact}}</h3>
                        <h3 class="count-card-text">Total Contacts</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$total_review}}</h3>
                        <h3 class="count-card-text">Total Reviews</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

