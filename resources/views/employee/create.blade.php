@extends("test")

@section("title")
@endsection
@section("css")

@endsection
@section("content")
<div class="container">
<div class=" card mt-5 w-75  "  style="border-radius: 20px; margin-left: 180px">
    <div class="card-header fw-bold h5" style="background-color: #4d91d1; border-radius: 20px 20px 0 0;">Sign As Employee</div>
    <div class="card-body">
        <div class="row">
            <form action="{{route("employee.store")}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="mb-3">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control"  name="company_name" placeholder="Enter Name" value="{{ old('company_name') }}">
                    @error('company_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location"  placeholder="Enter Location" value="{{ old('location') }}">
                    @error('location')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @error('logo')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="user_id" value="{{$user_id}}" >
                @error('user_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>

    </div>
</div>
@endsection
@section("script")

@endsection
