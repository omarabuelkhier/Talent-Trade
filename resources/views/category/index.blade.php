@extends("welcome")

@section("title")
Categories
@endsection

@push("css")

@endpush

@section("content")

<div class="container">

    @if(session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    <div class="card mt-5" style="border-radius: 20px">
        <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 ">
            Categories List
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center ">
                <thead>
                    <tr>
                        <th class="fw-bold fs-5">Name</th>
                        <th colspan="2" class="fw-bold fs-5">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category) }}" class="btn px-5 btn-primary">Edit</a>
                        </td>

                        <td>

                            <form action="{{ route('category.destroy', $category) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger px-5 "
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            <a href="{{ route('category.create') }}" class="btn py-2 px-4 my-3 text-white fw-bold"
                style="background-color: #5867dd">Create Category</a>

        </div>
    </div>

        {{$categories->links()}}

</div>
@endsection

@push("script")
@endpush
