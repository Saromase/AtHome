<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg dark:text-white">
                <div class="p-6 bg-white dark:bg-slate-700 border-b border-gray-200 dark:border-slate-600 dark:text-white">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
