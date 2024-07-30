@extends('layouts.app')

@section('content')
<main class="font-satoshi min-h-screen flex gap-[60px]">
    @include("components.Sidebar")

    <section class="col-span-9 py-[105px] flex flex-col gap-6">
        <div class="header-container flex flex-col gap-4">
            <p class="text-sm font-extralight">Flambeur Scama > Recharger</p>
            <h3 class="font-extrabold text-3xl flex items-center gap-4">
                <i class="fas fa-wallet"></i>
                <span>Recharger</span>
            </h3>
        </div>
        @if(Auth::user())
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm max-w-lg">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Recharger mon Compte</h3>
                    <p class="text-sm text-muted-foreground">
                        Ajoutez des fonds rapidement pour acheter nos produits. Sélectionnez le montant, choisissez votre
                        paiement, et votre solde sera prêt en un instant !
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <form action="{{ route('payment.create') }}" class="flex flex-col gap-6" method="POST">
                        @csrf

                        <div>
                            <label for="amount">Amount:</label>
                            <input type="text" id="amount" class="bg-background h-10 w-full rounded-md border border-input border-gray-800 focus:outline-none focus:border-none bg-background px-3 py-2 text-sm" name="amount" required />
                        </div>

                        <div>
                            <label for="currency">Currency:</label>
                            <select id="currency" name="currency" class="deposit-select" required>
                                <option value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="LTC">Litecoin (LTC)</option>
                            </select>
                        </div>

                        <button type="submit" class="bg-background hover:bg-background/90 text-white font-semibold rounded-md py-2 px-4 w-full">Generate Payment</button>
                    </form>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </section>
</main>
@endsection