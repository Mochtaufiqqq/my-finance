<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.style')
    
    <title>MY-FINANCE | @yield('title')</title>
</head>

<body>

    @include('includes.navbar')

    <div class="page-wrapper">
    @yield('content')
    </div>


    @include('includes.script')
    @yield('js')

    
</body>

</html>