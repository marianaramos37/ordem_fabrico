'use strict'


// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("submitcost");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function(event) {
    modal.style.display = "block";
    event.preventDefault()

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
    let datahorainit = document.querySelector("input[name=hora]").value

    let finalname = document.getElementById("finalname");                 
    let finalcost = document.getElementById("finalcost");    
    let finaltime = document.getElementById("finaltime");    
    let finaldate = document.getElementById("finaldate");    

    let secondstotal = timedays*24*60*60 + timehours*60*60 + timeminutes*60 + timeseconds*1;
    let c=  customin * (secondstotal/60) * quantidade + customin * (temposetup/60) * nsetups;
  
    var d = new Date(datahorainit);
    d.setHours(d.getHours()-1);

    //Horario;

    let h_inicio_slot1 = document.querySelector(`input[name=${CSS.escape("a" + d.getDay())}]`).value;
    let h_fim_slot1 = document.querySelector(`input[name=${CSS.escape("b" + d.getDay())}]`).value;
    let h_inicio_slot2 = document.querySelector(`input[name=${CSS.escape("c" + d.getDay())}]`).value;
    let h_fim_slot2 = document.querySelector(`input[name=${CSS.escape("d" + d.getDay())}]`).value;
    let h_inicio_slot3 = document.querySelector(`input[name=${CSS.escape("e" + d.getDay())}]`).value;
    let h_fim_slot3 = document.querySelector(`input[name=${CSS.escape("f" + d.getDay())}]`).value;
    let h_inicio_slot4 = document.querySelector(`input[name=${CSS.escape("g" + d.getDay())}]`).value;
    let h_fim_slot4 = document.querySelector(`input[name=${CSS.escape("h" + d.getDay())}]`).value;

    let dateinicioslot1= new Date(d.getFullYear(), d.getMonth(), d.getDay(),h_inicio_slot1.substr(0, h_inicio_slot1.indexOf(':')),h_inicio_slot1.substr(h_inicio_slot1.indexOf(':')+1));
    let datefimslot1= new Date(d.getFullYear(), d.getMonth(), d.getDay()+1,h_fim_slot1.substr(0, h_fim_slot1.indexOf(':')),h_fim_slot1.substr(h_fim_slot1.indexOf(':')+1));
    let dateinicioslot2= new Date(d.getFullYear(), d.getMonth(), d.getDay(),h_inicio_slot2.substr(0, h_inicio_slot2.indexOf(':')),h_inicio_slot2.substr(h_inicio_slot2.indexOf(':')+1));
    let datefimslot2= new Date(d.getFullYear(), d.getMonth(), d.getDay(),h_fim_slot2.substr(0, h_fim_slot2.indexOf(':')),h_fim_slot2.substr(h_fim_slot2.indexOf(':')+1));
    let dateinicioslot3= new Date(d.getFullYear(), d.getMonth(), d.getDay(),h_inicio_slot3.substr(0, h_inicio_slot3.indexOf(':')),h_inicio_slot3.substr(h_inicio_slot3.indexOf(':')+1));
    let datefimslot3= new Date(d.getFullYear(), d.getMonth(), d.getDay(),h_fim_slot3.substr(0, h_fim_slot3.indexOf(':')),h_fim_slot3.substr(h_fim_slot3.indexOf(':')+1));
    let dateinicioslot4= new Date(d.getFullYear(), d.getMonth(), d.getDay(),h_inicio_slot4.substr(0, h_inicio_slot4.indexOf(':')),h_inicio_slot4.substr(h_inicio_slot4.indexOf(':')+1));
    let datefimslot4= new Date(d.getFullYear(), d.getMonth(), d.getDay(),h_fim_slot4.substr(0, h_fim_slot4.indexOf(':')),h_fim_slot4.substr(h_fim_slot4.indexOf(':')+1));
   
    let temposlot1=2*60*60+10*60; //segundos
    let temposlot2=2*60*60+20*60; //segundos
    let temposlot3=2*60*60+30*60; //segundos
    let temposlot4=50*60; //segundos

    //Calcular hora final:

    let slot=0;
    let t=0;
    if( (d.getHours()==7 && d.getMinutes()>=50)  || d.getHours()==8 || d.getHours()==9 || (d.getHours==10 && d.getMinutes==0)){
      slot=1;
      t=Math.abs(datefimslot1-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    } 
    else if( (d.getHours()==10 && d.getMinutes()>=10) || d.getHours()==11 || (d.getHours()==12 && d.getMinutes()<=30) ){ 
      slot=2;
      t=Math.abs(datefimslot2-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    }
    else if((d.getHours()==13 && d.getMinutes()>=30) || d.getHours()==14 || d.getHours()==15){ 
      slot=3;
      t=Math.abs(datefimslot3-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    }
    else if((d.getHours()==16 && d.getMinutes()>=10)){ 
      slot=4;
      t=Math.abs(datefimslot4-d); // horas de trabalho feitas, em milisegundos
      d=addMinutes(d,t/1000/60);
      secondstotal-=t/1000;
    }

    let  slotfinal=0;
    while(secondstotal>0){
      slot=slot+1;
      if(slot==1){
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
        d=dateinicioslot2;
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
        d=dateinicioslot3;
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
        d=dateinicioslot4;
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

    finalname.innerHTML =`<p>${name} </p>`
    finalcost.innerHTML =`<p>${c} € </p>`
    finaltime.innerHTML =`<p>${(secondstotal * quantidade) / trabalhadores / 60}  minutos</p>`
    let auxday=d.getDay()+1; let auxmonth=d.getMonth()+1;
    finaldate.innerHTML =`<p>${auxday}}/${auxmonth}/${d.getFullYear()} às ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()} </p>`
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {rtfrtfrtf
  if (event.target == modal){
    modal.style.display = "none";
  }
}



//Horarios Modal:
var modal2 = document.getElementById("myModal2");
var btnHorario = document.getElementById("btnhorario");
btnHorario.onclick = function(event) {
    modal2.style.display = "block";
    event.preventDefault();
}
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}



function addMinutes(date, minutes) {
  return new Date(date.getTime() + minutes*60*1000);
}

function addHours(date, hours) {
  return new Date(date.getTime() + hours*60*60*1000);
}

function addDays(date, days) {
  return new Date(date.getTime() + days);
}

