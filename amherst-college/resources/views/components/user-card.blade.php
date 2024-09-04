<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <img src="https://avatar.iran.liara.run/public/{{ $user->id }}" alt="User Image" class="w-12 h-12 rounded-full mx-auto mt-4">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800 text-center">{{ $user->specialName }}</h2>
        
        <!-- User Role -->
        <div class="text-center mt-2">
            <span class="inline-block px-2 py-1 text-xs font-medium {{ $user->is_admin ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }} rounded-full">
                {{ $user->is_admin ? 'Admin' : 'User' }}
            </span>
        </div>

        <!-- Bio Heading and Bio Content -->
        <div class="mt-4">
            <h3 class="text-sm font-medium text-gray-700">Bio</h3>
            <p class="text-sm text-gray-600 mt-1">{{ $user->bio }}</p>
        </div>
        
        <!-- Actions -->
        <div class="mt-4 flex justify-between items-center">
            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 flex items-center space-x-1">
                <x-icon-edit class="w-5 h-5" /> <span>Edit</span>
            </a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 flex items-center space-x-1">
                    <x-icon-trash class="w-5 h-5" /> <span>Delete</span>
                </button>
            </form>
        </div>
    </div>
</div>
