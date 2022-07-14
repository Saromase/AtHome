<x-admin-layout>
    <div class="bg-gray-50 rounded dark:bg-gray-800 pb-3">
        <form class="px-3 pt-3" method="POST"
        {{-- action="{{ url('tenants.update', $tenant) }}" --}}
        action="{{ route('tenants.update', $tenant) }}"
        >
        @method('PUT')
            <div
                class="bg-gray-50 dark:text-white dark:bg-slate-800 border-b border-gray-200 dark:border-white py-2 px-2">
                {{ Str::ucfirst(__('admin.tenants.add_tenant')) }}
            </div>

            @csrf

            <!-- Nom du client -->
            <div class="pb-2 pt-2">
                <x-label for="name" :value="Str::ucfirst(__('admin.tenants.name_tenant'))" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name') ?? $tenant->name" required autofocus />
            </div>

            {{-- Domain --}}
            <div class="flex w-full">
                <div class="pb-2 grow pr-1">
                    <x-label for="subdomain" :value="Str::ucfirst(__('admin.tenants.domain_name'))" />

                    <x-input id="subdomain" class="block mt-1 w-full" type="text" name="subdomain"
                        :value="old('subdomain') ?? $tenant->domains()->first()->subdomain()" required />

                </div>
                <div class="pb-2 grow pl-1">
                    <x-label for="domain" :value="Str::ucfirst(__('admin.tenants.domain_name'))" />

                    <x-select id="domain" class="block mt-1 w-full" type="select" name="domain" required>
                        <option value="localhost" {{ old('domain') === 'localhost' ? "selected" : "" }}>localhost</option>
                    </x-select>

                </div>
            </div>


            <div class="flex items-center justify-between mt-4">
                <x-button type="button">
                    <a href="{{ route('tenants.index') }}">
                        {{ __('core.button.back') }}
                    </a>
                </x-button>
                <x-button class="ml-3" type="submit">
                    {{ __('core.button.edit') }}
                </x-button>
            </div>
        </form>
    </div>
</x-admin-layout>