@extends(\Illuminate\Support\Facades\Auth::user()->role === 'admin' ? 'dashboard' : 'test')

@section("title")
    Test
@endsection
@section("css")

@endsection
@section("content")
    @php

        $user = \App\Models\User::findOrFail($employee->user_id);
 @endphp

    <section class="col-10 offset-1">
        <div class="row mt-2">
            <div class="col-4">
                <div class="card mb-2 w-100">
                    <div class="card-body text-center">

                        @if($user->github_id)
                            <img src={{$user->image}} alt="..."
                                 class="avatar-img rounded-circle h-75 w-75" />
                        @else
                            <img src={{asset("images/users/".$user->image)}} alt="..."
                                 class="avatar-img rounded-circle h-75 w-75" />
                        @endif
                        <h5 class="my-3 font-weight-bold fs-3 "><i class="fa fa-solid  fa-signature me-2"></i>{{$user->name}}</h5>
                            <p class="text-muted fs-5 mb-0"> <i class="fa fa-solid fa-signature me-2"></i>{{$user->role}}</p>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center">

                            <img src='{{asset("images/users/".$employee->logo)}}' alt="avatar"
                                 class="rounded-circle shadow-4 mb-3" style="width: 150px; height:150px ">
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <strong class="mb-0">Email : </strong>
                            </div>

                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{$user->email}}</p>



                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong class="mb-0">Address :</strong>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $employee->location }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong class="mb-0">Location:</strong>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-1">{{ $employee->location }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-5">
                                <strong class="mb-0">Company Name:</strong>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $employee->company_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <form action="{{route("employee.edit",$employee)}}" method="put">
                                @csrf
                                @method("PUT")
                                <button type="submit" class=" w-100 fw-bold btn btn-primary">Update</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-8 ">
                @foreach($jobs as $jobPost)
                    <div class="row w-100">
                        <div class="col-12">
                            <div class="card my-2" >
                                <div class="card-body position-relative">
                                    @if($jobPost->status == 'pending')
                                    <span class=" px-5 bg-warning text-white rounded-5 position-absolute fw-bold " style="right: 25px">{{$jobPost->status}}</span>
                                    @elseif($jobPost->status == 'approved')
                                        <span class=" px-5 bg-primary text-white rounded-5 position-absolute fw-bold " style="right: 25px">{{$jobPost->status}}</span>

                                    @else
                                        <span class=" px-5 bg-danger text-white rounded-5 position-absolute fw-bold " style="right: 25px">{{$jobPost->status}}</span>

                                    @endif
                                        <div class="d-flex mb-1">

                                            @if($user->github_id)
                                                <img src="{{ $user->image}}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" >

                                            @else
                                                <img src="{{ asset('images/users/'.$user->image) }}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" alt="User">

                                            @endif
                                        <div>
                                            <h3 class="m-0">{{ $user->name }}</h3>
                                            <small class="text-muted fs-6">{{ $jobPost->created_at->format('F j, Y, g:i a') }}</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <header>
                                            <h3>{{$jobPost->title}}</h3>
                                        </header>
                                        <div class="job-details my-2">
                                            <i class="fa fa-align-left"></i>
                                            <strong class="ms-3">Description:</strong> {{$jobPost->description}}
                                        </div>
                                        <div class="job-details my-2">
                                            <i class="fa fa-dollar-sign"></i>
                                            <strong class="ms-3">Salary:</strong> {{$jobPost->salary}}
                                        </div>
                                        <div class="job-details my-2">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <strong class="ms-3">Location:</strong> {{$jobPost->location}}
                                        </div>
                                        <div class="job-details my-2">
                                            <i class="fa fa-briefcase"></i>
                                            <strong class="ms-3">Work Type:</strong> {{$jobPost->work_type}}
                                        </div>
                                        <div class="row">
                                            <div class="job-details my-2 col-8">
                                                <i class="fa fa-calendar"></i>
                                                <strong class="ms-3">Application Deadline:</strong> {{$jobPost->dead_line}}
                                            </div>
                                            <div class="d-flex mb-1">
                                                @foreach($jobPost->technology as $jobTechnology)
                                                    <span class="fs-6 px-5 fw-bold mx-2 my-2 rounded-5 p-1 text-white" style="background-color: #0a5a97">{{$jobTechnology->technology_name}}</span>
                                                @endforeach
                                            </div>
                                            <hr>
                                            @php
                                                $employee = \App\Models\Employee::findOrFail($jobPost->employee_id);
                                            @endphp
                                            @if(\Illuminate\Support\Facades\Auth::id() === $employee->user_id)
                                           <div class="d-flex justify-content-between ">
                                            <div>
                                                <a href="{{ route('jobPosts.show', $jobPost->id) }}" class="btn fs-6 px-5 fw-bold mx-2 mb-3   rounded-5 rounded  ms-auto"
                                                   style="background-color:#5867dd; color:white;border-radius:20px !important">More
                                                    Details</a>
                                            </div>
                                               <div class="d-flex justify-content-around  ">

                                                   <form action="{{route("jobPosts.edit",$jobPost)}}" method="PUT">
                                                       @csrf
                                                       @method('put')
                                                       <button type="submit" class="btn btn-primary px-5 rounded-5 fw-bold mx-2">Edit</button>
                                                   </form>
                                                   <form action="{{route("jobPosts.destroy",$jobPost)}}" method="post">
                                                       @csrf
                                                       @method('Delete')
                                                       <button type="submit" class="btn btn-danger rounded-5 px-5 fw-bold mx-2">Delete</button>
                                                   </form>
                                               </div>
                                           </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{ $jobs->links() }}
            </div>
        </div>

    </section>


@endsection
@section("script")

@endsection
