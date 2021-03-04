function validate_codigo_producto(codigo_producto) {
    if (codigo_producto.length > 0) {
        var regexp = /[a-zA-Z0-9]{9}/;
        return regexp.test(codigo_producto);
    }
    return false;
}

function validate_nombre(nombre) {
    if (nombre.length > 0) {
        var regexp = /[a-zA-Z0-9]/;
        return regexp.test(nombre);
    }
    return false;
}


function validate_precio(precio) {
    if (precio.length > 0) {
        var regexp = /([0-9]{1,4})+[€]/;
        return regexp.test(precio);
    }
    return false;
}

function validate_talla(talla) {
    if (talla.length > 0) {
        var regexp = /[a-zA-Z0-9]{1,2}/;
        return regexp.test(talla);
    }
    return false;
}

function validate_color(array) {
    var i;
    var ok=0;
     for(i=0; i<array.length;i++){
         if(array[i].checked){
             ok=1
         }
     }
   
    if(ok==1){
        return true;
    }
    if(ok==0){
        return true;
    }
} 

function validate_categoria(array) {
    var check=false;
    for ( var i = 0, l = array.length, o; i < l; i++ ){
        o = array[i];
        if ( o.selected ){
            check= true;
        }
    }
    return check;
}

function validate_sexo(array) {
    var i;
    var ok=0;
    for(i=0; i<array.length;i++){
        if(array[i].checked){
            ok=1
        }
    }
   
    if(ok==1){
        return true;
    }
    if(ok==0){
        return true;
    }
}

function validate_descripcion(descripcion) {
    if (descripcion.length > 0) {
        var regexp = /[a-zA-Z0-9]/;
        return regexp.test(descripcion);
    }
    return false;
}

function validate_create() {
    
    var check = true;

    var v_codigo_producto = document.getElementById('codigo_producto').value;
	var v_nombre = document.getElementById('nombre').value;
	var v_precio = document.getElementById('precio').value;
	var v_talla = document.getElementById('talla').value;
	var v_color = document.getElementById('color[]');
    var v_descripcion = document.getElementById('descripcion').value;
    var v_categoria = document.getElementById('categoria');
    var v_sexo = document.getElementById('sexo');

	var r_codigo_producto = validate_codigo_producto(v_codigo_producto);
	var r_nombre = validate_nombre(v_nombre);
	var r_precio = validate_precio(v_precio);
	var r_talla = validate_talla(v_talla);
	var r_color  = validate_color(v_color);
    var r_descripcion = validate_descripcion(v_descripcion);
    var r_categoria = validate_categoria(v_categoria);
    var r_sexo = validate_sexo(v_sexo);

	if (!r_codigo_producto) {
        document.getElementById('error_codigo_producto').innerHTML = "* El codigo_producto introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_codigo_producto').innerHTML = "";
    }

	if (!r_nombre) {
        document.getElementById('error_nombre').innerHTML = "* El nombre introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_nombre').innerHTML = "";
    }

	if (!r_precio) {
        document.getElementById('error_precio').innerHTML = "* El precio introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_precio').innerHTML = "";
    }

	if (!r_talla) {
        document.getElementById('error_talla').innerHTML = "* La talla introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_talla').innerHTML = "";
    }

    if (!r_color) {
        document.getElementById('error_color').innerHTML = "* El color introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_color').innerHTML = "";
    }

    if (!r_descripcion) {
        document.getElementById('error_descripcion').innerHTML = "* El descripcion introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_descripcion').innerHTML = "";
    }

    if (!r_categoria) {
        document.getElementById('error_categoria').innerHTML = "* La categoria introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_categoria').innerHTML = "";
    }

    if (!r_sexo) {
        document.getElementById('error_sexo').innerHTML = "* El sexo introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_sexo').innerHTML = "";
    }

   
    document.create.submit();
    document.create.action="index.php?page=controller_crud&op=create";
    
}

function validate_update() {
    
    var check = true;

	var v_nombre = document.getElementById('nombre').value;
	var v_precio = document.getElementById('precio').value;
	var v_talla = document.getElementById('talla').value;
	var v_color = document.getElementById('color[]');
    var v_descripcion = document.getElementById('descripcion').value;
    var v_categoria = document.getElementById('categoria');
    var v_sexo = document.getElementById('sexo');

    var r_nombre = validate_nombre(v_nombre);
	var r_precio = validate_precio(v_precio);
	var r_talla = validate_talla(v_talla);
	var r_color  = validate_color(v_color);
    var r_descripcion = validate_descripcion(v_descripcion);
    var r_categoria = validate_categoria(v_categoria);
    var r_sexo = validate_sexo(v_sexo);

	if (!r_nombre) {
        document.getElementById('error_nombre').innerHTML = "* El nombre introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_nombre').innerHTML = "";
    }

	if (!r_precio) {
        document.getElementById('error_precio').innerHTML = "* El precio introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_precio').innerHTML = "";
    }

	if (!r_talla) {
        document.getElementById('error_talla').innerHTML = "* La talla introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_talla').innerHTML = "";
    }

    if (!r_color) {
        document.getElementById('error_color').innerHTML = "* El color introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_color').innerHTML = "";
    }

    if (!r_descripcion) {
        document.getElementById('error_descripcion').innerHTML = "* El descripcion introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_descripcion').innerHTML = "";
    }

    if (!r_categoria) {
        document.getElementById('error_categoria').innerHTML = "* La categoria introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_categoria').innerHTML = "";
    }

    if (!r_sexo) {
        document.getElementById('error_sexo').innerHTML = "* El sexo introducido no es valido";
        check=false;
        return check;
    }else{
        document.getElementById('error_sexo').innerHTML = "";
    }

    document.update.submit();
    document.update.action="index.php?page=controller_crud&op=update";
    
}