@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit User</h1>

    <!-- Form Container -->
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- User Image -->
            <div class="flex justify-center mb-4">
                <img src="https://avatar.iran.liara.run/public/{{ $user->id }}" alt="User Image" class="w-20 h-20 rounded-full border border-gray-200">
            </div>

            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Bio Input -->
            <div class="mb-4">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $user->bio }}</textarea>
            </div>

            <!-- Admin Checkbox -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="is_admin" name="is_admin" {{ $user->is_admin ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="is_admin" class="ml-2 block text-sm font-medium text-gray-700">Is Admin</label>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update</button>
                <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
