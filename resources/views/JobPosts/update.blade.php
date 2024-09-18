@extends("test")
@section("title")
    Update Job
@endsection
@push("css")
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush
@section("content")
    <h1 class="text-center pt-5" style="color: #6861ce">Update Your Job</h1>
    <form method="post" action="{{route('jobPosts.update',$jobPost)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="conatiner px-5">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label fs-3" style="color:#5867dd">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" name="title" placeholder="Job Title"
                               value="{{$jobPost->title}}">
                        @error('title')
                        <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fs-3">Job Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                  rows="3">{{$jobPost->description}}</textarea>
                        @error('description')
                        <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="expectedSalary" class="form-label fs-3">Salary Expected</label>
                        <input type="text" name="salary" class="form-control" id="expectedSalary"
                               placeholder="Expected Salary" value="{{$jobPost->salary}}">
                        @error('salary')
                        <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row  d-flex">

                        <div class="col-6">
                            <label for="exampleFormControlInput1" class="form-label fs-3">Job Location</label>

                            <input type="text" class="form-control" name="location" placeholder="City" aria-label="City"
                                   value="{{$jobPost->location}}">
                            @error('location')
                            <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-6">
                            <label class="form-label fs-3" for="autoSizingSelect">Location Type</label>
                            <select class="form-select p-2" name="work_type" id="autoSizingSelect">
                                <option value="1">On-site</option>
                                <option value="2" selected>Remote</option>
                                <option value="3">Hybrid</option>
                            </select>

                        </div>
                    </div>
                    <div class="my-3">
                        <label for="expectedSalary" class="form-label fs-3">Deadline</label>
                        <input type="date" name="dead_line" class="form-control" id="Deadline" placeholder="Deadline"
                               value="{{$jobPost->dead_line}}">
                        @error('dead_line')
                        <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <label class="form-label fs-3" for="autoSizingSelect">Category</label>
                            <select class="form-select p-2" name="category_id"
                                    id="autoSizingSelect" @selected('category_id')>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 ">
                            @php
                                $techJop= App\Models\TechnologyJob::where('job_post_id' ,'=',$jobPost->id)->get();
                                $jopTech = $jobPost->technology->pluck('id')->toArray();
                            @endphp

                            <label class="form-label fs-3" for="autoSizingSelect">Technologies</label>
                            <select class="select2 form-select  " name="technology_id[]" multiple="multiple">
                                @foreach ($technologies as $tech)
                                    <option
                                        value="{{$tech->id}}"
                                    @if(in_array($tech->id, $jopTech))  selected @endif >
                                        {{$tech->technology_name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('technology_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                </div>
                <div class="col-6 mt-5 ">
                    <img class="img-fluid" src="{{asset("/assets/img/undraw/update.svg")}}">
                </div>
            </div>
            <div class="my-5 px-3 text-center">
                <button class="btn w-25 fs-3" style="background-color: #5867dd; color: lavenderblush" type="submit">
                    Update Job
                </button>
            </div>
        </div>

    </form>
@endsection
@push("script")
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select one or more technology",
                allowClear: true

            });
        });
    </script>
@endpush
