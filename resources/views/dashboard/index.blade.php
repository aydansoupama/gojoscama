@extends('layouts.app')

@section('content')
<main class="font-satoshi min-h-screen flex gap-[60px]">
    @include("components.Sidebar")

    <section class="col-span-9 py-[105px] flex flex-col gap-6">
        <div class="header-container flex flex-col gap-4">
            <p class="text-sm font-extralight">Flambeur Scama > Scamas</p>
            <h3 class="font-extrabold text-3xl flex items-center gap-4">
                <i class="fas fa-wallet"></i>
                <span>Scama</span>
            </h3>
        </div>
    </section>
</main>
@endsection