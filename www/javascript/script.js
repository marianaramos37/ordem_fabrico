'use strict'


function encodeForAjax(data){
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k)+'='+encodeURIComponent(data[k])
  }).join('&')
}

  $('[data-toggle="tooltip"]').tooltip()

$('#closemodal').click(function() {
  $('#exampleModal').modal('hide');
});
$('#closemodal2').click(function() {
  $('#exampleModal').modal('hide');
});

var d;

$('#submitcost').click( function(){

    let customin = document.querySelector("input[name=customin]").value
    let temposetup = document.querySelector("input[name=temposetup]").value;
    let trabalhadores = document.querySelector("input[name=trabalhadores]").value;
    let name = document.querySelector("input[name=name]").value
    let timedays = document.querySelector("input[name=time_days]").value;
    let timehours = document.querySelector("input[name=time_hours]").value;
    let timeminutes = document.querySelector("input[name=time_minutes]").value;
    let timeseconds = document.querySelector("input[name=time_seconds]").value;
    let nsetups = document.querySelector("input[name=nsetups]").value
    let quantidade = document.querySelector("input[name=quantidade]").value
    let datainit = document.querySelector("input[name=data]").value
    let horainit = document.querySelector("input[name=hora]").value
 
    let finalname = document.getElementById("finalname");                 
    let finalcost = document.getElementById("finalcost");    
    let finaltime = document.getElementById("finaltime");  
    let finalinidate = document.getElementById("finalinidate"); 
    let finaldate = document.getElementById("finaldate");    
    let finaldocumento = document.getElementById("finaldocumento");                 
    let finalcliente = document.getElementById("finalcliente");        
    let finalamostra = document.getElementById("finalamostra");    
    let finalsetups = document.getElementById("finalsetups");             
    let finalpeças = document.getElementById("finalpeças");    

    if(name=="" || (timedays==0 && timehours==0 && timeminutes==0 && timeseconds==0) || datainit==""){
      document.getElementById("message").innerHTML=`<div style="position:absolute !important; width:98%  !important;" class=" alert alert-dismissible alert-danger m-3">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Hmmm...</strong> o formulário não está completamente preenchido.
    </div>`
      window.scrollTo(0, 0);
    }
    else{
      $("#exampleModal").modal("toggle");
   

    var secondstotal = timedays*24*60*60 + timehours*60*60 + timeminutes*60 + timeseconds*1;

    let c=  customin * (secondstotal/60) * quantidade + customin * (temposetup/60) * nsetups;

    
    secondstotal=(secondstotal * quantidade) / trabalhadores;
    let secondstotalinit=secondstotal;
    d = new Date(datainit.substr(0, 4),parseInt(datainit.substr(5,2))-1,datainit.substr(8), horainit.substr(0, horainit.indexOf(':')),horainit.substr(horainit.indexOf(':')+1));
   
    console.log("timedays: " +timedays);
    console.log("timehours: " +timehours);
    console.log("timeminutes: " +timeminutes);
    console.log("timeseconds: " +timeseconds);

    console.log("secondstotal: " + secondstotal);
    console.log("date: " + d);

    //Horario;
    
    let weekday=d.getDay();
    console.log("weekday: " + weekday);

    if(weekday==6 || weekday==0){ 
      weekday=1;
    }
    let h_inicio_slot1 = document.querySelector(`input[name=${CSS.escape("a" + weekday)}]`).value;
    let h_fim_slot1 = document.querySelector(`input[name=${CSS.escape("b" + weekday)}]`).value;
    let h_inicio_slot2 = document.querySelector(`input[name=${CSS.escape("c" + weekday)}]`).value;
    let h_fim_slot2 = document.querySelector(`input[name=${CSS.escape("d" + weekday)}]`).value;
    let h_inicio_slot3 = document.querySelector(`input[name=${CSS.escape("e" + weekday)}]`).value;
    let h_fim_slot3 = document.querySelector(`input[name=${CSS.escape("f" + weekday)}]`).value;
    let h_inicio_slot4 = document.querySelector(`input[name=${CSS.escape("g" + weekday)}]`).value;
    let h_fim_slot4 = document.querySelector(`input[name=${CSS.escape("h" + weekday)}]`).value;

    let dateinislot1= new Date(d.getFullYear(), d.getMonth(), d.getDate()+1,h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')),h_inicio_slot1.substr(h_inicio_slot1.indexOf(':')+1));
    let dateinislot2= new Date(d.getFullYear(), d.getMonth(), d.getDate(),h_inicio_slot2.substr(0, h_inicio_slot2.indexOf(':')),h_inicio_slot2.substr(h_inicio_slot2.indexOf(':')+1));
    let dateinislot3= new Date(d.getFullYear(), d.getMonth(), d.getDate(),h_inicio_slot3.substr(0, h_inicio_slot3.indexOf(':')),h_inicio_slot3.substr(h_inicio_slot3.indexOf(':')+1));
    let dateinislot4= new Date(d.getFullYear(), d.getMonth(), d.getDate(),h_inicio_slot4.substr(0, h_inicio_slot4.indexOf(':')),h_inicio_slot4.substr(h_inicio_slot4.indexOf(':')+1));
    let datefimslot1= new Date(d.getFullYear(), d.getMonth(), d.getDate()+1,h_fim_slot1.substr(0, h_fim_slot1.indexOf(':')),h_fim_slot1.substr(h_fim_slot1.indexOf(':')+1));
    let datefimslot2= new Date(d.getFullYear(), d.getMonth(), d.getDate(),h_fim_slot2.substr(0, h_fim_slot2.indexOf(':')),h_fim_slot2.substr(h_fim_slot2.indexOf(':')+1));
    let datefimslot3= new Date(d.getFullYear(), d.getMonth(), d.getDate(),h_fim_slot3.substr(0, h_fim_slot3.indexOf(':')),h_fim_slot3.substr(h_fim_slot3.indexOf(':')+1));
    let datefimslot4= new Date(d.getFullYear(), d.getMonth(), d.getDate(),h_fim_slot4.substr(0, h_fim_slot4.indexOf(':')),h_fim_slot4.substr(h_fim_slot4.indexOf(':')+1));
   
    let temposlot1=Math.abs(datefimslot1-dateinislot1)/1000 //segundos
    let temposlot2=Math.abs(datefimslot2-dateinislot2)/1000 //segundos
    let temposlot3=Math.abs(datefimslot3-dateinislot3)/1000 //segundos
    let temposlot4=Math.abs(datefimslot4-dateinislot4)/1000 //segundos

    //Calcular hora final:

    let slot=0;
    let t=0;
    if( (d.getHours()==h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')) && d.getMinutes()>=parseInt(h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')+1)))  || (d.getHours()>h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')) && d.getHours()<h_fim_slot1.substr(0, h_fim_slot1.indexOf(':'))) || (d.getHours()==h_fim_slot1.substr(0, h_fim_slot1.indexOf(':')) && d.getMinutes()<=parseInt(h_fim_slot1.substr(0, h_fim_slot1.indexOf(':')+1))) ){
      slot=1;
      t=Math.abs(datefimslot1-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    } 
    else if( (d.getHours()==h_inicio_slot2.substr(0, h_inicio_slot2.indexOf(':')) && d.getMinutes()>=parseInt(h_inicio_slot2.substr(0, h_inicio_slot2.indexOf(':')+1)))  || (d.getHours()>h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')) && d.getHours()<h_fim_slot2.substr(0, h_fim_slot2.indexOf(':'))) || (d.getHours()==h_fim_slot2.substr(0, h_fim_slot2.indexOf(':')) && d.getMinutes()<=parseInt(h_fim_slot2.substr(0, h_fim_slot2.indexOf(':')+1))) ){ 
      slot=2;
      t=Math.abs(datefimslot2-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    }
    else if( (d.getHours()==h_inicio_slot3.substr(0, h_inicio_slot3.indexOf(':')) && d.getMinutes()>=parseInt(h_inicio_slot3.substr(0, h_inicio_slot3.indexOf(':')+1)))  || (d.getHours()>h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')) && d.getHours()<h_fim_slot3.substr(0, h_fim_slot3.indexOf(':'))) || (d.getHours()==h_fim_slot3.substr(0, h_fim_slot3.indexOf(':')) && d.getMinutes()<=parseInt(h_fim_slot3.substr(0, h_fim_slot3.indexOf(':')+1))) ){ 
      slot=3;
      t=Math.abs(datefimslot3-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    }
    else if( (d.getHours()==h_inicio_slot4.substr(0, h_inicio_slot4.indexOf(':')) && d.getMinutes()>=parseInt(h_inicio_slot4.substr(0, h_inicio_slot4.indexOf(':')+1)))  || (d.getHours()>h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')) && d.getHours()<h_fim_slot4.substr(0, h_fim_slot4.indexOf(':'))) || (d.getHours()==h_fim_slot4.substr(0, h_fim_slot4.indexOf(':')) && d.getMinutes()<=parseInt(h_fim_slot4.substr(0, h_fim_slot4.indexOf(':')+1))) ){ 
      slot=4;
      t=Math.abs(datefimslot4-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    }
    else{
      console.log("Hora de inicio não é válida")
    }

    console.log("secondstotal: " + secondstotal);
    console.log("slot inicial: " +slot)

    let  slotfinal=0;
    while(secondstotal>0){
      console.log("d atual: Dia " +d.getDate()+" Hora "+d.getHours()+":"+d.getMinutes() + " Slot: " + slot);
      slot=slot+1;
      if(slot==1){
        d=new Date(d.getFullYear(),d.getMonth(),d.getDate(),h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')),h_inicio_slot1.substr(h_inicio_slot1.indexOf(':')+1))
        d.setDate(d.getDate() + 1);
        console.log("Aqui:" +d.getDate());
        if(secondstotal-temposlot1<0){
          slotfinal=1;
          break;
        }
        else{
          secondstotal-=temposlot1;
          d=addHours(d,2);
          d=addMinutes(d,10);
        }
      }
      else if(slot==2){
        d=new Date(d.getFullYear(),d.getMonth(),d.getDate(),h_inicio_slot2.substr(0, h_inicio_slot2.indexOf(':')),h_inicio_slot2.substr(h_inicio_slot2.indexOf(':')+1))
        if(secondstotal-temposlot2<0){
          slotfinal=2;
          break;
        }
        else{
          secondstotal-=temposlot2;
          d=addHours(d,2);
          d=addMinutes(d,20);
        }
      }
      else if(slot==3){
        d=new Date(d.getFullYear(),d.getMonth(),d.getDate(),h_inicio_slot2.substr(0, h_inicio_slot3.indexOf(':')),h_inicio_slot3.substr(h_inicio_slot3.indexOf(':')+1))
        if(secondstotal-temposlot3<0){
          slotfinal=3;
          break;
        }
        else{
          secondstotal-=temposlot3;
          d=addHours(d,2);
          d=addMinutes(d,30);
        }
      }
      else if(slot==4){
        d=new Date(d.getFullYear(),d.getMonth(),d.getDate(),h_inicio_slot4.substr(0, h_inicio_slot4.indexOf(':')),h_inicio_slot4.substr(h_inicio_slot4.indexOf(':')+1))
        if(secondstotal-temposlot4<0){
          slotfinal=4;
          break;
        }
        else{
          secondstotal-=temposlot4;
          d=addMinutes(d,50);
        }
        slot=0;
      }
      
      else break;
      
    }

    d=addMinutes(d,secondstotal/60);

    finalname.innerHTML = name
    finalcost.innerHTML =`<p>${c} € </p>`
    
    
    var hours = Math.floor(secondstotalinit / 60 / 60);
    var minutes = Math.floor(secondstotalinit / 60) - (hours * 60);
    var seconds = secondstotalinit % 60;
    
    finaltime.innerHTML =`<p>${hours} horas, ${minutes} minutos, ${seconds} segundo </p>`
    finaldate.innerHTML =`<p>${d.getFullYear()}-${d.getMonth()+1}-${d.getDate()} ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}</p>`
    document.getElementById("finaldatehidden").value = document.getElementById("finaldate").innerHTML;
 
    finalinidate.innerHTML =`<p>Dia ${datainit} às ${horainit} h</p>`
    finaldocumento.innerHTML =`<col>${ document.querySelector("input[name=documento]").value} </col>`
    finalcliente.innerHTML =`<col>${ document.querySelector("input[name=cliente]").value} </col>`
    finalamostra.innerHTML =`<p>${ document.querySelector("input[name=time_days]").value } dias, ${ document.querySelector("input[name=time_hours]").value } horas, ${ document.querySelector("input[name=time_minutes]").value } minutos, ${ document.querySelector("input[name=time_seconds]").value } segundos</p>`
    finalsetups.innerHTML =`<p>${ document.querySelector("input[name=nsetups]").value} </p>`
    finalpeças.innerHTML =`<p>${ document.querySelector("input[name=quantidade]").value } </p>`
  }
  }
);





function addMinutes(date, minutes) {
  return new Date(date.getTime() + minutes*60*1000);
}

function addHours(date, hours) {
  return new Date(date.getTime() + hours*60*60*1000);
}

function addDays(date, days) {
  return new Date(date.getTime() + days);
}



const quantmin = document.getElementById('quantmin');
const custo1peça = document.getElementById('custo1peça');



function showQuantMin(e) {
  let temposetup = document.querySelector("input[name=temposetup]").value;
  let timedays = document.querySelector("input[name=time_days]").value;
  let timehours = document.querySelector("input[name=time_hours]").value;
  let timeminutes = document.querySelector("input[name=time_minutes]").value;
  let timeseconds = document.querySelector("input[name=time_seconds]").value;
  let nsetups = document.querySelector("input[name=nsetups]").value
  let secondstotal = timedays*24*60*60 + timehours*60*60 + timeminutes*60 + timeseconds*1;
  let quant_min=(9*temposetup*nsetups)/secondstotal;
  quantmin.textContent = Math.ceil(quant_min) + " peças";
}



function showCusto1peça(e) {
  let temposetup = document.querySelector("input[name=temposetup]").value;
  let nsetups = document.querySelector("input[name=nsetups]").value
  let timedays = document.querySelector("input[name=time_days]").value;
  let timehours = document.querySelector("input[name=time_hours]").value;
  let timeminutes = document.querySelector("input[name=time_minutes]").value;
  let timeseconds = document.querySelector("input[name=time_seconds]").value;
  let customin = document.querySelector("input[name=customin]").value
  let secondstotal = timedays*24*60*60 + timehours*60*60 + timeminutes*60 + timeseconds*1;
  let c=  customin * (secondstotal/60) + customin * (temposetup/60) * nsetups
  custo1peça.textContent = c + " €";
}




function init(){
  var table = document.getElementById("bdtable");
  for (var i = 0, row; row = table.rows[i]; i++) {
    row.setAttribute('id',i);
  }
}

var i = 100;

// CONTAGEM DECRESCENTE
function showContagem(rowid){

  console.log(rowid);

  //ESTADO
  /*let estado = document.getElementById("estado"+rowid );
  estado.innerHTML =`<p id="demo"></p><div class="progress">
  <div id="theBar" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> </div></div>`
*/
  let finaldateprevista = document.getElementById("termino"+rowid ); 

  var countDownDate = new Date(finaldateprevista.innerHTML.substr(3,finaldateprevista.innerHTML.length-7)).getTime();


  
  //DATA INICIO
  let comecarplace = document.getElementById("comecarplace"+rowid );
  var datainicioagora=new Date();
  
  comecarplace.innerHTML =`<p>${datainicioagora.getFullYear()}-${datainicioagora.getMonth()+1}-${datainicioagora.getDate()} ${datainicioagora.getHours()}:${datainicioagora.getMinutes()}:${datainicioagora.getSeconds()}</p>`;

  let request=new XMLHttpRequest()
  request.open('post','../updateDataIni.php?',true)
  request.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
  request.send(encodeForAjax({'id': rowid,
  'data': comecarplace.innerHTML}));
  
  var dateatual=new Date();
  var termino=new Date(finaldateprevista.innerHTML.substr(3,finaldateprevista.innerHTML.length-7)).getTime();
  var milisecs = Math.abs(termino - dateatual) ;
  let days = Math.floor(milisecs/(1000 * 3600 * 24));
  let horas = Math.floor(milisecs/(1000 * 3600 ) - days);
  let min = Math.floor(milisecs/(1000 * 60 ) - horas);
  let seg = Math.floor(milisecs/(1000 ) - min);
  let estado = days + 'd ' + horas + 'h ' + min + 'm ' + seg + 's ';
  updateEstado(rowid,estado);
}

// PROGRESS BAR:

/*var counterBack = setInterval(function(){
  i--;
  if (i > 0){
    $('.progress-bar').css('width', i+'%');
  } else {
    clearInterval(counterBack);
  }
}, 1000);

*/


//get encomendas
var encomendas;


//por segundo:
var x = setInterval(function() {
  if(window.location.href.substr(window.location.href.length-5)=='2.php'){
  
  let request=new XMLHttpRequest()
  request.open('post','../state.php?',true)
  request.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
  request.addEventListener('load', deal);
  request.send();
  }
}, 1000);

function deal(){
  var dateatual=new Date();
  var termino;
  var data=this.responseText;
  encomendas = JSON.parse(data);

  encomendas.forEach(encomenda => {
    if(encomenda['estado']!='Por começar' && encomenda['estado']!='Finalizado'){
      if(encomenda['terminoPrevisto'].substr(0,1)=="<"){
        termino=new Date(encomenda['terminoPrevisto'].substr(3,encomenda['terminoPrevisto'].length-7)).getTime();
      }
      else{
        termino=new Date(encomenda['terminoPrevisto'])
      }
      var milisecs = Math.abs(termino - dateatual) ;
      let days = Math.floor(milisecs/(1000 * 3600 * 24));
      let horas = Math.floor(milisecs/(1000 * 3600 ) - days);
      let min = Math.floor(milisecs/(1000 * 60 ) - horas);
      let seg = Math.floor(milisecs/(1000 ) - min);
      let estado = days + 'd ' + horas + 'h ' + min + 'm ' + seg + 's ';
      updateEstado(encomenda['encomendaId'],estado);
    }
  });
}

function updateEstado(id,estado){
  let estadof=estado;
  let request=new XMLHttpRequest()
  request.open('post','../updateState.php?',true)
  request.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
  request.addEventListener('load', deal2);
  request.send(encodeForAjax({'id': id,
  'estado': estadof}));
}

function deal2(){
  var data=this.responseText;
  var res = JSON.parse(data);
  
  let estado = document.getElementById("estado"+res['id'] );
  estado.innerHTML = res['estado']
}