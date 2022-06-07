let inputPass = document.getElementById('modalPassword');
let inputConfirm = document.getElementById('modalConfirmarPassword');
let btnAlterar = document.getElementById('btnAlterar');
let alertaPass = document.getElementById('alertaPass');

inputPass.addEventListener('keyup', function () {
    if (inputPass.value !== inputConfirm.value){
        alertaPass.style.display = 'block';
        btnAlterar.setAttribute('disabled', '');
    } else {
        alertaPass.style.display = 'none';
        btnAlterar.removeAttribute('disabled');
    }
});

inputConfirm.addEventListener('keyup', function () {
    if (inputPass.value !== inputConfirm.value){
        alertaPass.style.display = 'block';
        btnAlterar.setAttribute('disabled', '');
    } else {
        alertaPass.style.display = 'none';
        btnAlterar.removeAttribute('disabled');
    }
});