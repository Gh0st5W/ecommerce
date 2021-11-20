/* Mostramos el contenido serún la seleccion de la categoria */
$(document).ready(function(){
    $('ul.tabs li a:first').addClass('active');
    $('.categorias article').hide();
    $('.categorias article:first').show();

    /* Cuando hacemos click en un tab del menu lateral */
    $('ul.tabs li a').click(function(){
        /* Eliminamos la clase activa */
        $('ul.tabs li a').removeClass('active');
        /* Activamos la clase donde hemos hecho click */
        $(this).addClass('active');
        /* Ocultamos las otras categorias */
        $('.categorias article').hide();
        
        /* Una vez activa, la mostramos */
        /* Llamamos al activetab */
        var activeTab = $(this).attr('href');
        /* Mostramos el activetab */
        $(activeTab).show();
        return false;
    })
});

/******************************************************************************/



/************ MEDIANTE ESTA PARTE DEL JS GESTIONAMOS EL CARRITO ***************/

/* Cookies */
document.addEventListener('DOMContentLoaded', () =>{
    const cookies = document.cookie.split(';');
    let cookie = null;
    /* Validamos si existe la cookie */
    cookies.forEach(Product =>{
        if(Product.indexOf('Products') > -1){
            /* Asignamos el elemento a la cokkie */
            cookie = Product;
        }
    });
    if(cookie != null){
        const count = cookie.split('=')[1];
        console.log(count);
        document.querySelector('.btn-carrito').innerHTML = `(${count}) Carrito`;
    }
})

/* Creamos evento para el boton carrito del menu */
const bCarrito = document.querySelector('.btn-carrito');
/* Que despliega el carrito, el cual tengo definido bajo la clase #carrito-container*/
const carritoContainer = document.querySelector('#carrito-container');

bCarrito.addEventListener('click', (e) =>{
    

    /* Hacemos referencia a la clase <div id="carrito-container"> y mediante un condional lo desplgamos o oculatmos */
    if(carritoContainer.style.display == ''){
        carritoContainer.style.display = 'block';

        actualizarCarritoUI();
    }else{
        carritoContainer.style.display = '';
    }
    
});


/* Actualización de carrito */
function actualizarCarritoUI(){
    /* Cargamos el json de la solicitud */
    fetch('http://localhost/website/api/carrito/api-carrito.php?action=mostrar')
    /* Devolvemos el json, ya he comprobado que funciona */
    .then(response =>{return response.json();})
    /* Mostramos la información del json recibido */
    .then(data =>{
        console.log(data);
        let tablaCont = document.querySelector('#tabla');
        let precioTotal = '';
        let html = ``;
        data.products.forEach(element => {   /* products */
            html += `
                <div class='fila'>
                    <div class='imagen'><img src='images/${element.image}' width='100' /></div>
                    <div class='info'>
                        <input type='hidden' value='${element.id}' />
                        <div class='nombre'>${element.description}</div>
                        <div>${element.cantidad} unidad/es ${element.price} €</div>
                        <div>Subtotal: ${element.subtotal} €</div>
                        <div class='botones'><button class='btn-remove'>Eliminar</button></div>
                    </div>
                </div>
            `;
        });

        
        precioTotal = `<p>Total: ${data.info.total} €</p>`;
        tablaCont.innerHTML = precioTotal + html;
        document.cookie = `items=${data.info.count}`;
        document.querySelector('.btn-carrito').innerHTML = `(${data.info.count}) Carrito`;

        document.querySelectorAll('.btn-remove').forEach(boton =>{
            boton.addEventListener('click', () => {
                const id = boton.parentElement.parentElement.children[0].value;
                removeProductFromCarrito(id);
            })
        });
    });
}

const botones = document.querySelectorAll('button');

botones.forEach(boton => {
    const id = boton.parentElement.parentElement.children[0].value;

    boton.addEventListener('click', e =>{
        addProductToCarrito(id);
    });
});



/* Añadimos productos al carrito */
const addProductToCarrito = id =>{
    /* Llamamos a la API Carrito y la acción ADD */
    fetch('http://localhost/website/api/carrito/api-carrito.php?action=add&id=' + id)
    .then(response =>{
        return response.text();
    })
    .then(data =>{
        actualizarCarritoUI();
    });
};

/* Eliminamos productos al carrito */
const removeProductFromCarrito = id =>{
    /* Llamamos a la API Carrito y la acción REMOVE */
    fetch('http://localhost/website/api/carrito/api-carrito.php?action=remove&id=' + id)
    .then(res =>{
        return res.json();
    })
    .then(data =>{
        console.log(data.statuscode);
        actualizarCarritoUI();
    });

};