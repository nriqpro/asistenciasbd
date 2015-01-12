// <script type="text/javascript">
//$(document).ready(function () { 

var flag
function verifySalon(){
    var rows = document.getElementById('horario').getElementsByTagName('tbody')[0].getElementsByTagName('tr'); 
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

    var salon = document.getElementsByName("sa");
    var sa;
    for (var i=0, len=salon.length; i<len; i++) {
            if ( salon[i].checked ) { // radio checked?
                 sa = salon[i].value;
//                alert(salon[i].value);
                break; // and break out of for loop
            }
        }
    
    
    var table = document.getElementById("horario");

    // Create an empty <tr> element and add it to the 1st position of the table:
    var row = table.insertRow(1);

    // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    // Add some text to the new cells:
    cell1.innerHTML = sa+"";
    
    var selectHTML = "";
    selectHTML="<select id='dias' class='form-control' >";
    for(var i=0; i<7; i++){
        switch(i){
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
    cell2.innerHTML = selectHTML;
    
    var hin = document.createElement("input");
    hin.type = "time";
    hin.id = "hin";
    cell3.appendChild(hin);
    
    var hfin = document.createElement("input");
    hfin.type = "time";
    hfin.id = "hfin";
    cell4.appendChild(hfin);
    
    cell5.innerHTML = "<span class='glyphicon glyphicon-ok-sign' aria-hidden='false' onclick='verifySalon()'</span>"+
    "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='false' onclick='removeSalon()'></span>";
    
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