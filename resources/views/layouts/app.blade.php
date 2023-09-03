<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume API</title>

    @livewireStyles
</head>
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-100">
    <nav id="header" class="w-full z-30 top-10 py-1 bg-white shadow-lg border-b border-blue-400 mt-24">
        <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between text-base text-blue-600 pt-4 md:pt-0">
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="{{route('form-seller')}}">Home</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="{{route('all-sales')}}">All Sales</a></li>
                </nav>
            </div>
        </div>
    </nav>

    <div class="container">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>