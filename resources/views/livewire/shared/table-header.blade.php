<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        @foreach ($headers as $header)            
            <th scope="col" class="py-3 px-6">
                {{ __($header) }}
            </th>
        @endforeach
    </tr>
</thead>