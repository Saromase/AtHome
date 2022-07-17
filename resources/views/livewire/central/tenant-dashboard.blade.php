<div x-data="{ searchOpen: true }">
    <div class="h-16 rounded w-fit py-3 px-3">
        <ul class="inline-flex">
            <li class="mr-2">
                <button type="button"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-500 bg-gray-50 dark:bg-gray-600">
                    <a href="{{ route('tenants.create') }}">
                        {{ Str::ucfirst(__('core.button.add'))}}
                    </a>
                </button>
            </li>

            <li class="mr-2">
                <div class="flex h-full">
                    <x-input id="search" wire:model="search" type="text" name="search" :value="old('search')"
                        x-show="searchOpen"
                        class="items-center p-2 text-base font-normal rounded-none rounded-l-md text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-500 bg-gray-50 dark:bg-gray-600"
                        placeholder="{{ Str::ucfirst(__('core.search')) }}" autofocus required />

                    <button type="button" @click="searchOpen = ! searchOpen"
                        :class="{'hidden': searchOpen, 'inline-flex': !searchOpen }"
                        class="inline-flex sm:hidden items-center px-3 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded sm:rounded-r-md dark:bg-gray-600 dark:text-white dark:border-gray-600">
                        <svg class="h-4 w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
                        </svg>
                    </button>

                    <button type="button" @click="searchOpen = ! searchOpen"
                        :class="{'hidden': !searchOpen, 'inline-flex': searchOpen }"
                        class="inline-flex sm:hidden items-center px-3 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded sm:rounded-r-md dark:bg-gray-600 dark:text-white dark:border-gray-600">
                        <svg class="h-4 w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                                <path
                                    d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM99.5 144.8C77.15 176.1 64 214.5 64 256C64 362 149.1 448 256 448C297.5 448 335.9 434.9 367.2 412.5L99.5 144.8zM448 256C448 149.1 362 64 256 64C214.5 64 176.1 77.15 144.8 99.5L412.5 367.2C434.9 335.9 448 297.5 448 256V256z" />
                        </svg>
                    </button>
                </div>
            </li>
        </ul>
    </div>

    <div class="relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            @livewire('shared.table-header', [
            'headers' => [
            'admin.tenants.tenant_name',
            'admin.tenants.domain_name',
            'core.button.actions'
            ]
            ])

            <tbody>
                @if ($tenants->isEmpty() && $search !== '')
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th colspan="3" scope="row"
                        class="text-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ Str::ucfirst(__('admin.tenants.search_no_customer_found', [
                                'search' => $search
                            ]) )}}
                    </th>
                </tr>
                @else
                @foreach ($tenants as $tenant)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $tenant->name }}
                    </th>
                    <td class="py-4 px-6 flex items-center p-2 text-base font-normal ">
                        @foreach ($tenant->domains()->get() as $domain)
                        <svg fill="currentColor" data-tooltip-target="tooltip-copy-{{$domain->id}}"
                            data-tooltip-placement="top" onclick="copy('{{ url('http://'.$domain->domain) }}')"
                            class="cursor-pointer flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M384 96L384 0h-112c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48H464c26.51 0 48-21.49 48-48V128h-95.1C398.4 128 384 113.6 384 96zM416 0v96h96L416 0zM192 352V128h-144c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48h192c26.51 0 48-21.49 48-48L288 416h-32C220.7 416 192 387.3 192 352z" />
                        </svg>
                        <div id="tooltip-copy-{{$domain->id}}" role="tooltip"
                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ Str::ucfirst(__('core.button.copy_link')) }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <a class="text-gray-900 rounded-lg dark:text-white dark:group-hover:text-white" target="_blank"
                            data-tooltip-target="tooltip-access-{{$domain->id}}" data-tooltip-placement="top"
                            href="{{ url('http://'.$domain->domain) }}">
                            <div id="tooltip-access-{{$domain->id}}" role="tooltip"
                                class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{ Str::ucfirst(__('core.button.access')) }}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <span class="flex-1 ml-3 whitespace-nowrap"> {{ $domain->domain }}</span>
                        </a>
                        @endforeach
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex justify-start">
                            <a href="{{ route('tenants.edit', $tenant) }}">
                                <svg fill="currentColor" data-tooltip-target="action-edit-{{$tenant->id}}"
                                    data-tooltip-placement="top"
                                    class="cursor-pointer mr-1 flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                                </svg>
                                <div id="action-edit-{{$tenant->id}}" role="tooltip"
                                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    {{ Str::ucfirst(__('core.button.edit')) }}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </a>

                            @livewire('delete-tenant', ['tenant' => $tenant], key($tenant->id))
                        </div>

                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $tenants->links('livewire.shared.pagination') }}
    </div>
</div>