<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
</head>

<body class="bg-pink-200">
    <div class="">
        <!-- Include Navbar -->
        @include('components.navbar')

        <!-- Main Content -->
        <main class="bg-pink-200 mx-12">
            @yield('content')
        </main>
    </div>

    <!-- Flowbite JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>