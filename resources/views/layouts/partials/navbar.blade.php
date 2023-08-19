
<!-- navbar -->
<header class="relative">
        <nav class="absolute top-0 left-0 right-0 z-10 mx-5 sm:mx-20 bg-transparenr border-gray-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{url('/images/RoadWatch Logo.png')}}" class="h-8 mr-3" alt="RoadWatch Logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-primary focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>

                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-normal flex flex-col p-4 md:p-0 mt-4  rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                    <a href="{{ url('/') }}" class="block py-2 pl-3 pr-4 md:text-black sm:text-primary rounded hover:bg-secondary md:hover:bg-transparent md:border-0 sm:hover:text-black md:hover:text-secondary transition ease-in-out delay-150 md:p-0" aria-current="page">Home</a>
                    </li>
                    <li>
                    <a href="{{ route('about.page') }}" class="block py-2 pl-3 pr-4 md:text-black sm:text-primary rounded hover:bg-secondary md:hover:bg-transparent md:border-0 sm:hover:text-black md:hover:text-secondary transition ease-in-out delay-150 md:p-0">About</a>
                    </li>
                    <li>
                    <a href="{{ route('contact.page') }}"class="block py-2 pl-3 pr-4 md:text-black sm:text-primary rounded hover:bg-secondary md:hover:bg-transparent md:border-0 sm:hover:text-black md:hover:text-secondary transition ease-in-out delay-150 md:p-0">Contact</a>
                    </li>
                    @guest
                    <li>
                    <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4  sm:text-primary rounded hover:bg-secondary md:hover:bg-transparent md:border-0 sm:hover:text-black md:hover:text-secondary transition ease-in-out delay-150 md:p-0">{{ __('Login') }}</a>
                    </li>
                    <li>
                    @if (Route::has('register'))
                                    <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                    </li>

                    @else
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{ route('outlets.index') }}">Reports</a>
                            </li>
                            <li class="nav-item text-black dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
                </div>
            </div>
        </nav>
</header>