@extends("dashboard")

@section("title")
Skills
@endsection
@section("css")

@endsection
@section("content")
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <div class="card mt-5" style="border-radius: 20px">
            <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
                Categories List
            </div>
            <div class="card-body">
                <table class="table table-bordered mt-4  ">
                    <thead>
                    <tr class="text-center ">
                        <th class="fs-5">ID</th>
                        <th class="fs-5">Skill</th>
                        <!-- <th>Show</th> -->
                        <th class="fs-5">Update</th>
                        <th class="fs-5">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($technologys as $technology)
                        <tr class="text-center">
                            <td>{{$technology->id}}</td>
                            <td>{{$technology->technology_name}}</td>
                            <!-- <td>
                            <a href="{{route('skills.show', $technology->id)}}" class='btn btn-info btn-sm px-4 mt-2 '>View</a>
                        </td> -->
                            <td>
                                <a href="{{route('skills.edit', $technology->id)}}"
                                   class='btn btn-primary btn-sm px-4 mt-2 fs-6 '>Edit</a>
                            </td>
                            <td>
                                <form style="display: inline" method="POST"
                                      action="{{route('skills.destroy', $technology->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class='btn btn-danger btn-sm px-3 mt-2  fs-6'>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            <div class="card-footer">
                <a href="{{route('skills.create')}}" class="btn py-2 px-4 my-3 text-white fw-bold" style="background-color: #5867dd">Create Skills</a>

            </div>
        </div>
            {{$technologys->links()}}

    </div>


@endsection
@section("script")

@endsection
