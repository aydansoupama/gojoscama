<div x-data="{ open: false, code: '' }" x-cloak>
    <button @click="open = true" class="mt-2 underline text-primary hover:text-secondary">
        Générer mon code
    </button>

    <div x-show="open" @click.self="open = false"
        class="fixed inset-0 flex items-center justify-center z-50 bg-gray-500 bg-opacity-75">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm mx-auto">
            <div class="mb-4">
                <label for="code" class="block text-primary text-start">Code de connexion</label>
                <input type="text" id="code-input" name="code"
                    class="w-full text-gray-800 border border-gray-800 rounded-md py-2 px-3 outline-none focus:outline-none focus:border-primary"
                    disabled autocomplete="off" x-ref="codeInput" x-model="code" value="Votre code ici"
                    x-ref="codeInput" readonly>
            </div>
            <button type="button"
                class="bg-primary hover:bg-secondary text-white font-semibold rounded-md py-2 px-4 w-full"
                @click="generateAndCreateUser()">
                Générer
            </button>
        </div>
    </div>
</div>


<script>
    async function generateAndCreateUser() {
        const length = 16;
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        const array = new Uint8Array(length);
        window.crypto.getRandomValues(array);

        let randomString = '';
        for (let i = 0; i < length; i++) {
            randomString += characters[array[i] % charactersLength];
        }

        const codeInput = document.querySelector('[x-ref="codeInput"]');
        codeInput.value = randomString;

        try {
            const response = await fetch('/user/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Si vous utilisez Laravel avec CSRF protection
                },
                body: JSON.stringify({ code: randomString })
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Utilisateur créé avec succès:', result);
            } else {
                console.error('Erreur lors de la création de l\'utilisateur:', response.statusText);
            }
        } catch (error) {
            console.error('Erreur lors de la création de l\'utilisateur:', error);
        }
    }

</script>