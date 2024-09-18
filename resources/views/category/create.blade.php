@extends("welcome")

@section("title")
    Create Category
@endsection

@push("css")
@endpush

@section("content")
    <div class="container">

        <div class="card mt-5 " style="border-radius: 20px">
            <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
                Create Category
            </div>
            <div class="card-body w-100">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="fw-bold fs-5" >Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Enter Name " id="category_name">
                        @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>

                    <button type="submit" class="btn px-5  my-2 btn-outline-primary">Save</button>
                </form>

            </div>

        </div>
    </div>


@endsection

@push("script")

@endpush
