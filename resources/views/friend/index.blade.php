<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-t-lg text-white">
                @foreach ($users as $user)
                    <div class="p-4">
                        <p>{{$user->name}}</p>
                        <a href="{{ url('/friend/' . $user->id . '/add') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Add</a>
                        <a href="{{ url('/friend/' . $user->id . '/remove') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Remove</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>
