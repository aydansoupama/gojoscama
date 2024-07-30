<aside class="font-satoshi col-span-3 -translate-x-80 inset-0 z-50 h-screen w-72 border border-y-0 border-l-0 border-r-1 border-dashed transition-transform duration-300 xl:translate-x-0">
    <div class="relative border-b border-white/20">
        <a class="flex items-center gap-4 py-6 px-8" href="#/">
            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">
                Flambeur SCAMA
            </h6>
        </a>
        <button class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden"
                type="button">
            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                     stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </span>
        </button>
    </div>
    <div class="m-4">
        <x-sidebar-category :name="'Accueil'" :items="[
            ['name' => 'Scama', 'link' => '/products', 'icon' => 'fa-cart-shopping'],
            ['name' => 'Recharger', 'link' => '/deposit', 'icon' => 'fa-sync-alt'],
            ['name' => 'Mes commandes', 'link' => '/commands', 'icon' => 'fa-box'],
        ]" />

        <x-sidebar-category :name="'Autres'" :items="[
            ['name' => 'Canal Telegram', 'link' => 'https://t.me/scamaflambeur', 'icon' => 'fa-users'],
        ]" />
    </div>
</aside>
