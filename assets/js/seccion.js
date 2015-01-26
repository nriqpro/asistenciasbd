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
     var checkS = document.getElementsByName("sa");
     var salon = document.getElementById("cod_salonv");
     var dia = document.getElementById("diav");
     var hi = document.getElementById("hora_iniv");
     for (i = 0; i < rows.length; i++) {
         if(checkS[i].checked){
          salon.value =  rows[i].cells[0].innerHTML;
          dia.value =   rows[i].cells[1].innerHTML;
          hi.value =  rows[i].cells[2].innerHTML;
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

             var horas_inicio =    ["07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00"];
            var horas_fin = ["08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00",
                               "16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00"];

            var selectTimeIn = "";
            selectTimeIn = "<select id='hin' class='form-control'>";
            for(var a=0; a<horas_inicio.length; a++){
                 selectTimeIn+= "<option value='"+horas_inicio[a]+"'>"+horas_inicio[a]+"</option>";
            }
             selectTimeIn+="</select>";
            rows[i].cells[2].innerHTML = selectTimeIn;


            var selectTimeF = "";
            selectTimeF = "<select id='hfin' class='form-control'>";
             for(var b=0; b<horas_fin.length; b++){
                 selectTimeF+= "<option value='"+horas_fin[b]+"'>"+horas_fin[b]+"</option>";
            }
            selectTimeF+="</select>";
            rows[i].cells[3].innerHTML = selectTimeF;


            }
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
    document.getElementById("cod_salon").value = document.getElementById("salonesOp").value;
    document.getElementById("hora_ini").value = document.getElementById("hin").value;
    document.getElementById("hora_fin").value = document.getElementById("hfin").value;
    document.getElementById("dia").value = document.getElementById("dias").value;

//    alert(document.getElementById("cod_salonv").value);
////    }
}
//         </script>
