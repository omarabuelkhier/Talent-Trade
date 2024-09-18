@extends("welcome")

@section("title")
    Pending Posts
@endsection
@push("css")
    <style>
        .card {
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1rem 1.5rem;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
            padding: 0.75rem 1.5rem;
        }

        .card-footer .form-control {
            border-radius: 20px;
            border: 1px solid #ced4da;
        }

        .card-footer .btn {
            border-radius: 20px;
        }

        .card-footer img {
            width: 40px;
            height: 40px;
        }

        .card-body img {
            width: 40px;
            height: 40px;
        }

        .card h6 {
            font-weight: bold;
        }

        .card p {
            font-size: 0.95rem;
            color: #333;
        }

        .card small {
            color: #888;
        }

        .card .btn-link {
            color: #666;
            text-decoration: none;
            font-weight: bold;
        }

        .card .btn-link:hover {
            text-decoration: underline;
        }

        .card .btn-link i {
            margin-right: 5px;
        }

        .card .text-muted {
            color: #666 !important;
        }

        .styl {
            width: 60px;
            height: 60px;
        }
    </style>

@endpush
@section("content")
    @foreach ($pendingPosts as $jobPost)
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card my-3" style="margin-top: 50px !important;">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            @php
                                $employee = App\Models\Employee::where('id','=', $jobPost->employee_id)->first();
                                $user = App\Models\User::where('id','=', $employee->user_id)->first();
                            @endphp
                            @if($user->github_id)
                                <img src="{{ $user->image}}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" >

                            @else
                                <img src="{{ asset('images/users/'.$user->image) }}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" alt="User">

                            @endif
                            <div>
                                <a class="text-dark" href="{{ route('employee.show', $employee) }}">
                                    <h3 class="m-0">{{ $user->name}}</h3>
                                </a>
                                <small class="text-muted fs-6">{{ $jobPost->created_at->format('F j, Y, g:i a') }}</small>
                            </div>
                        </div>

                        <h5 class="fs-4 text-black">{{ $jobPost->title }}</h5>
                        <p>{{ $jobPost->description }}</p>
                        <div class="d-flex mb-1">
                            @foreach($jobPost->technology as $jobTechnology)
                                <span class="fs-6 px-5 fw-bold mx-2 my-2 rounded-5 p-1 text-white" style="background-color: #0a5a97">{{$jobTechnology->technology_name}}</span>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <div class="ms-auto d-flex">

                               <div class="ms-auto">
                                   <form  method="POST" action="{{route('approved_status',$jobPost)}}">
                                       @csrf
                                       @method('PUT')
                                       <input type="submit" value="Approved" class="btn rounded me-3  px-5 fw-bold "
                                              style="background-color:#5867dd; color:white;border-radius:30px !important">
                                   </form>
                               </div>

                                <div>
                                    <form  method="POST" action="{{route('reject_status',$jobPost)}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" value="Reject" class="btn rounded btn-danger px-5 fw-bold "
                                               style=" color:white;border-radius:30px !important">
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
  <div class='d-flex justify-content-center my-3'>
        {{ $pendingPosts->links() }}

    </div>

@endsection
@push("script")

@endpush
