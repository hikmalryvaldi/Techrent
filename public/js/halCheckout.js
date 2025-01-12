'use strict';

document.addEventListener('DOMContentLoaded', function () {
    const satuHari = document.getElementById('Satu');
    const duaHari = document.getElementById('Dua');
    const tigaHari = document.getElementById('Tiga');
    const hargaElement = document.querySelector('.harga');
    const hargaAsli = hargaElement.textContent;

    function updatePrice(multiplier) {
        hargaElement.textContent =
            'Rp' + (productPrice + multiplier).toLocaleString('id-ID');
    }

    satuHari.addEventListener('click', function () {
        hargaElement.textContent = hargaAsli;
    });

    duaHari.addEventListener('click', () => {
        updatePrice(50000);
    });

    tigaHari.addEventListener('click', () => {
        updatePrice(9990000);
    });
});

// Fix up down input number
function adjustQuantity(amount) {
    var input = document.getElementById('quantityInput');
    var currentValue = parseInt(input.value);
    if (!isNaN(currentValue)) {
        var newValue = currentValue + amount;
        if (newValue >= 0) {
            input.value = newValue;
        }
    }
}
