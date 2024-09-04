@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Create New User</h1>

    <form action="{{ route('users.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
            <textarea id="bio" name="bio" placeholder="Bio"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
        </div>

        <div class="flex items-center">
            <input type="checkbox" id="is_admin" name="is_admin"
                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="is_admin" class="ml-2 block text-sm font-medium text-gray-700">Is Admin</label>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Submit
            </button>
            <a href="{{ route('users.index') }}"
                class="text-blue-500 hover:text-blue-700 font-medium transition duration-300 ease-in-out">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
