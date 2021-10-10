@props(['headerName'])
<x-layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">{{ $headerName }}</h1>
        <div class="flex">
            <aside class="w-48">
                <h4 class="font-bold mb-2">Dashboard</h4>
                <ul>
                    <li>
                        <a href="/admin/posts"
                            class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create"
                            class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">Create</a>
                    </li>
                </ul>

            </aside>
            <!-- Admin Dashboard -->
            <main class="flex-1">
                {{ $slot}}
            </main>
        </div>
    </section>
</x-layout>
