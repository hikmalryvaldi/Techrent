<x-header>Halaman Newsletter</x-header>
<body style="height: 100%; ">
<div>
    {{-- navbar dan sedbar --}}
    <x-sidebar></x-sidebar>


    <div class="p-4 my-16 sm:ml-64">
        <div class=" p-14 bg-gray-100 rounded-lg shadow-lg max-w-lg">
            <h2 class="text-black text-2xl font-bold">Halaman Newsletter Custom</h2>

            {{-- input --}}
            <form class="max-w-sm mt-8" action="/send-custom-email" method="POST">
                @csrf
                {{-- input email --}}
                <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your email</label>
                <input type="email" id="email" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
                </div>
                    
                {{-- input pesan --}}
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Masukan Pesan</label>
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                            <div class="flex space-x-2">
                                <!-- Upload Image -->
                                <label for="upload-image" class="inline-flex items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                    </svg>
                                    <span class="sr-only">Upload image</span>
                                </label>
                                <input id="upload-image" type="file" accept="image/*" class="hidden" />
                
                                <!-- Set Location -->
                                <button type="button" class="inline-flex items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                        <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                                    </svg>
                                    <span class="sr-only">Set location</span>
                                </button>
                
                                <!-- Upload Another Photo -->
                                <label for="upload-photo" class="inline-flex items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6"/>
                                    </svg>
                                    <span class="sr-only">Upload photo</span>
                                </label>
                                <input id="upload-photo" type="file" accept="image/*" class="hidden" />
                            </div>
                        </div>
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