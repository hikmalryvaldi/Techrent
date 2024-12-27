'use strict';

const iconShow = document.querySelectorAll('.icon-show');
const iconHide = document.querySelectorAll('.icon-hide');
const inputPass = document.querySelectorAll('.input-pass');

for (let i = 0; i < iconShow.length; i++) {
    iconShow[i].addEventListener('click', function () {
        iconShow[i].classList.add('hidden');
        iconHide[i].classList.remove('hidden');
        inputPass[i].type = 'password';
    });
}

for (let i = 0; i < iconHide.length; i++) {
    iconHide[i].addEventListener('click', function () {
        iconHide[i].classList.add('hidden');
        iconShow[i].classList.remove('hidden');
        inputPass[i].type = 'text';
    });
}
