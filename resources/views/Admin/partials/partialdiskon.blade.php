@foreach ($products as $index => $product)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
            <div class="flex items-center">
                <div class="mask mask-squircle h-12 w-12 bg-white">
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path1) }}" alt="Product Image"
                            alt="Avatar Tailwind CSS Component" />
                    @endforeach
                </div>
            </div>
        </td>
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $product->product_name }}
        </th>
        <td class="px-6 py-4">
            {{ $product->category->name }}
        </td>
        <td class="px-6 py-4">
            {{ $product->discount }}
        </td>
        <td class="px-6 py-4">
            {{ number_format($product->price) }}
        </td>
        <td class="px-6 py-4">
            {{ number_format($product->price - ($product->price * $product->discount) / 100) }}
        </td>
        <td class="px-6 py-4 hidden">
            {{ $product->created_at }}
        </td>
        <td class="px-6 py-4">
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
        </td>
    </tr>
@endforeach
