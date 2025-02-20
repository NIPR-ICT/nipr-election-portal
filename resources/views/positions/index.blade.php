<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-white leading-tight text-left">
            {{ __('Manage Positions') }}
        </h2>
    </x-slot>

    <div class="px-5 py-6">
        <!-- Add Position Button -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('positions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add New Position</a>
        </div>

        <!-- Positions Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-900 p-4 rounded shadow-md">
            <table class="min-w-full border border-gray-200 dark:border-gray-700">
                <thead class="bg-gray-300 dark:bg-gray-800 text-gray-900 dark:text-white">
                    <tr>
                        <th class="px-2 py-2">#</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-white">
                    @foreach ($positions as $key => $position)
                    <tr class="border-t dark:border-gray-700">
                        <td class="px-4 py-2">{{ $key + 1 }}</td>
                        <td class="px-4 py-2">{{ $position->name }}</td>
                        <td class="px-4 py-2">{{ number_format($position->amount, 2) }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('positions.edit', $position->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
