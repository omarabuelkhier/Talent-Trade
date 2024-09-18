@extends("dashboard")

@section("title")
    Employee
@endsection
@section("css")

@endsection
@section("content")
    <div class="container">
        <div class="card mt-5" style="border-radius: 20px">
            <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
                Candidate List
            </div>
            <div class="card-body">
                <table class="table mt-4">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Location</th>
                        <th>Logo</th>
                        <th>User ID</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->company_name }}</td>
                            <td>{{ $employee->location }}</td>
                            <td><img src="{{ asset('images/users/' . $employee->logo) }}" alt="Logo" width="100" class="rounded mt-3"></td>
                            <td>{{ $employee->user_id }}</td>
                            <td>
                                <a href="{{route('employee.show',$employee->id)}}" class='btn btn-primary btn-sm'>View</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        {{$employees->links()}}

    </div>
@endsection
@section("script")

@endsection
