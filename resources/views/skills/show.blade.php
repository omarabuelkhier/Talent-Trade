@extends("dashboard")

@section("title")
    show skills
@endsection
@section("css")

@endsection
@section("content")

<div class="container ">

<h1> Skill :{{$technology->technology_name}}</h1>
    <a href="{{route('skills.index')}}" class="btn btn-primary px-4 mx-3">Back</a>
</div>
@endsection
@section("script")

@endsection
