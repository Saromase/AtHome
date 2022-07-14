<x-admin-layout>
    <div class="h-16 rounded w-fit py-3 px-3">
        <ul>
            <li>
                <button type="button"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-500 bg-gray-50 dark:bg-gray-600">
                    <a href="{{ route('tenants.create') }}">
                        {{ ucfirst(__('core.button.add'))}}
                    </a>
                </button>
            </li>
        </ul>
    </div>

    <div>
        Container
    </div>
</x-admin-layout>