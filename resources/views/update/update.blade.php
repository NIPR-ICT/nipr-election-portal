@include('includes.header')

<main class="container mx-auto mt-10 px-6">
    <div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
        @if(session('message'))
            <div class="text-green-600 text-center mb-4">{{ session('message') }}</div>
        @endif

        @if($member->status !== 'completed')
        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <h2 class="text-xl font-semibold mb-4 text-center">Update Your Profile</h2>
            <form action="{{ route('update.profile.data', $member->id) }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="id" value="{{$member->id}}">
                <div class="mb-4">
                    <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name:</label>
                    <input type="text" name="fullname" id="current_position" value="{{$member->surname}} {{$member->first_name}} {{$member->other_names}}" readonly class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Your Email:</label>
                    <input type="email" name="email" id="current_position" value="{{$member->email}}" readonly class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3">
                </div>

                <div class="mb-4">
                    <label for="current_position" class="block text-sm font-medium text-gray-700">Current Position:</label>
                    <select id="current_position" name="current_position" class="w-full border border-gray-300 p-2 rounded-md text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
                  <option value="">Select Current Position</option>
                  <option value="President">President</option>
                  <option value="Vice President">Vice President</option>
                  <option value="Chapter Chairman">Chapter Chairman</option>
                  <option value="Chapter Secretary">Chapter Secretary</option>
                  <option value="Chapter PRO">Chapter PRO</option>
                </select>
                </div>

                <div class="mb-4">
                    <label for="contact_address" class="block text-sm font-medium text-gray-700">Contact Address:</label>
                    <textarea name="contact_address" id="contact_address" rows="3" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3 resize-none h-28">{{ old('contact_address', $member->contact_address) }}</textarea>
                    @error('contact_address')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                </div>

                <div class="mb-4">
                    <label for="program_of_contestant_if_elected" class="block text-sm font-medium text-gray-700">Program of Contestant if Elected:</label>
                    <textarea name="program_of_contestant_if_elected" id="program_of_contestant_if_elected" rows="4" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3 resize-none h-32">{{ old('program_of_contestant_if_elected', $member->program_of_contestant_if_elected) }}</textarea>
                    @error('program_of_contestant_if_elected')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
                </div>

                <div class="mb-4">
                    <label for="profile_of_contestant" class="block text-sm font-medium text-gray-700">Profile of Contestant:</label>
                    <textarea name="profile_of_contestant" id="profile_of_contestant" rows="5" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3 resize-none h-36">{{ old('profile_of_contestant', $member->profile_of_contestant) }}</textarea>
                    @error('profile_of_contestant')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
                </div>

                <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Update Profile
                </button>
            </form>
        </div>
        @else
            <p class="text-center text-gray-600">You have already uploaded your passport.</p>
        @endif
    </div>
</main>

@include('includes.footer')
