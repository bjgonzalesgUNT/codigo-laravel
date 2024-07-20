@csrf
<div class="w-full">
    <label for="title" class="capitalize mb-2 font-semibold text-lg">titulo</label>
    <input type="text" name="title" class="w-full rounded-md shadow-md p-1 disabled:bg-gray-300 disabled:cursor-not-allowed"
        value="{{ old('title', $service->title) }}" @disabled(!$showBtn)>
    @error('title')
        <p class="text-red-500 font-semibold">{{ $message }}</p>
    @enderror
</div>
<div class="w-full">
    <label for="description" class="capitalize mb-2 font-semibold text-lg">descripcion</label>
    <input type="text" name="description"
        class="w-full rounded-md shadow-md p-1 disabled:bg-gray-300 disabled:cursor-not-allowed"
        value="{{ old('description', $service->description) }}" @disabled(!$showBtn)>
    @error('description')
        <p class="text-red-500 font-semibold">{{ $message }}</p>
    @enderror
</div>
@if ($showBtn)
    <input type="submit"
        class="w-full bg-indigo-800 uppercase text-white rounded-md p-2 font-bold cursor-pointer hover:bg-indigo-900 transition-all duration-300 ease-in-out hover:ring-2 hover:ring-white"
        value="{{ $btnTitle }}">
@endif
