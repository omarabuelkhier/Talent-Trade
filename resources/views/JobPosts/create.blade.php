@extends("test")

@section("title")
    Create Job
@endsection
@push("css")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush
@section("content")
<h1 class="text-center pt-5"  style="color: #6861ce">Create Your Job</h1>
    <form method="post" action="{{route('jobPosts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="conatiner px-5"></script>
            <div class="row">
            <div class="col-6">
            <div class="mb-3">
                <label for="jobTitle" class="form-label fs-3" style="color:#5867dd">Job Title</label>
                <input type="text" class="form-control" id="jobTitle" name="title" placeholder="Job Title" value="{{old('title')}}">
                @error('title')
                <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fs-3">Job Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
                @error('description')
                <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="expectedSalary" class="form-label fs-3">Salary Expected</label>
                <input type="text" name="salary" class="form-control" id="expectedSalary" placeholder="Expected Salary" value="{{old('salary')}}">
                @error('salary')
                <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="row d-flex">

                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label fs-3">Job Location</label>

                    <input type="text" class="form-control" name="location" placeholder="City" aria-label="City" value="{{old('location')}}">
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
                <input type="date" name="dead_line" class="form-control" id="Deadline" placeholder="Deadline" value="{{old('dead_line')}}">
                @error('dead_line')
                <div class="alert alert-danger w-100 text-center my-3">{{ $message }}</div>
                @enderror
            </div>
                <div class="row mb-2">
            <div class="col-6">
                <label class="form-label fs-3" for="autoSizingSelect">Category</label>
                <select class="form-select p-2" name="category_id" id="autoSizingSelect">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label class="form-label fs-3" for="autoSizingSelect">Technologies</label>
                <select class="select2 form-select" name="technology_id[]" multiple="multiple">
                    @foreach ($technologies as $tech)
                        <option class="p-3 m-3"  value="{{$tech->id}}">{{$tech->technology_name}}</option>
                    @endforeach
                </select>
                @error('technology')
                <div class="alert alert-danger w-100 text-center my-3 ">{{ $message }}</div>
                @enderror

            </div>
                </div>
        </div>
                <div class="col-6 ">
                    <img class="img-fluid h-100"  src="{{asset("/assets/img/undraw/create.svg")}}">
                </div>
        </div>
            <div class="my-5 px-3 text-center">
                <button class="btn w-25  fs-3" style="background-color: #5867dd; color: lavenderblush" type="submit">Create Job</button>
            </div>
        </div>

    </form>
@endsection
@push("script")
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

      $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select one or more technology",
                allowClear: true,
                tag:true

            });
        });
    </script>
    <script>

    </script>
@endpush
