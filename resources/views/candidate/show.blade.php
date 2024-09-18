@extends(\Illuminate\Support\Facades\Auth::user()->role === 'admin' ? 'dashboard' : 'test')

@section("title")
    Candidate
@endsection
@push("css")

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section("content")
    @php
        $user = \App\Models\User::findOrFail($candidate->user_id);
    @endphp
    @auth
                <div class="col-10 offset-1 mt-5">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body  mt-3">
                                    <div class="text-center">
                                        <img src="{{asset('images/users/' . $user->image)}}" alt="avatar"
                                             class="rounded-circle img-fluid mb-2" style="width: 15rem; height: 15rem">
                                    </div>
                                    <div class="container">
                                        <h5 class="fs-3 mb-2 fw-bold text-capitalize"><i
                                                class="fa-solid fa-signature me-2"></i>{{$user->name}}</h5>
                                        <p class="text-muted fs-5 mb-1 "><i
                                                class="fa-solid fa-user me-2"></i>{{$user->role}}</p>
                                        <p class="text-muted fs-5 mb-1"><i
                                                class="fa-solid fa-pen-nib me-2"></i>{{$candidate->title}}</p>

                                        <p class="text-muted fs-5 mb-1 "><i
                                                class="fa-solid fa-envelope me-2"></i>{{$user->email}}</p>
                                        <p class="text-muted fs-5 mb-4"><i
                                                class="fa-solid fa-location-dot me-2"></i>{{$candidate->location}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush rounded-3">
                                        <div class="row mt-2 p-3">
                                            <p class="fw-bold col-12 "><i class="fa-solid fa-address-card me-1"></i>About
                                                Me :
                                            </p>
                                            <p class="mb-1 mx-2 col-11 ">{{$candidate->about}}</p>
                                        </div>

                                        <li class="list-group-item d-flex  align-items-center p-3">
                                            <p class="fw-bold"><i class="fa-solid fa-file me-1"></i>My CV:</p>
                                            <a class="fs-5  mb-3 ms-2 text-dark"
                                               href="{{asset('images/users/' . $candidate->cv)}}" target="_blank">
                                                CV </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0 fw-bold">Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                                <span class="fw-bold fs-5">{{$user->name}}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0 fw-bold">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0 fw-bold">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">+{{$candidate->phone}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0 fw-bold">Education</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$candidate->education}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0 fw-bold">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$candidate->location}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12">
                                    <div class="card" style="border: radius 20px;">
                                        <div class="card-header fw-bold">skills</div>
                                        <div class="card-body ">
                                            <div class="row ms-5 ">

                                                @foreach ($candidate->technology as $can)
                                                    <h1 class="col-2 badge rounded-pill bg-primary mx-2 p-2 fs-6 d-flex ">
                                                        @php
                                                            $cand = App\Models\Candidate::where("user_id", '=', $user->id)->first();
                                                            $candTec = App\Models\CandidateTechnology::where('candidate_id', '=', $cand->id)
                                                                ->where('technology_id', '=', $can->id)->first();
                                                        @endphp
                                                        <form
                                                            action="{{route("candidate-technology.destroy", $candTec->id)}}"
                                                            method="post" class="mx-2">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                    style="background-color: transparent; border:none">
                                                                <i class="fa-solid fa-trash "></i>
                                                            </button>

                                                        </form>
                                                        <span class="">{{$can->technology_name}}</span>
                                                    </h1>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="container">
                                    <div class="col-12 form-container">
                                        <div class="card mb-4 mb-md-0">
                                            <div class="card-body">
                                                <form action="{{route('candidate-technology.store')}}" method="post">
                                                    @csrf
                                                    <p class="mb-4 fw-bold">Add Skill</p>

                                                    <select id="mySelect" name="technology_id[]" multiple="multiple"
                                                            class="form-select" style="width: 100%;">
                                                        @php
                                                            $candidateTechnologies = $candidate->technology->pluck('id')->toArray();
                                                        @endphp

                                                        @foreach ($technology as $tech)
                                                            <option value="{{$tech->id}}"
                                                                    @if(in_array($tech->id, $candidateTechnologies)) php  @endif>
                                                                {{$tech->technology_name}}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('technology_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <button type="submit" class="btn btn-primary px-5 mt-3 fw-bold">
                                                        Add
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @can('is_candidate',$user)
                                        <div class="col-12">
                                            <div class=" text-center">
                                                <a href="{{route('candidate.edit', $candidate->id)}}"
                                                   class='btn btn-primary py-2  rounded-5 fw-bold fs-6 col-5 btn-sm px-4 mt-2'>
                                                    Update
                                                </a>

                                            </div>
                                        </div>

                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endauth

@endsection
@push("script")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#mySelect').select2({
                placeholder: "Select one or more Skill",
                allowClear: true

            });
        });
    </script>
@endpush
