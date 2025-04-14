<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('client.create') }}"
                class="font-semibold text-xl text-gray-800 dark:text-gray-200  border rounded-lg p-2 hover:bg-black">Créer
                un
                nouveau
                client</a>

        </div>
    </x-slot>

    <div class="py-12">
        <p></p>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Vous êtes connecté !") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>