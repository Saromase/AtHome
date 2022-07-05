<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    {{-- Toolbar --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b dark:bg-slate-800 border-gray-200">
                    <button class="p-2 bg-green-500 hover:bg-green-600 active:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
                        Ajouter
                    </button>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>