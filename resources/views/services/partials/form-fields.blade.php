@csrf
<div class="w-full">
    <label for="title" class="capitalize mb-2 font-semibold text-lg">titulo</label>
    <input type="text" name="title" id="title"
        class="w-full rounded-md shadow-md p-1 disabled:bg-gray-300 disabled:cursor-not-allowed"
        value="{{ old('title', $service->title) }}" @disabled($disabled)>
    @error('title')
        <p class="text-red-500 font-semibold">{{ $message }}</p>
    @enderror
</div>
<div class="w-full">
    <label for="description" class="capitalize mb-2 font-semibold text-lg">
        {{ __('descripcion') }}
    </label>
    <input type="text" name="description" id="description"
        class="w-full rounded-md shadow-md p-1 disabled:bg-gray-300 disabled:cursor-not-allowed"
        value="{{ old('description', $service->description) }}" @disabled($disabled)>
    @error('description')
        <p class="text-red-500 font-semibold">{{ $message }}</p>
    @enderror
</div>
<div class="w-full">
    <label for="description" class="capitalize mb-2 font-semibold text-lg">
        {{ __('Categoria') }}
    </label>
    <select name="category_id" id="category_id"
        class="w-full rounded-md shadow-md p-1 disabled:bg-gray-300 disabled:cursor-not-allowed"
        @disabled($disabled)>
        <option value="">{{ __('Seleccione una categoria') }}</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="w-full">
    <label for="image" class="capitalize mb-2 font-semibold text-lg">
        {{ __('Imagen') }}
    </label>
    <input type="file" name="image" id="image"
        class="w-full rounded-md shadow-md p-1 disabled:bg-gray-300 disabled:cursor-not-allowed"
        value="{{ old('image', $service->image) }}" @disabled($disabled)>
    @error('image')
        <p class="text-red-500 font-semibold">{{ $message }}</p>
    @enderror
    <div class="relative hidden" id="previewCtn">
        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
            class="w-full h-64 object-cover rounded-md shadow-md" id="preview">
        <button type="button" id="removeImg"
            class="absolute size-10 rounded-full top-4 right-4 bg-white text-black hover:text-white hover:bg-cyan-800 transition-colors disabled:cursor-not-allowed"
            @disabled($disabled)>
            X
        </button>
    </div>
</div>
@if (!$disabled)
    <input type="submit"
        class="w-full bg-indigo-800 uppercase text-white rounded-md p-2 font-bold cursor-pointer hover:bg-indigo-900 transition-all duration-300 ease-in-out hover:ring-2 hover:ring-white"
        value="{{ $btnTitle }}">
@endif

<script src="{{ asset('js/service.js') }}"></script>
