<html>
 <head>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
<script src="jquery-3.6.4.min.js"></script>
 <title>
 @yield('titulo')
 </title>
 </head>
 <body>
 @include('partials.nav')
 @include('superusuario.sidebar')
 @yield('contenido')
 @include('footer')
 </body>
</html>
