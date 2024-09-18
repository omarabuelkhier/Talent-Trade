@include("layouts.head")
    <div class="container-fluid" >
        <div class="row d-flex justify-content-around">
            <div class="col-5" style="margin-top: 100px">
                <div class="card mb-3">
                    <img src="{{asset("images/static-image/employee.jpg")}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Employee</h5>
                        <p class="card-text">Registering as an employee allows you to request a candidate to work on your business</p>
                        <a href="{{route("employee.create")}}" class="btn btn-primary">As Employee </a>
                    </div>
                </div>
            </div>
            <div class="col-5" style="margin-top: 100px">
                <div class="card mb-3">
                    <img src="{{asset("images/static-image/candidate.jpg")}}" class="card-img-top" alt="..." height="440px">
                    <div class="card-body">
                        <h5 class="card-title">Candidate</h5>
                        <p class="card-text">Registering as a candidate allows you to apply for offered jobs</p>
                        <a href="{{route("candidate.create")}}" class="btn btn-primary">As Candidate </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@include("layouts.footer")
