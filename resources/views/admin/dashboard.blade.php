<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex p-6 m-4 justify-between">

        <div class="flex justify-center p-2 mx-1">
            <div class="block p-6 rounded-lg shadow-lg bg-white dark:bg-slate-800  max-w-sm">
              <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2"> {{ __('gestion des clients') }}</h5>
              <p class="text-gray-700 text-base mb-4">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>
              <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Accéder
              </button>
            </div>
        </div>

        <div class="flex justify-center p-2 mx-1">
            <div class="block p-6 rounded-lg shadow-lg bg-white dark:bg-slate-800  max-w-sm">
              <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Card title</h5>
              <p class="text-gray-700 text-base mb-4">
                Some quick example text to build on the card title and make up the bulk of the card's
                content.
              </p>
              <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Button</button>
            </div>
        </div>

          
    </div>
</x-app-layout>