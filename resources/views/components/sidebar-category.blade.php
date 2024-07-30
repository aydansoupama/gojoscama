@props(['name', 'items'])
<ul class="mb-4 flex flex-col gap-1">
    <li class="mx-3.5 mt-4 mb-2">
        <p class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">
            {{ $name }}
        </p>
    </li>

    @foreach ($items as $item)
        <li>
            <a href="/dashboard{{ $item["link"] }}">
                <button
                    class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                    type="button">
                    <i class="fas {{ $item["icon"] }} text-lg"></i>
                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                        {{ $item["name"] }}
                    </p>
                </button>
            </a>
        </li>
    @endforeach
</ul>