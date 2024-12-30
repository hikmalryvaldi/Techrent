<x-headerNewsletter>Halaman Newsletter</x-headerNewsletter>
<body style="height: 100%; ">
<div>
    {{-- navbar dan sedbar --}}
    <x-sidebar></x-sidebar>


    <div class="p-4 my-16 sm:ml-64">
        <div class="p-8 bg-gray-100 rounded-lg shadow-lg max-w-3xl">
            <h2 class="text-black text-2xl font-bold">Halaman Newsletter Custom</h2>
    
            {{-- input --}}
            <form class="w-3xl mt-8" action="/send-custom-email" method="POST">
                @csrf
                {{-- input email --}}
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-lg font-medium text-gray-900 dark:text-black">Subjek</label>
                    <input type="email" id="email" class="bg-gray-50 border border-black text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Subjek" required />
                </div>
    
                {{-- input pesan --}}
                <div class="mb-4">
                    <label for="Pesan" class="block mb-2 text-lg font-medium text-gray-900 dark:text-black">Masukan Pesan</label>
                    <input id="Pesan" type="hidden" name="Pesan">
                    <trix-editor input="Pesan" class="trix-content h-8 mb-3 max-w-3xl border border-black rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"></trix-editor>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>
    </div>
    
    


{{-- js --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>