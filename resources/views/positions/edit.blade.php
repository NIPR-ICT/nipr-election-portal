<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Position') }}
        </h2>
    </x-slot>

    <div class="px-5 py-6 flex justify-center">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-md max-w-md w-full mx-auto">
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('positions.update', $position->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Position Name:</label>
                    <input type="text" name="name" value="{{ old('name', $position->name) }}" 
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 
                        @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Amount:</label>
                    <input type="number" name="amount" value="{{ old('amount', $position->amount) }}" 
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 
                        @error('amount') border-red-500 @enderror" required>
                    @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
