@extends("dashboard")

@section("title")
    Trash
@endsection

@push("css")
@endpush

@section("content")
    <div class="container">
        <div class="card mt-5" style="border-radius: 20px">
            <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
                User List
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered">
                    <thead >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('users.restore', $user->id) }}" class="btn btn-outline-dark">Restore</a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </div>

@endsection

@push("script")
@endpush
