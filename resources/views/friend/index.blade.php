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
                                        <label>
                                            <input type="search" name="username"
                                                   class="block w-full p-4 mr-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                   placeholder="Search user"/>
                                        </label>
                                        <button type="submit"
                                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @isset ($results)
                                @foreach($results as $result)
                                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 py-2">
                                        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                                            <div class="flex w-full items-center justify-between space-x-6 p-6">
                                                <div class="flex-1 truncate">
                                                    <div class="flex items-center space-x-3">
                                                        <h3 class="truncate text-sm font-medium text-gray-900">{{$result->name}}</h3>
                                                        @if(!$result->weights->isEmpty())
                                                            <span
                                                                class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                            {{$result->weights->sortBy('date')->last()->weight}}kg</span>
                                                        @endif
                                                        @if(!$result->weights->isEmpty())
                                                            <span
                                                                class="inline-flex flex-shrink-0 items-center rounded-full bg-red-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-red-600/20">
                                                                {{$result->weights->sortBy('date')->last()->bodyfat}}%</span>
                                                        @endif
                                                    </div>
                                                    <p class="mt-1 truncate text-sm text-gray-500">Lorem ipsum</p>
                                                </div>
                                                @if(empty($result->profile_photo_path))
                                                    <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                                                         src="{{@asset('/images/user.png')}}" alt="userImage">

                                                @else
                                                    <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                                                         src="{{@asset($result->profile_photo_path)}}" alt="userImage">
                                                @endif
                                            </div>
                                            <div class="-mt-px flex divide-x divide-gray-200">
                                                {{--if user is already friends--}}
                                                @if($friends->contains('user_id', $result->id) or $friends->contains('friend_id', $result->id))
                                                    <div class="flex w-0 flex-1">
                                                        <a href="{{ url('/friend/' . $result->id . '/remove') }}"
                                                           class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-user-minus">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                                                <path
                                                                    d="M6 21v-2a4 4 0 0 1 4 -4h4c.348 0 .686 .045 1.009 .128"/>
                                                                <path d="M16 19h6"/>
                                                            </svg>
                                                            Remove
                                                        </a>
                                                    </div>
                                                @elseif($friendRequestsSend->contains('receiver_id', $result->id) and $friendRequestsSend->contains('status', 'pending'))
                                                    <div class="-ml-px flex w-0 flex-1">
                                                        <a href="{{ url('/friend/' . $result->id . '/remove') }}"
                                                           class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                                                <path d="M16 19h6"/>
                                                                <path d="M19 16v6"/>
                                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4"/>
                                                            </svg>
                                                            Decline
                                                        </a>
                                                    </div>
                                                @elseif($friendRequestsReceived->contains('sender_id', $result->id) and $friendRequestsReceived->contains('status', 'pending'))
                                                    <div class="flex w-0 flex-1">
                                                        <a href="{{ url('/friend/' . $result->id . '/accept') }}"
                                                           class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-user-minus">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                                                <path
                                                                    d="M6 21v-2a4 4 0 0 1 4 -4h4c.348 0 .686 .045 1.009 .128"/>
                                                                <path d="M16 19h6"/>
                                                            </svg>
                                                            Accept
                                                        </a>
                                                    </div>
                                                    <div class="-ml-px flex w-0 flex-1">
                                                        <a href="{{ url('/friend/' . $result->id . '/remove') }}"
                                                           class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                                                <path d="M16 19h6"/>
                                                                <path d="M19 16v6"/>
                                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4"/>
                                                            </svg>
                                                            Reject
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="flex w-0 flex-1">
                                                        <a href="{{ url('/friend/' . $result->id . '/accept') }}"
                                                           class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-user-minus">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                                                <path
                                                                    d="M6 21v-2a4 4 0 0 1 4 -4h4c.348 0 .686 .045 1.009 .128"/>
                                                                <path d="M16 19h6"/>
                                                            </svg>
                                                            Add
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endisset
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
                                            @isset($friends)
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
                                            @endisset
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
                                            @isset($friendRequestsReceived)
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
                                            @endisset
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
                                            @isset($friendRequestsSend)
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
                                            @endisset
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
