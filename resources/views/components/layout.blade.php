<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 inline-flex">

                @auth
                    <div x-data="{ show: false }" @click.away="show = false">
                        <button @click="show = !show" class="">
                            <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->username }}</span>
                        </button>
                        <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl"
                            style="display:none;">
                            @admin                        
                            <a href="/admin/posts"
                                class="block text-left px-8 text-small leading-6 hover:bg-blue-300 focus:bg-gray-300 hover:text-white">
                                Dashboard
                            </a>
                            @endadmin
                            <form action="/logout" method="post" class="block text-left px-8 text-small leading-6 hover:bg-blue-300 focus:bg-gray-300 hover:text-white">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-3 text-xs font-bold uppercase">Login</a>
                @endauth
                <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    @if (session()->has('success'))
        <div x-data="{ show:true}" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
