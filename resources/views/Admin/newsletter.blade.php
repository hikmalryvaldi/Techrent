<x-header>Halaman Newsletter</x-header>
<body style="height: 100%; ">
<div>
    {{-- navbar dan sedbar --}}
    <x-sidebar></x-sidebar>

    {{--  --}}
    <div class="p-4 my-16 sm:ml-64">
        <h1 class="text-black text-2xl font-bold">Halaman Newsletter</h1>
        {{-- input --}}
        <form action="/send-custom-email" method="POST">
            @csrf
            <div>
                <label for="subject">Subject:</label>
                <input name="subject" id="subject" required></input>
            </div>
            <div>
                <label for="message">Pesan Email:</label>
                <input name="message" id="message" required></input>
            </div>
            <button type="submit" class="bg-gray-900">Kirim Email</button>
        </form>
        <x-speedDeal></x-speedDeal>

    </div>

{{-- js --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>