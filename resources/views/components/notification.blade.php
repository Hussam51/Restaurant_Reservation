<button @click="open = !open"
    class="flex flex-row items-center px-0 py-0 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
    <div class="relative m-0 inline-flex w-fit">
        @if ($Newcount)
            <div
                class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 rounded-full bg-pink-700 p-2.5 text-xs">
                {{ $Newcount }}</div>
                @endif
            <div

                class="flex items-center justify-center rounded-lg bg-indigo-400 px-0 py-0 text-center text-white shadow-lg dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10">
                    <path fill-rule="evenodd"
                        d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                        clip-rule="evenodd" />
                </svg>
            </div>
    </div>
</button>
<div x-show="!open" x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-95"
    class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 z-30">
    <div class="px-2 py-2 bg-dark rounded-md shadow dark-mode:bg-gray-700">
        @if ($Newcount > 0)
            <a style="color: rgb(240, 25, 25)"
                class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="{{ route('admin.markAllAsReadnotifications') }}">Make all as read</a>
        @endif
        @foreach ($Newnotifications as $notification)
            <a class="block px-4 py-2 mt-0 text-sm @if ($notification->unread()) font-semibold @endif bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline "
                href="{{ $notification->data['url'] }}?notification_id={{ $notification->id }}"><i
                    class="{{ $notification->data['icon'] }}"></i> created by
                {{ $notification->data['user_name'] }} -at {{ $notification->created_at }}</a>
        @endforeach
    </div>
</div>
