let registrar = document.getElementById('registrar');
let login = document.getElementById('login');
let body = document.getElementById('products');
let product = document.getElementById('product');
let remove = document.getElementsByTagName('.remove');

function desplegar(){
    login.style.display = 'block';
    registrar.style.display = 'none'; //Para que cuando se abra una ventana se cierre la otra
    product.style.display = 'none';
}

function desplegarRegistrar(){
    registrar.style.display = 'block';
    login.style.display = 'none';
    product.style.display = 'none';
}

function desplegarProduct(){
    product.style.display = 'block';
    registrar.style.display = 'none';
    login.style.display = 'none';
}

function volver(){
    login.style.display = 'none';
    registrar.style.display = 'none';
    product.style.display = 'none';
}



