<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contactos') }}
        </h2>
    </x-slot>
    <div class="py-12 px-40">
        @auth
            <div class="w-full flex justify-end items-center">
                <a class="p-3 rounded-md shadow-md bg-green-500 text-white hover:bg-green-800 transition-colors duration-100"
                    href="{{ route('contacts.create') }}">
                    Crear contacto
                </a>
            </div>
        @endauth
        <table class="mt-4 table-fixe w-full">
            <thead>
                <tr>
                    @include('components.table.TableTh', ['value' => 'nombre'])
                    @include('components.table.TableTh', ['value' => 'email'])
                    @include('components.table.TableTh', ['value' => 'asunto'])
                    @include('components.table.TableTh', ['value' => 'mensaje'])
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        @include('components.table.TableTd', ['value' => $contact->name])
                        @include('components.table.TableTd', ['value' => $contact->email])
                        @include('components.table.TableTd', ['value' => $contact->case])
                        @include('components.table.TableTd', ['value' => $contact->message])
                    </tr>
                @empty
                    <tr class="text-xl font-bold uppercase text-red-500">
                        <td> No existen servicios para mostrar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $contacts->links() }}</div>
    </div>
</x-app-layout>
