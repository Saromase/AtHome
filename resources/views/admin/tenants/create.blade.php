<x-admin-layout>
    <div class="bg-gray-50 rounded dark:bg-gray-800 pb-3">
        <form class="px-3 pt-3" method="POST" action="{{ route('tenants.store') }}">
            <div
                class="bg-gray-50 dark:text-white dark:bg-slate-800 border-b border-gray-200 dark:border-white py-2 px-2">
                {{ ucfirst(__('admin.tenants.add_tenant')) }}
            </div>

            @csrf

            <!-- Nom du client -->
            <div class="pb-2 pt-2">
                <x-label for="tenant_name" :value="ucfirst(__('admin.tenants.name_tenant'))" />

                <x-input id="tenant_name" class="block mt-1 w-full" type="text" name="tenant_name" :value="old('tenant_name')" required
                    autofocus />
            </div>

            <!-- Identifiant du client -->
            <div class="pb-2">
                <x-label for="tenant_id" :value="ucfirst(__('admin.tenants.id_tenant'))" />

                <x-input id="tenant_id" class="block mt-1 w-full" type="text" name="tenant_id" :value="old('tenant_id')" />
            </div>

            {{-- Domain --}}
            <div class="flex w-full">
                <div class="pb-2 grow pr-1">
                    <x-label for="tenant_domain" :value="ucfirst(__('admin.tenants.domain_name'))" />

                    <x-input id="tenant_domain" class="block mt-1 w-full" type="text" name="tenant_domain" :value="old('tenant_domain')"
                        required />

                </div>
                <div class="pb-2 grow pl-1">
                    <x-label for="tenant_subdomain" :value="ucfirst(__('admin.tenants.domain_name'))" />

                    <x-select id="tenant_subdomain" class="block mt-1 w-full" type="select" name="tenant_subdomain" required>
                        <option value="localhost" {{ old('tenant_subdomain') === 'localhost' ? "selected" : "" }}>localhost
                        </option>
                    </x-select>

                </div>
            </div>

            

            


            {{-- Ajout Administrateur --}}
            <div
                class="bg-gray-50 dark:text-white dark:bg-slate-800 border-b border-gray-200 dark:border-white py-2 px-2">
                {{ ucfirst(__('admin.tenants.add_administrator')) }}
            </div>

            {{-- Administrateur --}}
            <div class="flex w-full pt-2">
                <div class="pb-2 grow pr-1">
                    <x-label for="administrator_name" :value="ucfirst(__('Name'))" />

                    <x-input id="administrator_name" class="block mt-1 w-full" type="text" name="administrator_name" :value="old('administrator_name')"
                        required />

                </div>
                <div class="pb-2 grow pl-1">
                    <x-label for="administrator_email" :value="ucfirst(__('Email'))" />

                    <x-input id="administrator_email" class="block mt-1 w-full" type="email" name="administrator_email" :value="old('administrator_name')"
                        required />


                </div>
            </div>

            <div class="pb-2">
                <x-label for="administrator_password" :value="ucfirst(__('Password'))" />
                @livewire('generate-random-password')
            </div>



            <div class="flex items-center justify-between mt-4">
                <x-button type="button">
                    <a href="{{ url()->previous() }}">
                        {{ __('core.button.back') }}
                    </a>
                </x-button>
                <x-button class="ml-3" type="submit">
                    {{ __('core.button.add') }}
                </x-button>
            </div>
        </form>
    </div>
</x-admin-layout>