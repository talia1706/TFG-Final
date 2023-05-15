<div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase">Menú</h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
  <div class="py-4 overflow-y-auto">
      <ul class="space-y-2 font-medium">
         <li>
            <button id="boton-usuarios" type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4"></circle><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"></path></g></svg>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Usuarios</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                <li>
                <a href="{{route('superusuario.ver_usuarios')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <svg class="mr-2 flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M30 10V8h-2.101a4.968 4.968 0 0 0-.732-1.753l1.49-1.49l-1.414-1.414l-1.49 1.49A4.968 4.968 0 0 0 24 4.101V2h-2v2.101a4.968 4.968 0 0 0-1.753.732l-1.49-1.49l-1.414 1.414l1.49 1.49A4.968 4.968 0 0 0 18.101 8H16v2h2.101a4.968 4.968 0 0 0 .732 1.753l-1.49 1.49l1.414 1.414l1.49-1.49a4.968 4.968 0 0 0 1.753.732V16h2v-2.101a4.968 4.968 0 0 0 1.753-.732l1.49 1.49l1.414-1.414l-1.49-1.49A4.968 4.968 0 0 0 27.899 10zm-7 2a3 3 0 1 1 3-3a3.003 3.003 0 0 1-3 3z" fill="currentColor"></path><path d="M16 30h-2v-5a3.003 3.003 0 0 0-3-3H7a3.003 3.003 0 0 0-3 3v5H2v-5a5.006 5.006 0 0 1 5-5h4a5.006 5.006 0 0 1 5 5z" fill="currentColor"></path><path d="M9 10a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0-2a5 5 0 1 0 5 5a5 5 0 0 0-5-5z" fill="currentColor"></path></svg>
                Ver, Modificar y Borrar</a>
                </li>
                <li>
                    <a href="{{route('superusuario.anadir_usuario')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <svg class="mr-2 flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M32 14h-4v-4h-2v4h-4v2h4v4h2v-4h4v-2z" fill="currentColor"></path><path d="M12 4a5 5 0 1 1-5 5a5 5 0 0 1 5-5m0-2a7 7 0 1 0 7 7a7 7 0 0 0-7-7z" fill="currentColor"></path><path d="M22 30h-2v-5a5 5 0 0 0-5-5H9a5 5 0 0 0-5 5v5H2v-5a7 7 0 0 1 7-7h6a7 7 0 0 1 7 7z" fill="currentColor"></path></svg>
                &nbsp; Añadir</a>
                </li>

            </ul>
         </li>
        <li>
           <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example-3">
                 <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16"><g fill="none"><path d="M3.64 15h8.043c.858 0 1.553-.696 1.553-1.554V6.914c1.407-.101 2.236-1.676 1.475-2.905l-.435-.702a1.904 1.904 0 0 0-1.619-.902h-1.176v-.483A.921.921 0 0 0 10.56 1a2.186 2.186 0 0 0-2.186 2.186v2.936c-1.096.123-1.93.652-2.542 1.388c-.688.826-1.09 1.899-1.33 2.924a14.837 14.837 0 0 0-.35 2.814c-.01.292-.01.548-.008.752h-.503a1.642 1.642 0 0 1-1.2-2.763l.797-.855a3.177 3.177 0 0 0-.076-4.412l-.782-.783a.5.5 0 1 0-.707.707l.783.783A2.176 2.176 0 0 1 2.508 9.7l-.798.855A2.643 2.643 0 0 0 3.64 15zm6.841-12.997v.902a.5.5 0 0 0 .5.5h1.676c.313 0 .604.162.77.429l.435.702a.905.905 0 0 1-.77 1.383h-.355a.5.5 0 0 0-.5.5v7.027a.554.554 0 0 1-.554.554h-.553v-.554a2.607 2.607 0 0 0-2.607-2.608h-.878a.5.5 0 0 0 0 1h.878c.887 0 1.607.72 1.607 1.608V14H5.144c-.003-.193-.002-.437.007-.719c.024-.722.105-1.675.325-2.62c.222-.952.577-1.855 1.124-2.511c.531-.638 1.25-1.055 2.274-1.055a.5.5 0 0 0 .5-.5V3.186c0-.628.489-1.143 1.107-1.183z" fill="currentColor"></path></g></svg>
                 <span class="flex-1 ml-3 text-left whitespace-nowrap">Animales</span>
                 <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
           </button>
           <ul id="dropdown-example-3" class="hidden py-2 space-y-2">
                <li>
                    <a href="{{route('superusuario.ver_animales')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <svg class="mr-2 flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20"><g fill="none"><path d="M6.783 2.826A1.5 1.5 0 0 1 8.123 2h3.764a1.5 1.5 0 0 1 1.342.83L13.814 4h1.69a2.5 2.5 0 0 1 2.5 2.5v2.195a2.853 2.853 0 0 0-1-.56V6.5a1.5 1.5 0 0 0-1.5-1.5h-2a.5.5 0 0 1-.446-.276l-.723-1.447A.5.5 0 0 0 11.887 3H8.123a.5.5 0 0 0-.447.275l-.728 1.449a.5.5 0 0 1-.446.275H4.504a1.5 1.5 0 0 0-1.5 1.5V14.5a1.5 1.5 0 0 0 1.5 1.5H8.22l-.163.653c-.029.117-.047.233-.054.347h-3.5a2.5 2.5 0 0 1-2.5-2.5v-8a2.5 2.5 0 0 1 2.5-2.5h1.69l.59-1.174zm7.104 6.23A4.002 4.002 0 0 0 6 10c0 1.89 1.31 3.473 3.072 3.892a3.2 3.2 0 0 1 .202-.222l.67-.67A3 3 0 1 1 13 9.944l.888-.888zm.922.492l-4.83 4.83a2.197 2.197 0 0 0-.577 1.02l-.375 1.498a.89.89 0 0 0 1.079 1.078l1.498-.374c.386-.097.739-.296 1.02-.578l4.83-4.83a1.87 1.87 0 0 0-2.645-2.644z" fill="currentColor"></path></g></svg>
                    Ver, Modificar y Borrar</a>
                </li>
                  <li>
                    <a href="{{route('superusuario.anadir_animal')}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                   <svg  class="mr-2 flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"  version="1.1" id="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve">
                  <style type="text/css">
                      .st0{fill:none;}
                  </style>
                  <polygon points="17,15 17,8 15,8 15,15 8,15 8,17 15,17 15,24 17,24 17,17 24,17 24,15 "/>
                  <rect class="st0" width="32" height="32"/>
                  </svg>
                  &nbsp; Añadir</a>
                 </li>

           </ul>
        </li>
      </ul>
   </div>
</div>
