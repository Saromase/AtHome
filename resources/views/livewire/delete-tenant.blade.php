{{-- <div>
    <form action="{{ route('tenants.destroy', $tenant) }}">
<button type="submit">

    <svg fill="currentColor" data-tooltip-target="action-delete-{{$tenant->id}}" data-tooltip-placement="top" class="cursor-pointer flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75
    dark:text-gray-400 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8
            17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0
            81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512
            346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z" />
    </svg>
    <div id="action-delete-{{$tenant->id}}" role="tooltip"
        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        {{ ucfirst(__('core.button.delete')) }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</button>
</form>
</div> --}}

<div>
    <button type="button" data-modal-toggle="{{ $modalId }}">

        <svg fill="currentColor" data-tooltip-target="action-delete-{{$tenant->id}}" wire:click="delete"
            data-tooltip-placement="top" class="cursor-pointer flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8
        17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0
        81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512
        346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z" />
        </svg>
        <div id="action-delete-{{$tenant->id}}" role="tooltip"
            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            {{ Str::ucfirst(__('core.button.delete')) }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </button>

    @livewire('delete-tenant-modal', ['tenant' => $tenant, 'modalId' => $modalId], key($tenant->id))
</div>