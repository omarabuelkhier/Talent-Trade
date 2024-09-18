@extends("dashboard")

@section("title")
Update Skill
@endsection
@section("css")

@endsection
@section("content")
    <div class="container">

        <div class="card mt-5 " style="border-radius: 20px">
            <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
                Edit Skills
            </div>
            <div class="card-body w-100">
                <form method="POST" action="{{route('skills.update', $technology->id)}} ">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-2">
                        <div class="row mt-4">
                            <div class="col-2 ms-5"></div>
                            <div class="col d-flex">
                                <label for="skill" class="fw-bold fs-3 me-4 mt-1">Skill</label>
                                <input type="text" value="{{$technology->technology_name}}" class=" w-75 form-control"
                                       name="technology_name" placeholder="Enter Skill">
                            </div>
                        </div>
                        @error('technology_name')
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col alert alert-danger mt-2 ms-5 w-75">{{ $message }}</div>
                            <div class="col-2"></div>
                        </div>
                        @enderror
                    </div>
                    <div class="text-center ">
                        <button type="submit" class="btn btn-primary px-5 my-4 fw-bold me-4"> update</button>
                        <a href="{{route('skills.index')}}" class="btn btn-danger px-5 my-4 fw-bold">Cancel</a>
                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection
@section("script")

@endsection
