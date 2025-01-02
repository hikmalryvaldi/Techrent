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
                            <label for="search-input"
                                class="block mb-2 text-lg font-medium text-gray-900 dark:text-black">Pilih Salah Satu
                                Kategori Dari Produk:</label>
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
                        {{-- <input type="hidden" id="selected-product-id" name="message" value="TEST" />
                        <input type="hidden" id="selected-product-id" name="subject" value="TEST" /> --}}
                        <input type="hidden" id="selected-product-id" name="product_id" />
                        <input type="hidden" id="selected-product-productName" name="product_name">
                        <input type="hidden" id="selected-product-discount" name="discount_value">
                        <input type="hidden" id="selected-product-image" name="images">
                    </div>

                    <button type="submit"
                        class="text-white my-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
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
    const searchQuery = document.getElementById('search-input').value;

    if (searchQuery === '') {
        document.getElementById('dropdown').classList.add('hidden');
        return;
    }

    $.ajax({
        url: '/search',
        type: 'GET',
        data: { search: searchQuery },
        success: function (response) {
            console.log(response); // Memeriksa respons dari server
            const dropdown = $('#dropdown');
            dropdown.empty();

            if (response.length > 0) {
                response.forEach(function (product) {
                    let imagesHtml = '';
                    product.images.forEach(function (image) {
                        imagesHtml += `<img src="${image.image_url}" width="50" height="50" class="mr-2">`;
                    });
                    dropdown.append(`
                        <div class="px-4 py-2 cursor-pointer text-gray-700 hover:bg-gray-200 flex items-center" onclick='selectProduct(${product.id}, "${product.product_name.replace(/"/g, '&quot;')}", ${product.discount_value}, ${JSON.stringify(product.images).replace(/'/g, "&#39;")})'>
                            ${imagesHtml}
                            <span>${product.product_name} - Diskon: ${product.discount_value}%</span>
                        </div>
                    `);
                });
            } else {
                dropdown.append(`
                    <div class="px-4 py-2 text-gray-500">Tidak ada hasil</div>
                `);
            }

            dropdown.removeClass('hidden');
        },
        error: function (xhr, status, error) {
            console.error('Error fetching search results:', xhr.responseText);
        }
    });
}

function selectProduct(id, productName, discount, images) {
    try {
        console.log("selectProduct called with:", { id, productName, discount, images });

        // Isi input dengan nama produk
        document.getElementById('search-input').value = productName;

        // Simpan ID produk ke dalam hidden input
        document.getElementById('selected-product-id').value = id;
        document.getElementById('selected-product-productName').value = productName;
        document.getElementById('selected-product-discount').value = discount;
        document.getElementById('selected-product-image').value = JSON.stringify(images);

        // Sembunyikan dropdown
        document.getElementById('dropdown').classList.add('hidden');

    } catch (error) {
        console.error('Error in selectProduct function:', error);
    }
}

        </script>

</body>
