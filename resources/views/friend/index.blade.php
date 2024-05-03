<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>
    {{--User search--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-800 py-10 rounded-lg">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <form class="max-w-md mx-auto" action="{{ url('/friend/search') }}" method="GET">
                                    <label for="default-search"
                                           class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                        </div>
                                        <input type="search" name="username"
                                               class="block w-full p-4 mr-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="Search user" required/>
                                        <button type="submit"
                                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            {{$results = session('results')}}
                            @if ($results)
                                @foreach($results as $result)
                                    <ul role="list" class="divide-y divide-gray-100">
                                        <li class="flex items-center justify-between gap-x-6 py-5">
                                            <div class="flex min-w-0 gap-x-4">
                                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                                     src="{{$result->profile_photo_path}}"
                                                     alt="">
                                                <div class="min-w-0 flex-auto">
                                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{$result->name}}</p>
                                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$result->email}}</p>
                                                </div>
                                            </div>
                                            <a href="{{ url('/friend/' . $result->id . '/request') }}"
                                               class="rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Add</a>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                            {{--                                <a href="#"--}}
                            {{--                                   class="flex w-full items-center justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">View--}}
                            {{--                                    all</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--All friends--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-800 py-10 rounded-lg">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-white">All friends</h1>
                                    <p class="mt-2 text-sm text-gray-300">A list of all the friends.</p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                    <p>test</p>
                                </div>
                            </div>
                            <div class="mt-8 flow-root">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <table class="min-w-full divide-y divide-gray-700">
                                            <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-800">
                                            @if($friends->count() == 0)
                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                        You don't have any friends..
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach($friends as $friend)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$friend->user->name}}</td>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                            <a href="{{ url('/friend/' . $friend->user->id . '/remove') }}"
                                                               class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Remove</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Received friend requests--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-800 py-10 rounded-lg">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-white">Received friend
                                        requests</h1>
                                    <p class="mt-2 text-sm text-gray-300">A list of all the received friend
                                        requests.</p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                    <p>test</p>
                                </div>
                            </div>
                            <div class="mt-8 flow-root">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <table class="min-w-full divide-y divide-gray-700">
                                            <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-800">
                                            @if($friendRequestsReceived->count() == 0)
                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                        There are currently no pending friend requests.
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach($friendRequestsReceived as $friendRequestReceived)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$friendRequestReceived->sender->name}}</td>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                            <a href="{{ url('/friend/' . $friendRequestReceived->sender->id . '/accept') }}"
                                                               class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-full">Accept</a>
                                                            <a href="{{ url('/friend/' . $friendRequestReceived->sender->id . '/reject') }}"
                                                               class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Reject</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Sent friend requests--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-800 py-10 rounded-lg">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-white">Sent friend requests</h1>
                                    <p class="mt-2 text-sm text-gray-300">A list of all the sent friend requests.</p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                    <p>test</p>
                                </div>
                            </div>
                            <div class="mt-8 flow-root">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <table class="min-w-full divide-y divide-gray-700">
                                            <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-800">
                                            @if($friendRequestsSend->count() == 0)
                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                        There are currently no pending friend requests.
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach($friendRequestsSend as $friendRequestSend)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$friendRequestSend->receiver->name}}</td>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                            <a href="{{ url('/friend/' . $friendRequestSend->receiver->id . '/cancel') }}"
                                                               class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Cancel</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
