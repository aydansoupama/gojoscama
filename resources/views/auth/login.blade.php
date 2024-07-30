@extends('layouts.app')

@section('content')
<main class="bg-white font-satoshi flex justify-center items-center h-screen text-black">
    <section class="w-2/3 h-screen hidden lg:block">
        <img src="/images/auth.png" alt="Auth Image" class="object-cover w-full h-full">
    </section>

    <section class="flex flex-col gap-12 justify-center items-center w-full lg:w-1/3">
        <div class="flex flex-col justify-center items-center gap-4 ">
            <h3 class="font-bold text-3xl">👋 Ravi de te revoir parmi nous!</h3>
            <p>Bienvenue sur Flambeur Scama!</p>
        </div>

        <div class="flex flex-col gap-8">
            <div class="flex flex-col gap-4">
                <div class="auth-page-container flex rounded-custom border border-primary">
                    <button class="auth-button active">Connexion</button>
                    <button class="auth-button">Inscription</button>
                </div>
                <form action="{{route("auth.login")}}" method="POST" class="max-w-md flex flex-col gap-4">
                    @csrf
                    <div class="mb-4 flex flex-col gap-1">
                        <label for="code" class="block text-gray-600">Code de connexion</label>
                        <input type="text" id="code" name="code"
                            class="w-full border border-gray-800 rounded-md py-2 px-3 outline-none focus:outline-none focus:border-primary"
                            autocomplete="off">
                    </div>

                    <button type="submit"
                        class="bg-primary hover:bg-secondary text-white font-semibold rounded-md py-2 px-4 w-full">Je me
                        connecte</button>
                </form>
            </div>
            <div class="text-blue-500 text-center">
                <x-getCode />
            </div>
        </div>
    </section>
</main>
@endsection