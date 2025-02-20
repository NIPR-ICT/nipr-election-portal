@include('includes.header')

<main class="container mx-auto mt-10 px-6">
    <div class="bg-white shadow rounded-lg p-6 text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-6">
             Update Successfully!
        </h1>

        @if (session('message'))
            <p class="text-lg text-gray-700 mb-4">
                {{ session('message') }}
            </p>
        @endif

        <div class="mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4m-6 4h6m-3 0a9 9 0 11-9-9a9 9 0 010 18a9 9 0 019-9z" />
            </svg>
        </div>
        <a href="#" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Print Acknowledgement Form
        </a>
    </div>
</main>

@include('includes.footer')