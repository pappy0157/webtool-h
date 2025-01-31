<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Re-verify {{ $name }} v{{ $version }} — Bitflan</title>
    <link rel="icon" href="{{ asset('static-backend/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}" />
    @livewireStyles()
</head>
<body>
    <main class="h-screen w-screen overflow-hidden bg-gray-100 flex items-center justify-center px-6 flex-col">
        <img src="{{ asset('static-backend/logo.webp') }}" width="222" />

        <section class="max-w-[550px] w-full rounded bg-white shadow-md p-6 text-center flex flex-col items-center justify-center mt-3">
            <div>
               Please re-verify your license for <strong>{{ $name }}</strong> <span class="text-xs font-bold ml-1 px-2 py-0.5 bg-green-600 text-white rounded-lg">{{ $version }}</span>
            </div>
        </section>

        <div class="max-w-[550px] w-full mt-3">
            <section class="w-full rounded bg-white shadow-md p-6">
                <livewire:bitflan.locker />
            </section>
        </div>
    </main>
    @livewireScripts()
</body>
</html>