function loadData(){
    var asig = document.getElementsByName("asig");
    var asign = document.getElementsByName("asign[]");
    var form = document.getElementById("form");
    var total = document.getElementById("tasig");
    var i=0;
    var cont=0;
    for (i=0; i<asig.length; i++) {

            if ( asig[i].checked ) { // radio checked?
                alert(asig[i].value);
                var elem = document.createElement('input');
                elem.type="hidden";
                elem.value=asig[i].value;
                elem.id = cont;
                elem.name=cont;
                form.appendChild(elem);
                cont++;
            }
        }
//    alert("asd");
    total.value = cont;
//    alert(total.value);
}
