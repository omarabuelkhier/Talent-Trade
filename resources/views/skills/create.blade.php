@extends("dashboard")

@section("title")
Create Skill
@endsection
@section("css")

@endsection
@section("content")


    <div class="container">
        <div class="card mt-5 " style="border-radius: 20px">
            <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
                Create Skills
            </div>
            <div class="card-body w-100">
                <form method="POST" action="{{route('skills.store')}}">
                    @csrf
                    <div class="form-group mt-2">
                        <div class="row mt-4">
                            <div class="col-2 ms-5"></div>
                            <div class="col d-flex">
                                <label for="skill" class="fw-bold fs-3 me-4 mt-1">Skill</label>
                                <input type="text" class=" w-75 form-control" name="technology_name" placeholder="Enter Skill">
                            </div>
                        </div>
                        @error('technology_name')
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col alert alert-danger mt-2 ms-5">{{ $message }}</div>
                            <div class="col-2"></div>
                        </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 my-4 me-4 "> Add Skill</button>
                        <a href="{{route('skills.index')}}" class="btn btn-danger px-5 my-4 ">Cancel</a>

                    </div>
                </form>

            </div>

        </div>
</div>
@endsection
@section("script")

@endsection
