@extends('layouts.app')

@section('content')
<main class="font-satoshi min-h-screen flex gap-[60px]">
    @include("components.Sidebar")
    <section class="col-span-9 py-[105px] flex flex-col gap-6">
        <div class="header-container flex flex-col gap-4">
            <p class="text-sm font-extralight">Flambeur Scama > Recharger</p>
            <h3 class="font-extrabold text-3xl flex items-center gap-4">
                <i class="fas fa-wallet"></i>
                <span>Détails</span>
            </h3>
        </div>

        <div class="rounded-lg border bg-card text-card-foreground shadow-sm max-w-lg">
            <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="text-2xl font-semibold leading-none tracking-tight">Détails du Paiement</h3>
                <p class="text-sm text-muted-foreground">
                    Veuillez envoyer le montant exact à l'adresse ci-dessus en utilisant un portefeuille compatible avec
                    {{ $paymentDetails['pay_currency']}}. Une fois le paiement effectué, il peut falloir un certain
                    temps pour que la transaction soit confirmée et que
                    votre commande soit traitée.
                </p>
            </div>
            <div class="p-6 pt-0">
                <p><strong>ID de la commande:</strong> {{ $paymentDetails['order_id'] }}</p>
                <p><strong>Montant à payer:</strong> {{ $paymentDetails['price_amount'] }}
                    {{ $paymentDetails['price_currency'] }}
                </p>
                <p><strong>Devise de paiement:</strong> <span
                        class="uppercase">{{ $paymentDetails['pay_currency'] }}</span></p>
                <p><strong>Montant à envoyer:</strong> {{ $paymentDetails['pay_amount'] }}
                    <span class="uppercase">{{ $paymentDetails['pay_currency'] }}</span>
                </p>
                <p><strong>Adresse de paiement:</strong> {{ $paymentDetails['pay_address'] }}</p>

                @if (session('status_message'))
                    <div class="alert alert-{{ session('status_type') }}">
                        {{ session('status_message') }}
                    </div>
                @endif

                <form action="{{ route('payment.check_status', ['paymentId' => $paymentDetails['payment_id']]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-background hover:bg-background/90 text-white font-semibold rounded-md py-2 px-4 w-full mt-6">Vérifier le Statut de la Commande</button>
                </form>
            </div>
        </div>

    </section>
    </body>

    </html>