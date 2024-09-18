<!DOCTYPE html>
<html lang="en">
@include("layouts.head")
<body>
<div class="wrapper ">
    <!-- Sidebar -->
    @include("layouts.sidebar")
    <!-- End Sidebar -->
    <div class="main-panel ">
        @include("layouts.header")
        <div class="container">

            @yield("content")
        </div>
        <!-- Custom template | don't include it in your project! -->
        @include("layouts.setting")
        <!-- End Custom template -->
    </div>
</div>


{{-- footer --}}
@include("layouts.footer")
</body>
</html>
