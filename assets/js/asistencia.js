
function load(){ 
//       alert("hola");
        var cantidad = document.getElementsByName("ci_est[]");
        var cont = 0;
      for(var i=0; i<cantidad.length; i++){
        if(cantidad[i].checked){
            cont++;
        }
      }
    document.getElementById("contador").value = cont;
//     alert(cont);
}

//            window.onload = contador;
