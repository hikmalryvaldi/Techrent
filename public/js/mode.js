'use strict';

const body = document.querySelector('body');
// if (e.key === "Space") {
//     e.key.addEventListener('click', function  () {
//         body.style.backgroundColor = 'black'
//     })
// }
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        alert(`                Webiste TechRent
                Ketua : Hikmal
                Anggota : 
                Novan (FrontEnd)
                Racka (BackEnd)
                Rizky (BackEnd)
                Ahmad (FrontEnd)`);
    }
    body.style.backgroundColor = 'red';
});
