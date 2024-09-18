@extends("welcome")

@section("title")
    Edit Category
@endsection

@push("css")
@endpush

@section("content")
<div class="container">

    <div class="card mt-5 " style="border-radius: 20px">
        <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
            Edit Category
        </div>
        <div class="card-body w-100">
            <form action="{{ route('category.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_name " class="fs-5 fw-bold">Name</label>
                    <input type="text" name="category_name" class=" mb-2 form-control" value="{{ old('category_name', $category->category_name) }}" >
                    @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <button type="submit" class="btn btn-primary my-3 px-5">Update</button>
            </form>

        </div>

    </div>
</div>

@endsection

@push("script")
@endpush
