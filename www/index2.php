<?php
    include_once('database/db.php');
    $encomendas = getAllEncomendas();
?>


<html lang="en">

<head>
    <title>Ordem Fabrico</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="../javascript/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.timepicker').timepicker({
            showMeridian: false,
            showInputs: true,
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/style.css">
</head>



<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link " href="index.php">Ordem de fabrico
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="index2.php">Base de dados
                                    <span class="visually-hidden">(current)</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </nav>
    </header>


    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table id="bdtable" class="table table-hover mt-5">
                <thead>
                    <tr>

                        <th scope="col">Produto</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Nº Documento</th>
                        <th scope="col">Nº Peças</th>
                        <th scope="col">Data inicio prevista</th>
                        <th scope="col">Data fim prevista</th>
                        <th scope="col">Data inicio real</th>
                        <th scope="col">Data fim real</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                foreach($encomendas as $encomenda){ ?>
                    <tr>
                        <td><?=$encomenda['nomeProduto']?></td>
                        <td><?=$encomenda['cliente']?></td>
                        <td><?=$encomenda['ndocumento']?></td>
                        <td><?=$encomenda['numeroPecas']?></td>
                        <td><?=$encomenda['inicioPrevisto']?></td>
                        <td id="termino<?=$encomenda['encomendaId']?>"><?=$encomenda['terminoPrevisto']?></td>
                        <?php 
                if($encomenda['estado']=='Por começar'){ ?>
                        <td>
                            <p id="comecarplace<?=$encomenda['encomendaId']?>"> <button id="comecarbtn" type="button"
                                    class="btn btn-outline-success "
                                    onclick="showContagem(<?=$encomenda['encomendaId']?>)">Começar</button> </p>
                        </td>

                        <?php }
                        else{ ?>
                        <td>
                            <p id="comecarplace<?=$encomenda['encomendaId']?>"> <?=$encomenda['inicioReal']?> </p>
                        </td>
                        <?php }
                       ?>
                        <td><button type="button" class="btn btn-outline-secondary">Parar</button></td>
                        <td>
                            <p id="estado<?=$encomenda['encomendaId']?>"><?=$encomenda['estado']?></p>
                        </td>
                    </tr>
                    <?php 
                } ?>
                </tbody>
            </table>
        </div>


        <div class="col-1"></div>

    </div>






</body>

</html>