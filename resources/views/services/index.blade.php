<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios') }}
        </h2>
    </x-slot>
    <div class="py-12 px-40">
        @auth
            <div class="w-full flex justify-end items-center">
                <a class="p-3 rounded-md shadow-md bg-green-500 text-white hover:bg-green-800 transition-colors duration-100"
                    href="{{ route('services.create') }}">
                    Crear servicio
                </a>
            </div>
        @endauth
        <div class="w-full">
            <table class="mt-4 table-fixe w-full">
                <thead>
                    <tr>
                        @include('components.table.TableTh', ['value' => 'titulo'])
                        @include('components.table.TableTh', ['value' => 'descripcion'])
                        @include('components.table.TableTh', ['value' => 'acciones'])
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            @include('components.table.TableTd', ['value' => $service->title])
                            @include('components.table.TableTd', ['value' => $service->description])
                            @component('components.table.TableTdActions')
                                @include('components.buttons.btn-show', [
                                    'route' => 'services.show',
                                    'id' => $service->id,
                                ])
                                @auth
                                    @include('components.buttons.btn-edit', [
                                        'route' => 'services.edit',
                                        'id' => $service->id,
                                    ])
                                    @include('components.buttons.btn-delete', [
                                        'route' => 'services.destroy',
                                        'id' => $service->id,
                                    ])
                                @endauth
                            @endcomponent
                        </tr>
                    @empty
                        <tr class="text-xl font-bold uppercase text-red-500">
                            <td> No existen servicios para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $services->links() }}</div>
        </div>
    </div>
    @if (session('status'))
        <div class="fixed bottom-5 right-5 p-4 bg-green-500 rounded-lg text-white text-lg">
            {{ session('status') }}
        </div>
    @endif

</x-app-layout>
