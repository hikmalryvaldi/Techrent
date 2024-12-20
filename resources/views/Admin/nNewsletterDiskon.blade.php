<x-header>Halaman Newsletter</x-header>
<body style="height: 100%; ">
<div>
    {{-- navbar dan sedbar --}}
    <x-sidebar></x-sidebar>


    <div class="p-4 my-16 sm:ml-64">
        <div class=" p-14 bg-gray-100 rounded-lg shadow-lg max-w-lg">
            <h2 class="text-black text-2xl font-bold">Halaman Newsletter Diskon</h2>

            {{-- input --}}
            <form class="max-w-sm mt-8" action="/send-custom-email" method="POST">
                @csrf
                {{-- input email --}}
                <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your email</label>
                <input type="email" id="email" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
                </div>
                {{-- kategoti --}}
                <div class="mb-5">
                <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Pilih Produk Promosi <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </button>
                    
                    <!-- Dropdown menu -->
                    <div id="dropdownBgHover" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="checkbox-item-4" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Produk 1</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input checked id="checkbox-item-5" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-item-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Produk 2</label>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
                
                <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-black">Remember me</label>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
            <x-speedDeal></x-speedDeal>
  
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

</body>