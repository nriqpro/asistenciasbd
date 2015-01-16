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
//    var salon = document.getElementsByName("sa");
//    var sa;
//    for (var i=0, len=salon.length; i<len; i++) {
//            if ( salon[i].checked ) { // radio checked?
//                 sa = salon[i].value;
////                alert(salon[i].value);
//                break; // and break out of for loop
//            }
//        }
    
     var table = document.getElementById("horario");
     var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'); 
     var tsalones = document.getElementById("tsalones").value;
     var salones = document.getElementsByName("idsalon");
     
     for (i = 0; i < rows.length; i++) {
           var selectSalon = "";
           selectSalon="<select id='salonesOp' class='form-control' >";
           for(var j=0; j<tsalones; j++){
                 selectSalon= "<option value='"+salones[j]+"'>"+salones[j]+"</option>"; break;
//                 
            }  
           selectSalon += "</select>";
           rows[i].cells[0].innerHTML = selectSalon;
           alert("asfdgh");
//           var selectHTML = "";
//            selectHTML="<select id='dias' class='form-control' >";
//            for(var i=0; i<7; i++){
//                switch(i){
//                    case 0: selectHTML+= "<option value='Lunes'>Lunes</option>"; break;
//                    case 1: selectHTML+= "<option value='Martes'>Martes</option>"; break;  
//                    case 2: selectHTML+= "<option value='Miercoles'>Miercoles</option>"; break;  
//                    case 3: selectHTML+= "<option value='Jueves'>Jueves</option>"; break;
//                    case 4: selectHTML+= "<option value='Viernes'>Viernes</option>"; break;
//                    case 5: selectHTML+= "<option value='Sabado'>Sabado</option>"; break;
//                    case 6: selectHTML+= "<option value='Domingo'>Domingo</option>"; break; 
//                }
//            }              
//            selectHTML += "</select>";
//            rows[i].cells[1].innerHTML = selectHTML;
//    
//            var hin = document.createElement("input");
//            hin.type = "time";
//            hin.id = "hin";
//            rows[i].cells[2].appendChild(hin);
//
//            var hfin = document.createElement("input");
//            hfin.type = "time";
//            hfin.id = "hfin";
//            rows[i].cells[3].appendChild(hfin);
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
    var ciest = document.getElementsByName("ci_est");
    var ci;
    for (var i=0, len=ciest.length; i<len; i++) {
            if ( ciest[i].checked ) { // radio checked?
                 ci = parseInt(ciest[i].value);
//                alert(ciprofe[i].value);
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

}
//         </script>