<nav class="w-full py-2 flex flex-wrap items-center justify-between {{ $dark == 'true' ? 'text-gray-800' : 'text-white' }} {{ $styles ?? '' }}">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between {{ $dark == 'true' ? 'border-b border-gray-800 border-opacity-25' : '' }}">
        <div class="w-full relative flex justify-between lg:w-auto px-4 lg:static lg:block lg:justify-start">
            <div class="text-md font-bold leading-relaxed inline-block py-2 whitespace-no-wrap uppercase cursor-pointer {{ $dark == 'true' ? 'text-black' : 'text-white' }}">
                Forum
            </div>
        </div>

        <div class="lg:flex lg:flex-grow items-center mr-auto">

            <!-- Left Navbar Side -->
            <ul class="flex flex-col lg:flex-row list-none">
                <li>
                    <dropdown
                        button_classes="{{ $dropdownButtonClass ?? 'button-dropdown-transparent' }} w-full"
                        button_title="Threads"
                    >
                        <template v-slot:items>
                            <a href="{{ route('threads.index') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800 hover:bg-gray-300">
                                All Threads
                            </a>

                            @auth
                            <a href="{{ route('threads.index', ['filter[user.username]' => Auth::user()->username]) }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800 hover:bg-gray-300">
                                My Threads
                            </a>

                            <a href="{{ route('threads.create') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800 hover:bg-gray-300">
                                New Thread
                            </a>
                            @endauth
                        </template>
                    </dropdown>
                </li>

                <li>
                    <dropdown
                        button_classes="{{ $dropdownButtonClass ?? 'button-dropdown-transparent' }} w-full"
                        button_title="Channels"
                    >
                        <template v-slot:items>
                            @foreach (App\Channel::all() as $channel)
                                <a href="{{ route('threads.filter', $channel) }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800 hover:bg-gray-400">
                                    {{ $channel->slug }}
                                </a>
                            @endforeach
                        </template>
                    </dropdown>
                </li>
            </ul>

            <!-- Right Navbar Side -->
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">

                @auth
                    <li>
                        <dropdown
                            button_classes="{{ $dropdownButtonClass ?? 'button-dropdown-transparent' }} w-full"
                            button_title="{{ Auth::user()->name }}"
                        >
                            <template v-slot:items>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800 hover:bg-gray-300">
                                    Logout
                                </a>
                                {!! Form::open(['url' => route('logout'), 'id' => 'logout-form', 'class' => 'invisible']) !!}
                                {!! Form::close() !!}
                            </template>
                        </dropdown>
                    </li>
                @else
                    <a class="px-4 py-2 flex items-center text-xs uppercase leading-snug hover:opacity-75" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="px-4 py-2 flex items-center text-xs uppercase leading-snug hover:opacity-75" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endauth
            </ul>
        </div>
    </div>
</nav>
