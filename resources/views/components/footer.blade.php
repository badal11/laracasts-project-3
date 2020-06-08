<footer class="w-full {{ $styles ?? '' }}">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center md:justify-between justify-center {{ $dark == 'true' ? 'border-t border-gray-800 border-opacity-25 pt-6' : '' }}">
            <div class="w-full md:w-4/12 px-4">
                <div class="text-sm {{ $dark == 'true' ? 'text-gray-800' : 'text-white' }} font-semibold py-1">
                Copyright © 2020
                <a href="https://github.com/InfluxOW"
                    class="{{ $dark == 'true' ? 'text-gray-800' : 'text-white' }} hover:text-gray-400 text-sm font-semibold py-1"
                    >Influx</a>
                </div>
            </div>
            <div class="w-full md:w-8/12 px-4">
                <ul class="flex flex-wrap list-none md:justify-end justify-center">
                    <li>
                        <a href="#"
                        class="{{ $dark == 'true' ? 'text-gray-800' : 'text-white' }} hover:text-gray-400 text-sm font-semibold block py-1 px-3"
                        >About</a>
                    </li>
                    <li>
                        <a href="#"
                        class="{{ $dark == 'true' ? 'text-gray-800' : 'text-white' }} hover:text-gray-400 text-sm font-semibold block py-1 px-3"
                        >Blog</a>
                    </li>
                    <li>
                        <a href="#"
                        class="{{ $dark == 'true' ? 'text-gray-800' : 'text-white' }} hover:text-gray-400 text-sm font-semibold block py-1 px-3"
                        >MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>