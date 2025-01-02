<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo Kamera Diskon - Jangan Lewatkan!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        /* Newsletter container */
        .newsletter-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Gambar promo */
        .gambar {
            width: 600px;
            height: 300px;
            object-fit: cover;
            margin: auto;
        }

        /* Konten teks */
        .content {
            padding: 30px;
        }

        h1 {
            font-size: 2rem;
            color: #2b6cb0;
            font-weight: bold;
        }

        p {
            font-size: 1rem;
            color: black;
            margin-top: 16px;
        }

        strong {
            color: #2b6cb0;
        }

        .ajak {
            font-size: 1.2rem;
            color: #2b6cb0;
            font-weight: bold;
            margin-top: 16px;
        }

        /* Tombol ajak */
        .ajak-button {
            display: inline-block;
            background-color: #3182ce;
            color: white;
            padding: 12px 24px;
            border-radius: 9999px;
            text-decoration: none;
            margin-top: 20px;
            max-width: 250px;
            text-align: center;
            width: auto;
        }

        .ajak-button:hover {
            background-color: #2b6cb0;
        }

        /* Footer */
        .footer {
            background-color: #2d3748;
            text-align: center;
            padding: 20px;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- Newsletter Container -->
    <div class="newsletter-container">

        <!-- Gambar Promo -->
        <div class="gambar">
            @if ($images)
                <div class="gambar">
                    @foreach ($images as $image)
                        <img src="{{ $image['image_url'] }}"  class="promo-image">
                    @endforeach
                </div>
                @endif
                {{-- <img src="https://cdn.shopify.com/s/files/1/1260/1319/files/NewCanon_grande.png?v=1472116183"
                alt="Kamera Diskon" class="promo-image"> --}}
        </div>

        <!-- Konten Teks -->
        <div class="content">
            @if($product_name)
            <h1>Promo {{ $product_name }} Hingga {{ $discount_value }}%!</h1> <p> Jangan lewatkan kesempatan langka ini! Dapatkan diskon hingga <strong>{{ $discount_value }}%</strong> untuk produk ini. Kami menawarkan produk berkualitas dengan harga yang sangat terjangkau. </p> 
            @else 
            <h1>{{ $subject }}</h1> 
            <p> {{$message}}</p>
            @endif

            <p>
                Promo ini hanya berlaku untuk waktu terbatas. Segera pilih product favorit Anda dan nikmati product berkualitas tinggi dengan harga spesial!
            </p>

            <p class="ajak">
                Segera pesan dan dapatkan product impian Anda dengan harga diskon sebelum promo berakhir!
            </p>
            <div class="container-button"
                style="display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            text-decoration: none;">
                <a href="#" class="ajak-button" style="text-decoration: none">
                    Lihat Diskon
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="color: white">Copyright © 2024 Techrent</p>
        </div>
    </div>

</body>

</html>
