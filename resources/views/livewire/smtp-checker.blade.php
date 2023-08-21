<div>

    <div class="flex justify-center items-center px-4 py-3 rounded relative">
        @if (session()->has('success'))
            <p class="text-green-700">{{ session('success') }}</p>
        @endif
        @if (session()->has('error'))
            <p class="text-red-700">{{ session('error') }}</p>
        @endif
    </div>

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <x-guest-layout>
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <form wire:submit.prevent="smtpSingleChecker">
                    @csrf
                    <div class="mb-4">
                        <x-label for="username" :value="__('Username')" />
                        <x-input wire:model.defer="username" id="username"
                            class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200" type="text"
                            name="username" :value="old('username')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password" :value="__('Password')" />
                        <x-input wire:model.defer="password" id="password"
                            class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200" type="text"
                            name="password" required />
                    </div>

                    <div class="mb-4">
                        <x-label for="host" :value="__('Host')" />
                        <x-input wire:model.defer="host" id="host"
                            class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200" type="text"
                            name="host" :value="old('host')" required />
                    </div>

                    <div class="mb-4">
                        <x-label for="port" :value="__('Port')" />
                        <x-input wire:model.defer="port" id="port"
                            class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200" type="number"
                            name="port" :value="old('port')" required />
                    </div>

                    <div class="mb-4">
                        <x-label for="encryption" :value="__('Encryption')" />
                        <div class="relative">
                            <select wire:model.defer="encryption" id="encryption" name="encryption"
                                class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="tls" {{ old('encryption') === 'tls' ? 'selected' : '' }}>TLS
                                </option>
                                <option value="ssl" {{ old('encryption') === 'ssl' ? 'selected' : '' }}>SSL
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-label for="address" :value="__('From address')" />
                        <x-input wire:model.defer="address" id="address"
                            class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200" type="email"
                            name="address" :value="old('address')" required />
                    </div>

                    <div class="mb-4">
                        <x-label for="recipient" :value="__('Recipient')" />
                        <x-input wire:model.defer="recipient" id="recipient"
                            class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-indigo-200" type="email"
                            name="recipient" :value="old('recipient')" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button type="submit" class="ml-4" wire:loading.attr="disabled">
                            <span wire:loading.remove>
                                {{ __('Check it') }}
                            </span>
                            <span wire:loading>
                                {{ __('Checking...') }}
                            </span>
                        </x-button>
                    </div>

                </form>
            </x-authentication-card>
        </x-guest-layout>
    </div>
</div>
