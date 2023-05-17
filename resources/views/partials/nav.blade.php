<nav class="bg-[#7FB77E] border-gray-200 dark:bg-gray-900">
<div class="max-w-screen-7xl flex flex-wrap items-center justify-between mx-auto p-4">
    @if (auth()->guest() || auth()->user()->rol == "asociacion" || auth()->user()->rol == "particular")
    <a class="flex items-center" href="{{route('inicio')}}">
    <img src="{{ asset('/img/favicon.png') }}" class="h-12 mr-3" alt="Flowbite Logo" />
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Animalia</span>
        @else
    <a class="flex items-center" href="{{route('superusuario.index')}}">
    @endif
    </a>

    <div class="flex items-center md:order-2">
        @if (auth()->guest())
          <a  href="{{route('login.index')}}"  class="mr-4 border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
              Iniciar Sesión
              <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
        <a  href="{{route('registro.index')}}"  class="border-2 border-transparent text-white bg-green-700 hover:border-1 hover:border-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
            Registrarse
            <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M16 4a5 5 0 1 1-5 5a5 5 0 0 1 5-5m0-2a7 7 0 1 0 7 7a7 7 0 0 0-7-7z" fill="currentColor"></path><path d="M26 30h-2v-5a5 5 0 0 0-5-5h-6a5 5 0 0 0-5 5v5H6v-5a7 7 0 0 1 7-7h6a7 7 0 0 1 7 7z" fill="currentColor"></path></svg>        </a>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 text-lg" id="mobile-menu-2">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{route('inicio')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white" aria-current="page">Inicio</a>
          </li>
          <li>
            <a href="{{route('login.index')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Anunciar</a>
          </li>
          <li>
            <a href="{{route('login.index')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Ver otras Protectoras</a>
          </li>
        </ul>
      </div>
        @else
        <?php
        $id_usuario = auth()->user()->id;
        ?>
        @if (auth()->user()->rol=="asociacion" || auth()->user()->rol=="particular" || auth()->user()->rol=="superusuario" || auth()->user()->rol == "admin")
        <button type="button" class="flex mr-3 text-sm bg-slate-600 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          @if (auth()->user()->imagen_perfil == "")
          <img class="w-12 h-12 rounded-full border-2 border-slate-950" src="{{ asset('/img/sin_imagen.png') }}" alt="user photo">
          @else
{{--           <img class="w-12 h-12 rounded-full border-2 border-slate-950" src="{{auth()->user()->imagen_perfil}}" alt="user photo">
 --}}          <img class="w-12 h-12 rounded-full border-2 border-slate-950 object-cover" src="{{URL::asset(auth()->user()->imagen_perfil)}}" alt="user photo">
          @endif
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Hola {{auth()->user()->nombre}}</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{route('comun.consulta_id', $id_usuario)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Cuenta</a>
            </li>
            <li>
              <a href="{{route('login.destroy')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
      @endif
    </div>



    @if (auth()->user()->rol == "asociacion")
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 text-lg" id="mobile-menu-2">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
              <li>
                <a href="{{route('inicio')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white" aria-current="page">Inicio</a>
              </li>
              <li>
                <a href="{{route('comun.anunciar')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Anunciar</a>
              </li>
              <li>
                <a href="{{route('asociacion.mostrar_protectoras')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Ver otras Protectoras</a>
              </li>
              <li>
                <a href="{{route('anuncio.mostrar_anuncios_usuario', auth()->user()->id)}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Mis anuncios subidos</a>
              </li>
            </ul>
          </div>
    @elseif (auth()->user()->rol == "particular")
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 text-lg" id="mobile-menu-2">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
              <li>
                <a href="{{route('inicio')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white" aria-current="page">Inicio</a>
              </li>
              <li>
                <a href="{{route('comun.anunciar')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Anunciar</a>
              </li>
              <li>
                <a href="{{route('asociacion.mostrar_protectoras')}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Ver otras Protectoras</a>
              </li>
              <li>
                <a href="{{route('anuncio.mostrar_anuncios_usuario', auth()->user()->id)}}" class="menu-section block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white">Mis anuncios subidos</a>
              </li>
            </ul>
          </div>

    @elseif (auth()->user()->rol == "admin")
    <div class="flex inline-flex">
        <a class="items-center justify-between flex" href="{{route('admin.index')}}">
        <img src="{{ asset('/img/favicon.png') }}" class="h-12 mr-3" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Animalia</span>
        </a>
         </div>

    @elseif(auth()->user()->rol == "superusuario")
    <div class="flex inline-flex">
        <button class="absolute left-0 text-white focus:ring-4 focus:ring-blue-300 font-medium text-xl px-5 py-2.5 focus:outline-none " type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
        <i class="fa fa-bars text-black fa-xl" aria-hidden="true"></i>
        </button>
        <a class="items-center justify-between flex" href="{{route('superusuario.index')}}">
        <img src="{{ asset('/img/favicon.png') }}" class="h-12 mr-3" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Animalia</span>
        </a>
         </div>
    @endif
    @endif
    </div>
  </nav>



