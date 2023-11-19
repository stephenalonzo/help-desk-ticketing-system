<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script>
   // On page load or when changing themes, best to add inline in `head` to avoid FOUC
   if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
   document.documentElement.classList.add('dark')
   } else {
   document.documentElement.classList.remove('dark')
   }

   // Whenever the user explicitly chooses light mode
   localStorage.theme = 'light'

   // Whenever the user explicitly chooses dark mode
   localStorage.theme = 'dark'

   // Whenever the user explicitly chooses to respect the OS preference
   localStorage.removeItem('theme')
    </script> --}}
</head>
<body>
    <header>
        <x-navbar/>
    </header>
    <main class="">
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
         
        <div class="flex flex-row">
            <aside id="sidebar-multi-level-sidebar" class="w-64 h-screen" aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                   <ul class="space-y-2 font-medium">
                      <li>
                         <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fas fa-chart-pie text-gray-500"></i>
                            <span class="ms-3">Dashboard</span>
                         </a>
                      </li>
                      @role('admin')
                      <li>
                        <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                              <i class="fas fa-user text-gray-500"></i>
                              <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Users</span>
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                              </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                              <li>
                                 <a href="{{ route('users.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Manage</a>
                              </li>
                              <li>
                                 <button type="button" class="flex items-center w-full pl-8 p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-role" data-collapse-toggle="dropdown-role">
                                       <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Roles</span>
                                       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                       </svg>
                                 </button>
                                 <ul id="dropdown-role" class="hidden py-2 space-y-2">
                                       <li>
                                          <a href="{{ route('roles.create') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-20 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('roles.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-20 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Manage</a>
                                       </li>
                                 </ul>
                              </li>
                              <li>
                                 <button type="button" class="flex items-center w-full pl-8 p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-permission" data-collapse-toggle="dropdown-permission">
                                       <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Permissions</span>
                                       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                       </svg>
                                 </button>
                                 <ul id="dropdown-permission" class="hidden py-2 space-y-2">
                                       <li>
                                          <a href="{{ route('permissions.create') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-20 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('permissions.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-20 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Manage</a>
                                       </li>
                                 </ul>
                              </li>
                        </ul>
                     </li>
                      @endrole
                      {{-- <li>
                         <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                               <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                         </a>
                      </li> --}}
                      <li>
                        <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-tickets" data-collapse-toggle="dropdown-tickets">
                              <i class="fas fa-ticket-alt text-gray-500"></i>
                              <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Tickets</span>
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                              </svg>
                        </button>
                        <ul id="dropdown-tickets" class="hidden py-2 space-y-2">
                              @role('user')
                              <li>
                                 <a href="{{ route('tickets.create') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create</a>
                              </li>
                              @endrole
                              <li>
                                 <a href="{{ route('tickets.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Manage</a>
                              </li>
                              @role('admin')
                              <li>
                                 <a href="{{ route('categories.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Categories</a>
                              </li>
                              <li>
                                 <a href="{{ route('logs.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Logs</a>
                              </li>
                              @endrole
                              @role('agent')
                              <li>
                                 <a href="{{ route('assigned.index') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Assigned</a>
                              </li>
                              @endrole
                        </ul>
                     </li>
                     @auth                        
                     <li>
                        @auth
                        <form action="{{ route('logout') }}" method="post" class="flex items-center p-2">
                          @csrf
                          <i class="fas fa-sign-out-alt text-gray-500"></i>
                          <button type="submit" class="ms-3">Logout</button>
                        </form>
                        @endauth
                     </li>
                     @endauth
                   </ul>
                </div>
             </aside>
             <div class="px-4 py-6 w-2/3">
                 @yield('content')
             </div>
        </div>
    </main>
</body>
</html>