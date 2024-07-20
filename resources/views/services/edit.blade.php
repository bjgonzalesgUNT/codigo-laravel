<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar servicio #' . $service->id) }}
        </h2>
    </x-slot>
    <div class="py-12 px-40">
        <div class="w-full flex justify-center">
            <form method="POST" class="bg-gray-200 p-5 rounded-md shadow-md flex flex-col gap-4 w-1/2"
                action="{{ route('services.update', $service) }}">
                @csrf
                @method('PATCH')
                @include('services.partials.form-fields', ['btnTitle' => 'actualizar', 'showBtn' => true])
            </form>
        </div>
    </div>
</x-app-layout>
