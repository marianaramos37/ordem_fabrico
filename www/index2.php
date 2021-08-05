<?php
 include_once('database/db.php');
  $encomendas = getAllEncomendas();
  ?> 
  
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
                                 
                               </div>
                               <div ><label >Tempo setup médio / s :</label>
                                   <input type="text" id="customin" name="temposetup" value="121.8" >  
                               </div>
                               <div ><label >Número trabalhadores :</label>
                                   <input type="text" id="trabalhadores" name="trabalhadores" value="1" >  </div>
                               </div>
                       </div>
                   

                       <a class="buttonmenu" href="index.php" style="text-decoration:none">Voltar</a>
                   

               </nav>
           </div>
           
    
       </header>

       <div class="limiter">
		<div class="container">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Ecomenda</th>
								<th class="column2">Nº peças</th>
								<th class="column3">Data início</th>
								<th class="column4">Data fim</th>
                                <th class="column4">Tempo</th>
								<th class="column5">Custo total</th>
								<th class="column6">Estado</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td class="column1">Biquini amarelo</td>
									<td class="column2">60</td>
									<td class="column3">2017-09-29 01:22</td>
									<td class="column4">2017-09-29 01:22</td>
                                    <td class="column4">3 horas</td>
									<td class="column5">$999.00</td>
									<td class="column6">Concluída</td>
								</tr>
                                <tr>
									<td class="column1">Camisa Verde</td>
									<td class="column2">60</td>
									<td class="column3">2017-09-29 01:22</td>
									<td class="column4">2017-09-29 01:22</td>
                                    <td class="column4">4:5:10 horas</td>
									<td class="column5">$999.00</td>
									<td class="column6">Concluída</td>
								</tr>
                                <tr>
									<td class="column1">Calças treino</td>
									<td class="column2">60</td>
									<td class="column3">2017-09-29 01:22</td>
									<td class="column4">2017-09-29 01:22</td>
                                    <td class="column4">4:5:10 horas</td>
									<td class="column5">$999.00</td>
									<td class="column6">A decorrer</td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
       
       </body>
       </html>
