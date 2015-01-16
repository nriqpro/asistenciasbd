// <script type="text/javascript">
//$(document).ready(function () { 
function verifySalon(){
    var table = document.getElementById("horario");
    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'); 
            for (i = 0; i < rows.length; i++) {
            rows[i].onclick = function() {
//                    alert(this.cells[2].innerHTML);
                    if(this.cells[2].innerHTML > this.cells[3].innerHTML ){
                        alert("Hora de inicio no puede ser mayor que hora fin.");
                        this.cells[2].value = '';
                        this.cells[2].clear;
                        alert("safdgh");
                    }
//                        this.cells[3].value = '--:--:--';
                }
//            alert(i);
            }
}
function removeSalon(){
    var rows = document.getElementById('horario').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    alert(rows.length);  
    if(rows.length >= 2){
            for (i = 0; i < rows.length; i++) {
            rows[i].onclick = function() {
                if(rows.length >= 2){
//                     alert(this.rowIndex);
                     document.getElementById('horario').deleteRow(this.rowIndex);
                }
            }
        }
    }
    else{
        alert("No se puede eliminar unico elemento de la tabla.");    
    }
}
function addSalon(){
     var table = document.getElementById("horario");
     var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'); 
     var tsalones = document.getElementById("tsalones").value;
     var salones = document.getElementsByName("idsalon");

     for (i = 0; i < rows.length; i++) {
           var selectSalon = "";
           selectSalon="<select id='salonesOp' class='form-control' >";
           for(var j=0; j<tsalones; j++){
                 selectSalon+= "<option value='"+salones[j].value+"'>"+salones[j].value+"</option>";
            }  
           selectSalon += "</select>";
           rows[i].cells[0].innerHTML = selectSalon;

           var selectHTML = "";
            selectHTML="<select id='dias' class='form-control' >";
            for(var k=0; k<7; k++){
                switch(k){
                    case 0: selectHTML+= "<option value='Lunes'>Lunes</option>"; break;
                    case 1: selectHTML+= "<option value='Martes'>Martes</option>"; break;
                    case 2: selectHTML+= "<option value='Miercoles'>Miercoles</option>"; break;
                    case 3: selectHTML+= "<option value='Jueves'>Jueves</option>"; break;
                    case 4: selectHTML+= "<option value='Viernes'>Viernes</option>"; break;
                    case 5: selectHTML+= "<option value='Sabado'>Sabado</option>"; break;
                    case 6: selectHTML+= "<option value='Domingo'>Domingo</option>"; break;
                }
            }
            selectHTML += "</select>";
            rows[i].cells[1].innerHTML = selectHTML;

            var selectTimeIn = "";
            selectTimeIn = "<input type='time' id='hin' name='hin'></input>";

            rows[i].cells[2].innerHTML = selectTimeIn;

            var selectTimeF = "";
            selectTimeF = "<input type='time' id='hfin' name='hfin'></input>";

            rows[i].cells[3].innerHTML = selectTimeF;
//
//
//            rows[i].onclick = function() {
////                    alert(this.cells[2].innerHTML);
//                    if(this.cells[2].innerHTML > this.cells[3].innerHTML ){
//                        alert("Hora de inicio no puede ser mayor que hora fin.");
//                        this.cells[2].value = '';
//                        this.cells[2].clear;
//                        alert("safdgh");
//                    }
////                        this.cells[3].value = '--:--:--';
//                }
////            alert(i);
            }
//    
}
function loadData(){
    var ciprofe = document.getElementsByName("prof");
    var ci;
    for (var i=0, len=ciprofe.length; i<len; i++) {
            if ( ciprofe[i].checked ) { // radio checked?
                 ci = parseInt(ciprofe[i].value);
//                alert(ciprofe[i].value);
                break; // and break out of for loop
            }
        }
    var coda = document.getElementsByName("asig");
    var codasig;
    for (var i=0, len=coda.length; i<len; i++) {
            if ( coda[i].checked ) { // radio checked?
                 codasig = parseInt(coda[i].value);
//                alert(codasig);
                break; // and break out of for loop
            }
        }
    var codp = document.getElementsByName("peri");
    var codperi;
    for (var i=0, len=codp.length; i<len; i++) {
            if ( codp[i].checked ) { // radio checked?
                 codperi = codp[i].value;
//                alert(codp[i].value);
                break; // and break out of for loop
            }
        }
   
    var insertProfesor = document.getElementById("ci_profe");
    insertProfesor.value = ci;
//    alert("profesor"+insertProfesor.value);
    var insertPeriodo = document.getElementById("cod_peri");
    insertPeriodo.value = codperi;
//    alert("periodo"+insertPeriodo.value);
    var insertAsig = document.getElementById("cod_asig");
    insertAsig.value = codasig;
//    alert("asig"+insertAsig.value);
////    }
}
//         </script>
