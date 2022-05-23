<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    </head>
    <body>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden" >
                        <!-- Mobile menu button-->
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>

                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>

                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/">
                                <span class="self-center text-xl font-bold whitespace-nowrap dark:text-white">NEWS</span>                        </div>
                            </a>
                        </div>
                        <div class="hidden relative md:block object-right">
                            <form method="GET" action="/">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                            <input type="text" name="search" value="{{ request('search') }}" id="search-navbar" class="block p-2 pl-10 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..."/>
                        </form>

                        </div>
                        @guest
                            <div class="hidden sm:block sm:ml-6">
                                <div class="flex space-x-4">
                                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                    <a href="/register" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"aria-current="page" >
                                        Register
                                    </a>
                                    <a href="/login" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"aria-current="page" >
                                        Login
                                    </a>
                                </div>
                            </div>
                        @else
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="text-xs text-white pl-8  font-bold uppercase">
                                     {{ auth()->user()->username }}
                                </button>
                            </x-slot>

                            @admin
                                <x-dropdown-item
                                    href="/admin/posts"
                                    :active="request()->is('admin/posts')"
                                >
                                    Dashboard
                                </x-dropdown-item>

                                <x-dropdown-item
                                    href="/admin/posts/create"
                                    :active="request()->is('admin/posts/create')"
                                >
                                    New Post
                                </x-dropdown-item>
                            @endadmin

                            <x-dropdown-item
                                href="#"
                                x-data="{}"
                                @click.prevent="document.querySelector('#logout-form').submit()"
                            >
                                Log Out
                            </x-dropdown-item>

                            <form id="logout-form" method="POST" action="/logout" class="hidden">
                                @csrf
                            </form>
                        </x-dropdown>

                        @endguest
                </div>
            </div>
        </nav>
        <div class="container mx-auto px-4">
            {{$slot}}
        </div>
        <script src="//unpkg.com/alpinejs" defer></script>
        @if(session()->has('success'))
            <p x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                {{ session('success') }}
            </p>
        @endif
    </body>
</html>
