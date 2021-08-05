
<html lang="en">
        <head>
            <title>Animal Shelter</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/responsive.css">
            <script src="https://kit.fontawesome.com/e082488467.js" crossorigin="anonymous"></script>
            <script src="../javascript/script.js" defer></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="css.escape.js"></script>

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.timepicker').timepicker({
            showMeridian: false,
            showInputs: true
        });
    });
    
</script>

        </head>
        <body>

        <header>
                <div id="menu-top">
                    <nav id="desktop_session_menu">
                        <div class="dropdown">
                            <button class="dropbtn">Dados</button>
                            <div class="dropdown-content">
                                    <div >
                                        <label >Custo por minuto / € :</label>
                                        <input type="text" id="customin" name="customin" value="0.155" > 
                                        <a class="button" href="index.php" style="text-decoration:none">Calcular</a>
                                    </div>
                                    <div ><label >Tempo setup médio / s :</label>
                                        <input type="text" id="customin" name="temposetup" value="121.8" >  
                                    </div>
                                    <div ><label >Número trabalhadores :</label>
                                        <input type="text" id="trabalhadores" name="trabalhadores" value="1" >  
                                    </div>
                                    <div ><input id="btnhorario" type="submit" value="Alterar horário" />
                                    </div>
                            </div>
                        
                            <a class="buttonmenu" href="index2.php" style="text-decoration:none">Base de dados</a>
                         
                        

                    </nav>
                </div>
                
            </header>
<section class="pets" id = "favourites">
    <h2>Calculadora de custo</h2>
    <div >
        <form id="costform">
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="tempo amostra">Tempo duração amostra:</label><br>
        <input type="number" step="1" autocomplete="off" value="0" name="time_days"    id="time_days"  style="width:9rem" > dias, 
	    <input type="number" step="1" autocomplete="off" value="0" name="time_hours"   id="time_hours" style="width:9rem "> horas, 
	    <input type="number" step="1" autocomplete="off" value="0" name="time_minutes" id="time_minutes" style="width:9rem "> minutos, 
	    <input type="number" step="1" autocomplete="off" value="0" name="time_seconds" id="time_seconds" style="width:9rem" > segundos
        <label for="fname">Número de setups:</label><br>
        <input type="text" id="nsetups" name="nsetups"><br>
        <label for="lname">Quantidade de peças:</label><br>
        <input type="text" id="quantidade" name="quantidade" ><br>
        <label for="lname">Dia e hora de início:</label><br>
        <input type="datetime-local" id="hora" name="hora" step=1 ><br>
        <input id="submitcost" type="submit" value="Calcular custo e término" />
        </form>
    </div>
</section>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Resultados</h3>
    <label style=" font-weight: bold;">Nome:</label><p id="finalname"></p><br>
    <label style=" font-weight: bold;">Custo total:</label><p id="finalcost"></p><br> 
    <label style=" font-weight: bold;">Tempo que demora:</label><p id="finaltime"></p><br>
    <label style=" font-weight: bold;">Data de fim:</label><p id="finaldate"></p><br>
  </div>

</div>



<!-- The Modal Horario-->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Horário trabalho</h2>
   
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Segunda-feira</th>
            <th>Terça-feira</th>
            <th>Quarta-feira</th>
            <th>Quita-feira</th>
            <th>Sexta-feira</th>
        </tr>
        </thead>
        <tbody>
        
        <tr>
            <td> <input class="timepicker" name="a1" type="text" style="width:6em" value="7:50"> - <input class="timepicker" name="b1" type="text" style="width:6em" value="10:00"></td>
            <td> <input class="timepicker" name="a2" type="text" style="width:6em" value="7:50"> - <input class="timepicker" name="b2" type="text" style="width:6em" value="10:00"></td>
            <td> <input class="timepicker" name="a3" type="text" style="width:6em" value="7:50"> - <input class="timepicker" name="b3" type="text" style="width:6em" value="10:00"></td>            
            <td> <input class="timepicker" name="a4" type="text" style="width:6em" value="7:50"> - <input class="timepicker" name="b4" type="text" style="width:6em" value="10:00"></td>
            <td> <input class="timepicker" name="a5" type="text" style="width:6em" value="7:50"> - <input class="timepicker" name="b5" type="text" style="width:6em" value="10:00"></td>
        </tr>
        <tr>
        <td> <input class="timepicker" name="c1" type="text" style="width:6em" value="10:10"> - <input class="timepicker" name="d1" type="text" style="width:6em" value="12:30"></td>
        <td> <input class="timepicker" name="c2" type="text" style="width:6em" value="10:10"> - <input class="timepicker" name="d2" type="text" style="width:6em" value="12:30"></td>
        <td> <input class="timepicker" name="c3" type="text" style="width:6em" value="10:10"> - <input class="timepicker" name="d3" type="text" style="width:6em" value="12:30"></td>
        <td> <input class="timepicker" name="c4" type="text" style="width:6em" value="10:10"> - <input class="timepicker" name="d4" type="text" style="width:6em" value="12:30"></td>
        <td> <input class="timepicker" name="c5" type="text" style="width:6em" value="10:10"> - <input class="timepicker" name="d5" type="text" style="width:6em" value="12:30"></td>
           
        </tr>
        <tr>
        <td> <input class="timepicker" name="e1" type="text" style="width:6em" value="13:30"> - <input class="timepicker" name="f1" type="text" style="width:6em" value="16:00"></td>
        <td> <input class="timepicker" name="e2" type="text" style="width:6em" value="13:30"> - <input class="timepicker" name="f2" type="text" style="width:6em" value="16:00"></td>         
        <td> <input class="timepicker" name="e3" type="text" style="width:6em" value="13:30"> - <input class="timepicker" name="f3" type="text" style="width:6em" value="16:00"></td>         
        <td> <input class="timepicker" name="e4" type="text" style="width:6em" value="13:30"> - <input class="timepicker" name="f4" type="text" style="width:6em" value="16:00"></td>           
        <td> <input class="timepicker" name="e5" type="text" style="width:6em" value="13:30"> - <input class="timepicker" name="f5" type="text" style="width:6em" value="16:00"></td>
        </tr>

        <tr>
        <td> <input class="timepicker" name="g1" type="text" style="width:6em" value="16:10"> - <input class="timepicker" name="h1" type="text" style="width:6em" value="17:00"></td>
        <td> <input class="timepicker" name="g2" type="text" style="width:6em" value="16:10"> - <input class="timepicker" name="h2" type="text" style="width:6em" value="17:00"></td>         
        <td> <input class="timepicker" name="g3" type="text" style="width:6em" value="16:10"> - <input class="timepicker" name="h3" type="text" style="width:6em" value="17:00"></td>        
        <td> <input class="timepicker" name="g4" type="text" style="width:6em" value="16:10"> - <input class="timepicker" name="h4" type="text" style="width:6em" value="17:00"></td>          
        <td> <input class="timepicker" name="g5" type="text" style="width:6em" value="16:10"> - <input class="timepicker" name="h5" type="text" style="width:6em" value="17:00"></td>
        </tr>

        <tr>
        <td id="res"> kk</td>
        
        </tr>
    
        <tbody>
    </table>
</div>
  </div>

</div>

</body>
    </html>