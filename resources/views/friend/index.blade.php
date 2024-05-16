<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>

    <div class="min-h-full">
        <main class="mt-24 pb-8">
            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="sr-only">Page title</h1>
                <!-- Main 3 column grid -->
                <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
                    <!-- Left column -->
                    <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                        <section aria-labelledby="section-1-title">
                            <h2 class="sr-only" id="section-1-title">Section title</h2>
                            <div class="overflow-hidden rounded-lg bg-gray-500 shadow">
                                <div class="p-6">
                                    {{--All friends--}}
                                    <div class="py-12">
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                            <div class="bg-gray-900">
                                                <div class="mx-auto max-w-7xl">
                                                    <div class="bg-gray-800 py-10 rounded-lg">
                                                        <div class="px-4 sm:px-6 lg:px-8">
                                                            <div class="sm:flex sm:items-center">
                                                                <div class="sm:flex-auto">
                                                                    <h1 class="text-base font-semibold leading-6 text-white">
                                                                        All friends</h1>
                                                                    <p class="mt-2 text-sm text-gray-300">A list of all
                                                                        the friends.</p>
                                                                </div>
                                                                <div
                                                                    class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                                                    <p>test</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-8 flow-root">
                                                                <div
                                                                    class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                                    <div
                                                                        class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                                                        <table
                                                                            class="min-w-full divide-y divide-gray-700">
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
                                                                    <h1 class="text-base font-semibold leading-6 text-white">
                                                                        Received friend
                                                                        requests</h1>
                                                                    <p class="mt-2 text-sm text-gray-300">A list of all
                                                                        the received friend
                                                                        requests.</p>
                                                                </div>
                                                                <div
                                                                    class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                                                    <p>test</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-8 flow-root">
                                                                <div
                                                                    class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                                    <div
                                                                        class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                                                        <table
                                                                            class="min-w-full divide-y divide-gray-700">
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
                                                                                            There are currently no
                                                                                            pending friend requests.
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
                                                                    <h1 class="text-base font-semibold leading-6 text-white">
                                                                        Sent friend requests</h1>
                                                                    <p class="mt-2 text-sm text-gray-300">A list of all
                                                                        the sent friend requests.</p>
                                                                </div>
                                                                <div
                                                                    class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                                                    <p>test</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-8 flow-root">
                                                                <div
                                                                    class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                                    <div
                                                                        class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                                                        <table
                                                                            class="min-w-full divide-y divide-gray-700">
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
                                                                                            There are currently no
                                                                                            pending friend requests.
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
                                </div>
                            </div>
                        </section>
                    </div>

                    {{--Right column--}}
                    <section class="grid grid-cols-1 gap-4">
                        <div class="overflow-hidden rounded-lg bg-gray-900 shadow">
                            <div
                                class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-gray-800 text-center shadow">
                                <div class="flex flex-1 flex-col p-8">
                                    <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
                                         src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                         alt="">
                                    <h3 class="mt-6 text-sm font-medium text-white">Jane Cooper</h3>
                                </div>
                                <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="flex w-0 flex-1">
                                            <a href="mailto:janecooper@example.com"
                                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-white">
                                                {{--                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"--}}
                                                {{--                                                     fill="currentColor" aria-hidden="true">--}}
                                                {{--                                                    <path--}}
                                                {{--                                                        d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z"/>--}}
                                                {{--                                                    <path--}}
                                                {{--                                                        d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z"/>--}}
                                                {{--                                                </svg>--}}
                                                Workouts
                                            </a>
                                        </div>
                                        <div class="-ml-px flex w-0 flex-1">
                                            <a href="tel:+1-202-555-0170"
                                               class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-white">
                                                {{--                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"--}}
                                                {{--                                                     fill="currentColor" aria-hidden="true">--}}
                                                {{--                                                    <path fill-rule="evenodd"--}}
                                                {{--                                                          d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"--}}
                                                {{--                                                          clip-rule="evenodd"/>--}}
                                                {{--                                                </svg>--}}
                                                Friends
                                            </a>
                                        </div>
                                        <div class="-ml-px flex w-0 flex-1">
                                            <a href="tel:+1-202-555-0170"
                                               class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-white">
                                                {{--                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"--}}
                                                {{--                                                     fill="currentColor" aria-hidden="true">--}}
                                                {{--                                                    <path fill-rule="evenodd"--}}
                                                {{--                                                          d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"--}}
                                                {{--                                                          clip-rule="evenodd"/>--}}
                                                {{--                                                </svg>--}}
                                                Stats
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-800">
                                <p class="text-white">Last activity</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <div class="p-6">
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
                                        <ul role="list"
                                            class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 py-2">
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
                                                             src="{{@asset($result->profile_photo_path)}}"
                                                             alt="userImage">
                                                    @endif
                                                </div>
                                                <div class="-mt-px flex divide-x divide-gray-200">
                                                    if user is already friends
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
    </div>
</x-app-layout>
