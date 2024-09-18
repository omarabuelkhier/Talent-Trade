@extends(\Illuminate\Support\Facades\Auth::user()->role === 'admin' ? 'dashboard' : 'test')

@section("title")
Job Post Details
@endsection

@push("css")
<style>
.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
}

.card {
    border-radius: 15px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    border: none;
    margin-bottom: 40px;
}

.card-header {
    background-color: #0056b3;
    color: black;
    padding: 20px;
    font-weight: bold;
    font-size: 1.5rem;
    border-radius: 15px 15px 0 0;
}

.card-body {
    padding: 30px;
    font-size: 1.1rem;
    color: #495057;
}

.card-footer {
    background-color: #f1f1f1;
    text-align: right;
    padding: 15px;
    font-size: 0.9rem;
    border-radius: 0 0 15px 15px;
    color: #6c757d;
}

/* Comments Section */
.comments-section {
    margin-top: 50px;
}

.comments-section h5 {
    font-size: 1.75rem;
    font-weight: bold;
    margin-bottom: 30px;
    color: #343a40;
}

.comments-section .card {
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    border: none;
    margin-bottom: 20px;
}

.comments-section .card-body {
    padding: 20px;
    font-size: 1rem;
}

.form-control {
    border-radius: 30px;
    box-shadow: none;
}

.input-group .btn-primary {
    border-radius: 30px;
    padding: 10px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    background-color: #5867dd !important;
}

.input-group .btn-primary i {
    font-size: 1.2rem;
}

.btn-primary:hover {
    background-color: #0056b3;
}
</style>
@endpush

@section("content")
<div class="card w-75 mx-auto mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <a href="{{route("jobPosts.index")}}" class="text-black"><i class="fa fa-arrow-left fa-lg"></i></a>
            <stronge class="ms-3 fw-bold fs-2"> {{$jobPost->title}} </stronge>
        </div>


        <p style="font-weight:lighter"> Posted on {{$jobPost->created_at}} </p>

    </div>
    <div class="card-body">
        <div class="job-details my-3">
            <i class="fa fa-align-left"></i>
            <strong class="ms-3">Description:</strong> {{$jobPost->description}}
        </div>
        <div class="job-details my-3">
            <i class="fa fa-dollar-sign"></i>
            <strong class="ms-3">Salary:</strong> {{$jobPost->salary}}
        </div>
        <div class="job-details my-3">
            <i class="fa fa-map-marker-alt"></i>
            <strong class="ms-3">Location:</strong> {{$jobPost->location}}
        </div>
        <div class="job-details my-3">
            <i class="fa fa-briefcase"></i>
            <strong class="ms-3">Work Type:</strong> {{$jobPost->work_type}}
        </div>
        <div class="job-details my-3">
            <i class="fa fa-calendar"></i>
            <strong class="ms-3">Application Deadline:</strong> {{$jobPost->dead_line}}
        </div>
    </div>
    <div class="">
    </div>
    @php
    $user = \App\Models\User::all();
    @endphp
    @can("is_candidate",$user)

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="job_post_id" value="{{$jobPost->id}}">
        <input type="hidden" name="work_type" value="{{ $jobPost->work_type }}">
        <div class="input-group mb-3 just mx-auto" style="width: 98%;">
            <input type="text" class="form-control" id="comment" name="body" placeholder="apply a offer..."
                style="flex: 1;">
            <button type="submit" class="btn btn-primary input-group-text" style="width:5%;">
                <i class="fa fa-solid fa-comment"></i>
            </button>
        </div>
    </form>
    @endcan
</div>
<div class="comments-section w-75 mx-auto mt-5">
    <h5>Job Offers</h5>
    @foreach($comments as $comment)
    @php
    $candidate = \App\Models\Candidate::findOrFail($comment->candidate_id);
    $user= \App\Models\User::where('id','=',$candidate->user_id)->first();
    $application=\App\Models\Application::where('candidate_id','=',$candidate->id)->where('job_post_id','=',$comment->job_post_id)->first();
    @endphp
    <div class="card">

        <div class='card-header row'>

            <div class="d-flex col-4 align-items-center">

                <img src="{{ asset('images/users/' . $user->image) }}" style="width: 60px; height: 60px;"
                    class="rounded-circle styl me-2" alt="User">
                <p class="card-text"><strong><a class="text-dark"
                            href="{{route('candidate.show',$candidate)}}">{{ $user->name }}</a></strong></p>

            </div>
         <div class="col-4 mx-auto " style="width: fit-content">
             @if($application->job_status === 'approved')
                 <h4 class="bg-primary  text-white rounded-pill px-3">Approved</h4>
             @elseif($application->job_status === 'reject')
                 <h4 class="bg-danger text-white rounded-pill px-3">Rejected</h4>
             @else
                 <h4 class="shadow-lg rounded-pill px-3">Pending</h4>

             @endif
         </div >

       <div class="col-3 offset-1 " >     <p class="text-muted " style="font-weight:lighter">Posted on
               {{ $comment->created_at->format('F j, Y, g:i a') }}</p></div>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $comment->body }}</p>
        </div>

        @php
        $employee = \App\Models\Employee::findOrFail($jobPost->employee_id);
        @endphp
        @if(\Illuminate\Support\Facades\Auth::id() === $employee->user_id )
        <div class="card-footer">
            <div class="ms-auto d-flex">

                <div class="ms-auto">
                    <form method="POST" action="{{route("application.update",$application)}}">
                        @csrf
                        @method('PUT')
                        <input type="submit" value="Approved" class="btn rounded me-3  px-5 fw-bold "
                            style="background-color:#5867dd; color:white;border-radius:30px !important">
                    </form>
                </div>

                <div>
                    <form method="POST" action="{{route("application.reject",$application)}}">
                        @csrf
                        @method('put')
                        <input type="submit" value="Reject" class="btn rounded btn-danger px-5 fw-bold "
                            style=" color:white;border-radius:30px !important">
                    </form>
                </div>


            </div>
        </div>
        @endif


    </div>
    @endforeach
</div>

@endsection
