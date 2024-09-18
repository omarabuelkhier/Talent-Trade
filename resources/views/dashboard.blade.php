@php
$user =\Illuminate\Support\Facades\Auth::user();
@endphp
@extends("welcome")

@section("title")
   Dashboard
@endsection
@push("css")
<style>
    .small-box {
        position: relative;
        background: linear-gradient(135deg, rgb(13, 36, 71), #4d91d1);
        color: #fff;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .small-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .small-box .inner {
        padding: 50px;
    }

    .small-box h3 {
        font-size: 2.5rem;
        margin: 0;
        font-weight: 700;
        letter-spacing: 1px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Text shadow for better readability */
    }

    .small-box p {
        font-size: 1.1rem;
        margin: 0;
        opacity: 0.9;
        letter-spacing: 0.5px;
    }

    .small-box .icon {
        position: absolute;
        top: 50%;
        right: 20px;
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.25);
        transform: translateY(-50%);
    }

    .small-box-footer {
        position: absolute;

        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.3);
        color: #fff;
        text-align: center;
        padding: 10px 15px;
        display: block;
        font-size: 1rem;
        text-decoration: none;
        transition: background 0.3s ease;
        border-top: 1px solid rgba(255, 255, 255, 0.2); /* Subtle border */
    }

    .small-box-footer:hover {
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .small-box-footer i {
        margin-left: 5px;
    }

</style>
@endpush
@section("content")
<div class="col-10 offset-1">
    <div class="row mt-5">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$user->count()}}</h3> <!-- Replace with dynamic value -->
                        <h4>Total Users</h4> <!-- Replace with dynamic description -->
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route("users.index")}}" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{\Illuminate\Support\Facades\DB::table('employees')->count()}}</h3> <!-- Replace with dynamic value -->
                        <h4>Total Employees</h4> <!-- Replace with dynamic description -->
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route("employee.index")}}" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{\Illuminate\Support\Facades\DB::table('candidates')->count()}}</h3> <!-- Replace with dynamic value -->
                        <h4>Total Candidates</h4> <!-- Replace with dynamic description -->
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('candidate.index')}}" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
    </div>
    <div class="row mt-5">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{\Illuminate\Support\Facades\DB::table('categories')->count()}}</h3> <!-- Replace with dynamic value -->
                        <h4>Total Categories</h4> <!-- Replace with dynamic description -->
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('category.index')}}" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{\Illuminate\Support\Facades\DB::table('technologies')->count()}}</h3> <!-- Replace with dynamic value -->
                        <h4>Total Skills</h4> <!-- Replace with dynamic description -->
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('skills.index')}}" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{\Illuminate\Support\Facades\DB::table('job_posts')->count()}}</h3> <!-- Replace with dynamic value -->
                        <h4>Total Posts</h4> <!-- Replace with dynamic description -->
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('jobPosts.index')}}" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
    </div>

</div>
@endsection
@push("script")

@endpush

