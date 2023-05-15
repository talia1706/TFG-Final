<html>
 <head>
@vite('resources/css/app.css')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">
 <title>
 @yield('titulo')
 </title>
 </head>
 <body>
 @yield('contenido')

 </body>
</html>
