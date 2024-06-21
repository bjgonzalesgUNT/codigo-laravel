<header class="flex w-full flex-col bg-indigo-800 md:flex-row md:px-2">
    <div class="flex w-full items-center justify-between gap-3 p-2.5 text-xl uppercase">
        <a class="flex items-center justify-center gap-2" href="/">
            <img src="{{ asset('/icons/home.svg') }}" alt="home_icon" class="size-8 md:size-10" />
            <div class="text-white">
                <span class="text-xl font-black uppercase md:text-2xl">
                    {{ 'codigo laravel' }}
                </span>
            </div>
        </a>
        <div class="flex items-center md:hidden">
            <button wire:click="handleShowHamburguerMenu">
                <img src="{{ asset('/icons/menu.svg') }}" alt="hamburger_icon" class="size-6" />
            </button>
        </div>
    </div>

    <div class="{{ $showHamburguerMenu ? 'flex' : 'hidden' }} w-full flex-col md:flex md:flex-row md:gap-2">
        @include('components.navbar-item', ['title' => 'home', 'ref' => 'home.index'])
        @include('components.navbar-item', ['title' => 'servicios', 'ref' => 'services.index'])
        @include('components.navbar-item', ['title' => 'contacto', 'ref' => 'contacts.index'])
        @include('components.navbar-item', ['title' => 'nosotros', 'ref' => 'about.index'])
    </div>
</header>
