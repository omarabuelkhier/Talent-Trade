@extends(\Illuminate\Support\Facades\Auth::user()->role === 'admin' ? 'dashboard' : 'test')
@section("title")
All Posts
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
<div class="mx-auto mt-2" style="width: 42% !important;">
    <div class="formm-group">
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</div>
<div class="col-12 offset-2">
    <div class="row">
        <div class="col-8">
            @if(isset($result))

            @foreach ($result as $jobPost)
            <div class="row">
                <div class="col-md-10 offset-md-1 sha">
                    <div class="card my-3 shadow" style="margin-top: 50px !important;">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                @php

                                $employee = App\Models\Employee::where('id','=', $jobPost->employee_id)->first();
                                $user = App\Models\User::where('id','=', $employee->user_id)->first();
                                @endphp
                                <img src="{{ asset('images/users/'.$user->image)}}" style="width: 60px; height: 60px;"
                                    class="rounded-circle styl me-2" alt="User">
                                <div>
                                    <a class="text-decoration-none text-dark"
                                        href="{{ route('employee.show', $employee->id) }}">
                                        <h3 class="m-0">{{ $user->name}}</h3>
                                    </a>
                                    <small
                                        class="text-muted fs-6">{{ $jobPost->created_at->format('F j, Y, g:i a') }}</small>
                                </div>
                            </div>

                            <h5 class="fs-4 text-black">{{ $jobPost->title }}</h5>
                            <p>{{ $jobPost->description }}</p>

                            <div class="d-flex mb-1">
                                @foreach($jobPost->technology as $jobTechnology)
                                <span class="fs-6 px-5 fw-bold mx-2 my-2 rounded-5 p-1 text-white"
                                    style="background-color: #0a5a97">{{$jobTechnology->technology_name}}</span>
                                @endforeach
                            </div>
                            <div class="card-footer d-flex">
                                <a href="{{ route('jobPosts.show', $jobPost->id) }}"
                                    class="btn fs-6 px-5 fw-bold mx-2  rounded-5 rounded  ms-auto"
                                    style="background-color:#5867dd; color:white;border-radius:20px !important">More
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="">
                <div class='d-flex justify-content-between  my-3'>
                    <div>
                        {{ $result->links() }}
                    </div>
                    <div>
                        @can("is_employee",\Illuminate\Support\Facades\Auth::user()->role)

                        <a href="{{route('jobPosts.create')}}" class="btn btn-primary fw-bold rounded-5 px-5">Create New
                            Post</a>

                        @endcan

                    </div>
                </div>

            </div>
            @else

            @foreach ($JobPosts as $jobPost)
            <div class="row">
                <div class="col-md-10 offset-md-1 sha">
                    <div class="card my-3 shadow" style="margin-top: 50px !important;">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                @php

                                $employee = App\Models\Employee::where('id','=', $jobPost->employee_id)->first();
                                $user = App\Models\User::where('id','=', $employee->user_id)->first();
                                @endphp
                                <img src="{{ asset('images/users/'.$user->image)}}" style="width: 60px; height: 60px;"
                                    class="rounded-circle styl me-2" alt="User">
                                <div>
                                    <a class="text-decoration-none text-dark"
                                        href="{{ route('employee.show', $employee->id) }}">
                                        <h3 class="m-0">{{ $user->name}}</h3>
                                    </a>
                                    <small
                                        class="text-muted fs-6">{{ $jobPost->created_at->format('F j, Y, g:i a') }}</small>
                                </div>
                            </div>

                            <h5 class="fs-4 text-black">{{ $jobPost->title }}</h5>
                            <p>{{ $jobPost->description }}</p>

                            <div class="d-flex mb-1">
                                @foreach($jobPost->technology as $jobTechnology)
                                <span class="fs-6 px-5 fw-bold mx-2 my-2 rounded-5 p-1 text-white"
                                    style="background-color: #0a5a97">{{$jobTechnology->technology_name}}</span>
                                @endforeach
                            </div>
                            <div class="card-footer d-flex">
                                <a href="{{ route('jobPosts.show', $jobPost->id) }}"
                                    class="btn fs-6 px-5 fw-bold mx-2  rounded-5 rounded  ms-auto"
                                    style="background-color:#5867dd; color:white;border-radius:20px !important">More
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="">
                <div class='d-flex justify-content-around  my-3'>
                    <div>
                        {{ $JobPosts->links() }}
                    </div>
                    <div class=" " style="margin-right: 450px">
                        @can("is_employee",\Illuminate\Support\Facades\Auth::user()->role)

                        <a href="{{route('jobPosts.create')}}" class="btn btn-primary fw-bold rounded-5 px-5 ">Create
                            New Post</a>

                        @endcan

                    </div>
                </div>

            </div>
        </div>
        @endif

    </div>

</div>


@endsection
@push("script")

@endpush
