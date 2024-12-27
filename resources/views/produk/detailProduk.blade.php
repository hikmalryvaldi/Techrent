<x-header>Detail Produk</x-header>
<body class="bg-gray-100">
    {{-- Navbar --}}
    <x-navbar></x-navbar>

    {{-- Foto Produk --}}
    <div class="max-w-5xl mx-auto px-4 py-6">
      {{-- Navbar Detail Produk --}}
      <x-pnavDetailProduk></x-pnavDetailProduk>

      <!-- Product Section -->
      <div class="flex flex-col lg:flex-row gap-6">
          <!-- Product Image -->
          <div class="w-full lg:w-1/2">
            @foreach($product->images as $image)
              <img id="mainImage" src="{{ asset('img/canon5D/depan.png') }}" alt="Product" class="rounded-lg shadow-md w-full">
              <div class="flex mt-4 space-x-2">
                  <img onclick="updateMainImage('{{ asset('img/canon5D/depan.png') }}')" src="{{ asset('img/canon5D/depan.png') }}" alt="Thumbnail" class="w-16 h-16 rounded-lg shadow-md cursor-pointer">
                  <img onclick="updateMainImage('{{ asset('img/canon5D/atas.png') }}')" src="{{ asset('img/canon5D/atas.png') }}" alt="Thumbnail" class="w-16 h-16 rounded-lg shadow-md cursor-pointer">
                  <img onclick="updateMainImage('{{ asset('img/canon5D/belakang.png') }}')" src="{{ asset('img/canon5D/belakang.png') }}" alt="Thumbnail" class="w-16 h-16 rounded-lg shadow-md cursor-pointer">
                  <img onclick="updateMainImage('{{ asset('img/canon5D/samping.png') }}')" src="{{ asset('img/canon5D/samping.png') }}" alt="Thumbnail" class="w-16 h-16 rounded-lg shadow-md cursor-pointer">
              </div>
            @endforeach
          </div>

          <!-- Product Details -->
          <x-pDetailProComponen></x-pDetailProComponen>

          {{-- produk lainnya --}}
          <x-pProduk></x-pProduk>
      </div>
          

<x-footer></x-footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Function to update main image when thumbnail is clicked
        function updateMainImage(src) {
            document.getElementById('mainImage').src = src;
        }

        // Function to select a variant
        function selectVariant(variant) {
            document.querySelectorAll('.variant-button').forEach(button => {
                button.classList.remove('bg-gray-100', 'font-bold');
                button.classList.add('text-gray-700');
            });
            const selectedButton = document.getElementById(variant);
            selectedButton.classList.add('bg-gray-100', 'font-bold');
            selectedButton.classList.remove('text-gray-700');
        }

        // Function to adjust quantity
        function adjustQuantity(change) {
            const quantityInput = document.getElementById('quantityInput');
            let currentQuantity = parseInt(quantityInput.value);
            if (!isNaN(currentQuantity)) {
                currentQuantity += change;
                if (currentQuantity < 1) currentQuantity = 1;
                quantityInput.value = currentQuantity;
            }
        }

        // Dropdown functionality for shipping options
        const dropdownButton = document.getElementById('shippingDropdownButton');
        const dropdownMenu = document.getElementById('shippingDropdown');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        dropdownButton.addEventListener('mouseover', () => {
            dropdownMenu.classList.remove('hidden');
        });

        dropdownMenu.addEventListener('mouseleave', () => {
            dropdownMenu.classList.add('hidden');
        });
    </script>
    
</body>