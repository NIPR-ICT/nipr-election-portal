<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-5 py-6">

                <!-- Existing Section -->
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-4 mt-4">
                    <!-- Card 1 -->
                    <div>
                        <a href="{{route('positions.index')}}" class="no-underline">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded shadow-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div>
                                    <h5 class="text-gray-900 dark:text-white font-semibold">Registration Fees</h5>
                                    <p class="text-gray-600 dark:text-gray-300">Click on the Card to View</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Card 2 -->
                    <div>
                        <a href="#" class="no-underline">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded shadow-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div>
                                    <h5 class="text-gray-900 dark:text-white font-semibold">Click to Manage Price Plans</h5>
                                    <p class="text-gray-600 dark:text-gray-300">Manage Price Plans</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Card 3 -->
                    <div>
                        <a href="#" class="no-underline">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded shadow-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <div>
                                    <h5 class="text-gray-900 dark:text-white font-semibold">All Registered Members</h5>
                                    <p class="text-gray-600 dark:text-gray-300">Click to View Registered Members</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
    </div>
</x-app-layout>