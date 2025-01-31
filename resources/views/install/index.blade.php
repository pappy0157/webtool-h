<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Install {{ $name }} v{{ $version }} — Bitflan</title>
    <link rel="icon" href="{{ asset('static-backend/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}" />
    @livewireStyles()
</head>
<body>
    <main class="flex flex-col items-center justify-center w-screen h-screen px-6 overflow-hidden bg-gray-100">
        <img src="{{ asset('static-backend/logo.webp') }}" width="222" />

        <section class="max-w-[550px] w-full rounded bg-white shadow-md p-6 text-center flex flex-col items-center justify-center mt-3">
            <div>
                You are installing <strong>{{ $name }}</strong> <span class="text-xs font-bold ml-1 px-2 py-0.5 bg-green-600 text-white rounded-lg">{{ $version }}</span>
            </div>
        </section>

        @livewire('installer')
    </main>
    @livewireScripts()
</body>
</html>