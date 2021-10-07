<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form action="/register" method="post">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="username">Username</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" value="{{old('username')}}">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="name">Name</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{old('name')}}">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="email">Email</label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{old('email')}}">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5" for="password">Password</label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password">
                </div>
                
                <div class="mb-6">
                    <button class="text-center bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">Submit</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
