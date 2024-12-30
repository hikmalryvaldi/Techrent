<x-header>Halaman Newsletter</x-header>
<body style="height: 100%; ">
<div>
    {{-- navbar dan sedbar --}}
    <x-sidebar></x-sidebar>


    <div class="p-4 my-16 sm:ml-64">
        <div class="p-14 bg-gray-100 rounded-lg shadow-lg max-w-2xl">
            <h2 class="text-black text-2xl font-bold">Halaman Newsletter Diskon</h2>
    
            {{-- input --}}
            <form class="w-full mt-8" action="/send-custom-email" method="POST">
                @csrf
                {{-- kategori --}}
                <div class="mb-5">
                    <div class="relative">
                        <label for="search-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-black">Pilih Salah Satu Kategori Dari Produk:</label>
                        <input type="text" id="search-input" placeholder="Search Produk"
                            class="bg-gray-50 border border-black text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            autocomplete="off" onkeyup="liveSearch()" />
    
                        <!-- Dropdown hasil pencarian -->
                        <div id="dropdown"
                            class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg shadow-md hidden">
                            <!-- Hasil pencarian akan dimasukkan di sini secara dinamis -->
                        </div>
                    </div>
    
                    <!-- Hidden input untuk menyimpan ID produk yang dipilih -->
                    <input type="hidden" id="selected-product-id" name="product_id" />
                </div>
    
                <button type="submit" class="text-white my-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
            </form>

        </div>
    </div>
    


{{-- js --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script>
    // Select the necessary elements
    const uploadImageInput = document.getElementById('upload-image');
    const uploadPhotoInput = document.getElementById('upload-photo');
    const commentTextarea = document.getElementById('comment');

    // Function to insert an image preview into the textarea
    function insertImageIntoTextarea(file) {
        const fileURL = URL.createObjectURL(file);

        // Create an image element
        const imgElement = document.createElement('img');
        imgElement.src = fileURL;
        imgElement.alt = file.name;
        imgElement.style.maxWidth = '100px';
        imgElement.style.margin = '5px';
        imgElement.style.borderRadius = '5px';

        // Create a wrapper div to hold the image
        const wrapperDiv = document.createElement('div');
        wrapperDiv.style.display = 'inline-block';
        wrapperDiv.appendChild(imgElement);

        // Insert the image into the textarea
        const cursorPos = commentTextarea.selectionStart;
        const textBefore = commentTextarea.value.substring(0, cursorPos);
        const textAfter = commentTextarea.value.substring(cursorPos);

        // Append image as Markdown syntax (or display it using innerHTML in a different implementation)
        commentTextarea.value = `${textBefore}\n[Image: ${file.name}](${fileURL})\n${textAfter}`;
        commentTextarea.focus();
    }

    // Event listener for "Upload Image"
    uploadImageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            insertImageIntoTextarea(file);
        }
    });

    // Event listener for "Upload Another Photo"
    uploadPhotoInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            insertImageIntoTextarea(file);
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function liveSearch() {
                var searchQuery = document.getElementById('search-input').value;

                // Sembunyikan dropdown jika input kosong
                if (searchQuery === '') {
                    document.getElementById('dropdown').classList.add('hidden');
                    return;
                }

                // AJAX request untuk pencarian
                $.ajax({
                    url: '/search', // Route untuk pencarian
                    type: 'GET',
                    data: {
                        search: searchQuery
                    }, // Kirim parameter pencarian
                    success: function(response) {
                        var dropdown = $('#dropdown');
                        dropdown.empty(); // Kosongkan dropdown sebelum mengisi

                        if (response.length > 0) {
                            response.forEach(function(product) {
                                dropdown.append(`
                            <div class="px-4 py-2 cursor-pointer text-gray-700 hover:bg-gray-200"
                                onclick="selectProduct(${product.id}, '${product.product_name}')">
                                ${product.product_name}
                            </div>
                        `);
                            });
                        } else {
                            dropdown.append(`
                        <div class="px-4 py-2 text-gray-500">No results found</div>
                    `);
                        }

                        dropdown.removeClass('hidden'); // Tampilkan dropdown
                    }
                });
            }

            // Fungsi untuk menangani klik produk
            function selectProduct(id, productName) {
                // Isi input dengan nama produk
                document.getElementById('search-input').value = productName;

                // Simpan ID produk ke dalam hidden input
                document.getElementById('selected-product-id').value = id;

                // Sembunyikan dropdown
                document.getElementById('dropdown').classList.add('hidden');

                // (Opsional) Log ID produk yang dipilih untuk debugging
                console.log('Produk terpilih: ', id, productName);
            }
        </script>

</body>