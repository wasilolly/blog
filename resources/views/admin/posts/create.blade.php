<x-admin headerName="Create a Post">

    <form action="/admin/posts" method="post" enctype="multipart/form-data">
        @csrf
        <x-form.input inputName="title" />
        <x-form.input inputName="slug" />
        <x-form.input inputName="excerpt" />
        <x-form.input inputName="thumbnail" type="file" />

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" class="w-full border border-gray-400"
                placeholder="Write something amazing......" required> {{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Category</label>
            <select name="category_id" id="category_id">Select a Category
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="text-center bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">Publish
            </button>
        </div>
    </form>

</x-admin>
