<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <x-guest-layout>
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <form>
                        <div class="mb-4">
                            <x-label for="username" :value="__('Username')" />
                            <x-input id="username"
                                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200"
                                type="text" name="username" :value="old('username')" required autofocus
                                autocomplete="username" />
                        </div>

                        <div class="mb-4">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password"
                                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200"
                                type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mb-4">
                            <x-label for="host" :value="__('Host')" />
                            <x-input id="host"
                                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200"
                                type="text" name="host" :value="old('host')" required />
                        </div>

                        <div class="mb-4">
                            <x-label for="port" :value="__('Port')" />
                            <x-input id="port"
                                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200"
                                type="number" name="port" :value="old('port')" required />
                        </div>

                        <div class="mb-4">
                            <x-label for="encryption" :value="__('Encryption')" />
                            <div class="relative">
                                <select id="encryption" name="encryption"
                                    class="mt-1 p-2 w-full border rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="ssl" {{ old('encryption') === 'ssl' ? 'selected' : '' }}>SSL
                                    </option>
                                    <option value="tls" {{ old('encryption') === 'tls' ? 'selected' : '' }}>TLS
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-label for="address" :value="__('Address')" />
                            <x-input id="address"
                                class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200"
                                type="text" name="address" :value="old('address')" required />
                        </div>
                    </form>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Check it') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </x-guest-layout>
    </div>
</body>

</html>
