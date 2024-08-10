<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categoría ' . $category->name) }}
        </h2>
    </x-slot>
    <div class="py-12 px-40">
        <div class="p-1">
            <a href="{{ route('services.index') }}" class="text-cyan-700 font-bold">
                {{ __('Regresar') }}
            </a>
        </div>
        <div class="grid grid-cols-4 mt-2">
            @forelse ($services as $service)
                <div class="">
                    <div class="w-full h-60">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ __('img_' . $service->id) }}"
                            class="size-full object-cover">
                    </div>
                    <div class="bg-white p-2">
                        <h2 class="text-2xl font-bold">{{ $service->title }}</h2>
                        <p class="text-lg">{{ $service->description }}</p>
                        <p class="text-lg">{{ $service->category->name }}</p>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</x-app-layout>
