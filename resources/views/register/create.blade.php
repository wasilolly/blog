<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form action="/register" method="post">
                @csrf
                <x-form.input inputName="username" />
                <x-form.input inputName="name" />
                <x-form.input inputName="email" type="email" />
                <x-form.input inputName="password" type="password" />
                
                <div class="mb-6">
                    <button class="text-center bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">Submit</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
