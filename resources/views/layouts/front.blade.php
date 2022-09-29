<!DOCTYPE html>
<html>

    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ trans('panel.site_title') }}</title>
        @livewireStyles
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
        <style>
            [x-cloak] {
                display: none;
            }
    
            .duration-300 {
                transition-duration: 300ms;
            }
    
            .ease-in {
                transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
            }
    
            .ease-out {
                transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
    
            .scale-90 {
                transform: scale(.9);
            }
    
            .scale-100 {
                transform: scale(1);
            }
        </style>
    </head>
    <body class="bg-gradient-to-r from-green-200 to-blue-200">
        @include('sweetalert::alert')
        <div x-data="{ open: false }"
            class="flex flex-row px-2 mb-8 bg-gradient-to-r from-green-200 to-blue-200 fixed top-0 left-0 right-0 mx-auto md:items-center justify-between md:flex-row md:px-6 lg:px-8 max-w-7xl">
            <div class="p-2 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline">
                    <span class="text-2xl font-extrabold text-blue-600">Logo</span>
                </a>                
            </div>
            <div class="flex items-center space-x-1">
                <ul class="hidden space-x-2 md:inline-flex">
                   @guest <li><a href="{{ route('login') }}" class="px-4 py-2 font-semibold text-gray-600 rounded">Login</a></li>@endguest
                    {{-- <li><a href="#" class="px-4 py-2 font-semibold text-gray-600 rounded">Blogs</a></li> --}}
                    @guest <li><a href="{{ route('register') }}" class="px-4 py-2 font-semibold text-gray-600 rounded">Register</a></li>@endguest
                    @can('admin_access')<li><a href="{{ route('admin.home') }}" class="px-4 py-2 font-bold text-red-600 rounded">Administration</a></li>@endcan
                    <nav :class="{'flex': open, 'hidden': !open}"
                    class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex flex-row items-center text-green-600 space-x-2 w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent hover:bg-green-200 md:w-auto md:inline md:mt-0 md:ml-4 hover:bg-gray-200 focus:text-white focus:bg-green-500 focus:outline-none focus:shadow-outline">
                                @auth  <span>{{ auth()->user()->lname }}</span>@endauth
                                @guest  <span>Guest</span>@endguest
                                <img class="inline h-6 rounded-full"
                                    src="{{URL::asset('/img/avatar.jpg')}}">
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                                    class="inline w-4 h-4 transition-transform duration-200 transform">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" x-cloak>
                                <div class="py-2 bg-white text-blue-800 text-sm rounded-sm border border-main-color shadow-sm">
                                   @auth <a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="#">Settings</a>@endauth
                                    <a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="#">Help</a>
                                    <div class="border-b"></div>
                                    @auth<a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>@endauth
                                </div>
                            </div>
                        </div>
                    </nav>
                </ul>
                <div class="inline-flex right-0 md:hidden" x-data="{ show: false }">
                    <button class="flex-none px-2 " @click="show = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                    <span class="sr-only">show Menu</span>
                    </button>
                    <div
                    class="absolute top-0 left-0 right-0 z-50 flex flex-col p-2 pb-4 m-2 space-y-3 bg-white rounded shadow"
                    x-show.transition="show" @click.away="show = false" x-cloak>
                        <button class="self-end flex-none px-2 ml-2" @click="show = false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span class="sr-only">Close Menu</span>
                        </button>
                        <ul class="space-y-2">
                            <li><a href="#" class="px-4 py-2 font-semibold text-gray-600 rounded">Home</a></li>
                            <li><a href="#" class="px-4 py-2 font-semibold text-gray-600 rounded">Blogs</a></li>
                            <li><a href="#" class="px-4 py-2 font-semibold text-gray-600 rounded">About Us</a></li>
                            <li><a href="#" class="px-4 py-2 font-semibold text-gray-600 rounded">Contact Us</a></li>
                            <li><a href="#" class="px-4 py-2 font-semibold text-gray-600 rounded">Logout</a></li>
        
                        </ul>
                    </div>
                </div>            
            </div>
        </div>
        <!-- End of Navbar -->

        <div class="container mx-auto my-5 px-5 pb-5 pt-12 bg-gradient-to-r from-green-100 to-blue-100 ">
            @yield('content')       
        
        </div>
    
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>     
        @livewireScripts
        @yield('scripts')
        @stack('scripts')
    </body>
</html>