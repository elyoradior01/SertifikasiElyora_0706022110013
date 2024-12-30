<nav class="bg-white">
    <div class="max-w-screen-xl flex flex-col items-center mx-auto p-3">
        <!-- Perpus Title -->
        <a class="flex flex-col items-start space-x-0 rtl:space-x-reverse mb-1">
            <span class="self-center text-2xl font-bold whitespace-nowrap">Perpustakaan</span>
        </a>
       
       
        <!-- Navbar Links -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-2 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:bg-white">
                <li>
                    <a href="{{ route('pinjam.index') }}"
                        class="block px-3 text-gray-900 md:hover:bg-transparent md:hover:text-pink-900">Pinjam</a>
                </li>
                <li>
                    <a href="{{ route('members.index') }}"
                        class="block px-3 text-gray-900 md:hover:bg-transparent md:hover:text-pink-900">Members</a>
                </li>
                <li>
                    <a href="{{ route('books.index') }}"
                        class="block px-3 text-gray-900 md:hover:bg-transparent md:hover:text-pink-900">Books</a>
                </li>
            </ul>
        </div>
    </div>
</nav>





