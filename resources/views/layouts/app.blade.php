<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs"></script>
    <style type="text/tailwindcss">
        label{
            @apply block uppercase mb-2 text-slate-700
        }

        input,textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
    </style>
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <header class="text-2xl font-bold mb-10">@yield('title')</header>
    <div x-data="{flash : true}">
        @if(session()->has('success'))
        <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-400 px-4 py-3 text-lg text-green-700" role="alert">
            <strong class="font-bold">Success! </strong>{{session('success')}}
            <span class="absolute top-0 bottom-0 px-4 py-3 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 cursor-pointer" @click="flash = false">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        @endif
        @yield('content')
    </div>
</body>

</html>