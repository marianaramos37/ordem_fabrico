<?php
    include_once('database/db.php');
    $horario = getHorario();
    $dados = getDados();
?>

<html lang="en">

<head>
    <title>Ordem Fabrico</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="../javascript/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
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
                                <a class="nav-link active" href="#">Ordem de fabrico
                                    <span class="visually-hidden">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a onclick="init()" class="nav-link" href="index2.php">Base de dados</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Dados</a>
                                <div class="dropdown-menu p-3" style="width: 17em;">
                                    <form id="dadosForm" action="updateDados.php" method="post">
                                        <div class="mb-3">
                                            <a class="mb-1" href="" data-toggle="tooltip" data-placement="right"
                                                title="Carregue para calcular">Custo por minuto / € :</a>
                                            <div class="d-grid gap-2">
                                                <input type="text" id="customin" name="customin"
                                                    value=<?=$dados[0]['custoPorMinuto']?>>
                                            </div>

                                        </div>
                                        <div class="mb-3"><label class="mb-1">Tempo setup médio / s :</label>
                                            <div class="d-grid gap-2">
                                                <input type="text" id="customin" name="temposetup"
                                                    value=<?=$dados[0]['tempoSetup']?>>
                                            </div>
                                        </div>
                                        <div class="mb-3"><label class="mb-1">Número trabalhadores :</label>
                                            <div class="d-grid gap-2">
                                                <input type="text" id="trabalhadores" name="trabalhadores"
                                                    value=<?=$dados[0]['numeroTrabalhadores']?>>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    Gravar alterações
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    <div>

                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalhorario">
                                                Alterar horário
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </nav>
    </header>

    <div id="message"></div>


    <div class="row mt-5"></div>
    <form id="mainform" action="insertEncomenda.php" method="post" class="row mt-5 mb-5 needs-validation">
        <div class="col-3"></div>
        <div style=" border-style: solid; border-radius: 0; padding-top: 4em !important;"
            class="col-6 p-5 shadow-lg p-3 mb-5 bg-white ">
            <h2>Ordem Fabrico</h2>

            <div class="mt-3 mb-3">
                <label for="name" class="col-form-label">Produto *</label><br>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insira o nome do produto"
                    required><br>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label class=" col-form-label" for="name">Nº documento</label>
                        <input class="form-control" type="text" id="documento" name="documento"
                            placeholder="Insira o número do documento ">
                    </div>
                    <div class="col-6 ">
                        <label class="col-sm-2 col-form-label" for="name">Cliente</label><br>
                        <input class="form-control" type="text" id="cliente" name="cliente"
                            placeholder="Insira o nome do cliente"><br>
                    </div>
                </div>


            </div>
            <div class="mb-3">
                <label class="col-form-label" for="tempo amostra">Tempo duração amostra *</label><br>
                <div class="row">
                    <div class="col-3">
                        <input class="form-control" type="number" min="0" step="1" autocomplete="off" value="0"
                            name="time_days" id="time_days" onkeyup="showQuantMin(this)" onmouseup="showQuantMin(this)"
                            onkeyup="showCusto1peça(this)" onmouseup="showCusto1peça(this)"> dias,
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="number" min="0" step="1" autocomplete="off" value="0"
                            name="time_hours" id="time_hours" onkeyup="showQuantMin(this)"
                            onmouseup="showQuantMin(this)" onkeyup="showCusto1peça(this)"
                            onmouseup="showCusto1peça(this)"> horas,
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="number" min="0" step="1" autocomplete="off" value="0"
                            name="time_minutes" id="time_minutes" onkeyup="showQuantMin(this)"
                            onmouseup="showQuantMin(this)" onkeyup="showCusto1peça(this)"
                            onmouseup="showCusto1peça(this)"> minutos,
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="number" min="0" step="1" autocomplete="off" value="0"
                            name="time_seconds" id="time_seconds" onkeyup="showQuantMin(this)"
                            onmouseup="showQuantMin(this)" onkeyup="showCusto1peça(this)"
                            onmouseup="showCusto1peça(this)"> segundos
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-5">

                <div class="col-6">
                    <label class="col-form-label" for="fname">Número de setups *</label>
                    <input class="form-control" type="number" min="0" id="nsetups" name="nsetups" value=0
                        onkeyup="showQuantMin(this)" onmouseup="showQuantMin(this)"><br>
                </div>
                <div class="col-6 ">
                    <label class="col-form-label" for="fname">Quantidade mínima de peças recomendada</label><br>
                    <span class="align-middle" id="quantmin"></span>
                </div>
            </div>

            <div class=" row mb-3">
                <div class="col-6">
                    <label class="col-form-label" for="lname">Quantidade de peças para produção *</label>
                    <input class="form-control" type="number" min="0" id="quantidade" name="quantidade" value=1
                        onkeyup="showCusto1peça(this)" onmouseup="showCusto1peça(this)"><br>
                </div>
                <div class="col-6 ">
                    <label class="col-form-label" for="lname">Custo de 1 peça</label><br>
                    <span class="align-middle" id="custo1peça"> </span>
                </div>
            </div>

            <div class="row mb-5">
                <label class="col-form-label" for="lname">Dia e hora de início *</label><br>
                <div class="col-6">
                    <input class="form-control" type="date" id="data" name="data" step=1 placeholder="Insira uma data"
                        required>
                </div>
                <div class="col-6">
                    <input class="timepicker" id="hora" name="hora" type="text" placeholder="00:00" required> <br>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button id="submitcost" type="button" class="btn btn-primary btn-block ">
                    Calcular custo total e término
                </button>
            </div>

            <!-- Modal resultados -->

            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content px-3 py-3">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ordem de fabrico</h5>
                            <button id="closemodal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">
                                    <label style=" font-weight: bold; ">Produto:</label>
                                    <p id="finalname"></p>
                                </div>
                                <div class="col-4 ">
                                    <label style=" font-weight: bold;">Nº documento:</label>
                                    <p id="finaldocumento"></p>
                                </div>
                                <div class="col-4 ">
                                    <label style=" font-weight: bold;">Cliente:</label>
                                    <p id="finalcliente"></p><br>

                                </div>
                                <hr>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <label style=" font-weight: bold;">Tempo de duração da amostra:</label>
                                    <p id="finalamostra"></p><br>
                                </div>
                                <div class="col-6">
                                    <label style=" font-weight: bold;">Número de setups:</label>
                                    <p id="finalsetups"></p><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label style=" font-weight: bold;">Quantidade de peças a produzir:</label>
                                    <p id="finalpeças"></p><br>
                                </div>
                                <div class="col-6">
                                    <label style=" font-weight: bold;">Tempo que vai demorar:</label>
                                    <p id="finaltime"></p><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <label style=" font-weight: bold;">Data e hora de inicio da produção:</label>
                                    <p id="finalinidate"></p><br>
                                </div>
                                <div class="col-6">
                                    <label style=" font-weight: bold;">Data e hora de fim da produção:</label>
                                    <input type="hidden" id="finaldatehidden" name="finaldatehidden"
                                        vlaue="<?php echo $row[1] ?>">
                                    <p id="finaldate"></p>
                                </div>
                            </div>
                            <label style=" font-weight: bold;">Custo total:</label>
                            <p id="finalcost"></p>

                            <br>
                            <hr>

                            <fieldset class="form-group">
                                <label class="mt-4">Escolha uma opção</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios"
                                            id="optionsRadios1" value="option1" checked="">
                                        Começar automaticamente à hora de inicio de produção marcada.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios"
                                            id="optionsRadios2" value="option2">
                                        Começar manualmente na base de dados.
                                    </label>
                                </div>
                            </fieldset>

                        </div>

                        <div class="modal-footer">
                            <button id="closemodal2" type="button" class="btn btn-secondary"
                                data-dismiss="modal">Alterar</button>
                            <button type="submit" class="btn btn-primary">Guardar na base de dados</button>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-3"></div>
    </form>


    <footer class="px-5 py-3 align-middle" style="background-color: #0000002a; margin-bottom=0 !important;">
        <div class="col-1"></div>
        <div class="col-10 align-middle">
            <p class="align-middle mb-0">&copy 2021 - Mariana Ramos</p>
        </div>
        <div class="col-1"></div>
    </footer>






    <!-- Modal Horario-->

    <div class="modal fade " id="modalhorario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Horário de trabalho</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="horarioform" action="updateHorario.php" method="post">
                        <div class="table-wrapper">
                            <table style="width: 100%" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Segunda-feira</th>
                                        <th scope="col">Terça-feira</th>
                                        <th scope="col">Quarta-feira</th>
                                        <th scope="col">Quita-feira</th>
                                        <th scope="col">Sexta-feira</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding:0.2em !important;">
                                            <input class="timepicker" name="a1" type="text" style="width:6em"
                                                value=<?=$horario[0]['a1']?>>
                                            -
                                            <input class="timepicker" name="b1" type="text" style="width:6em"
                                                value=<?=$horario[0]['b1']?>>
                                        </td>
                                        <td style="padding:0.2em !important;">
                                            <input class="timepicker" name="a2" type="text" style="width:6em"
                                                value=<?=$horario[0]['a2']?>>
                                            -
                                            <input class="timepicker" name="b2" type="text" style="width:6em"
                                                value=<?=$horario[0]['b2']?>>
                                        </td>
                                        <td style="padding:0.2em !important;">
                                            <input class="timepicker" name="a3" type="text" style="width:6em"
                                                value=<?=$horario[0]['a3']?>>
                                            -
                                            <input class="timepicker" name="b3" type="text" style="width:6em"
                                                value=<?=$horario[0]['b3']?>>
                                        </td>
                                        <td style="padding:0.2em !important;">
                                            <input class="timepicker" name="a4" type="text" style="width:6em"
                                                value=<?=$horario[0]['a4']?>>
                                            -
                                            <input class="timepicker" name="b4" type="text" style="width:6em"
                                                value=<?=$horario[0]['b4']?>>
                                        </td>
                                        <td style="padding:0.2em !important;">
                                            <input class="timepicker" name="a5" type="text" style="width:6em"
                                                value=<?=$horario[0]['a5']?>>
                                            -
                                            <input class="timepicker" name="b5" type="text" style="width:6em"
                                                value=<?=$horario[0]['b5']?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0.2em !important;">
                                            <input class="timepicker" name="c1" type="text" style="width:6em"
                                                value=<?=$horario[0]['c1']?>>
                                            -
                                            <input class="timepicker" name="d1" type="text" style="width:6em"
                                                value=<?=$horario[0]['d1']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="c2"
                                                type="text" style="width:6em" value=<?=$horario[0]['c2']?>> -
                                            <input class="timepicker" name="d2" type="text" style="width:6em"
                                                value=<?=$horario[0]['d2']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="c3"
                                                type="text" style="width:6em" value=<?=$horario[0]['c3']?>> -
                                            <input class="timepicker" name="d3" type="text" style="width:6em"
                                                value=<?=$horario[0]['d3']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="c4"
                                                type="text" style="width:6em" value=<?=$horario[0]['c4']?>> -
                                            <input class="timepicker" name="d4" type="text" style="width:6em"
                                                value=<?=$horario[0]['d4']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="c5"
                                                type="text" style="width:6em" value=<?=$horario[0]['c5']?>> -
                                            <input class="timepicker" name="d5" type="text" style="width:6em"
                                                value=<?=$horario[0]['d5']?>>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="e1"
                                                type="text" style="width:6em" value=<?=$horario[0]['e1']?>> -
                                            <input class="timepicker" name="f1" type="text" style="width:6em"
                                                value=<?=$horario[0]['f1']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="e2"
                                                type="text" style="width:6em" value=<?=$horario[0]['e2']?>> -
                                            <input class="timepicker" name="f2" type="text" style="width:6em"
                                                value=<?=$horario[0]['f2']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="e3"
                                                type="text" style="width:6em" value=<?=$horario[0]['e3']?>> -
                                            <input class="timepicker" name="f3" type="text" style="width:6em"
                                                value=<?=$horario[0]['f3']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="e4"
                                                type="text" style="width:6em" value=<?=$horario[0]['e4']?>> -
                                            <input class="timepicker" name="f4" type="text" style="width:6em"
                                                value=<?=$horario[0]['f4']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="e5"
                                                type="text" style="width:6em" value=<?=$horario[0]['e5']?>> -
                                            <input class="timepicker" name="f5" type="text" style="width:6em"
                                                value=<?=$horario[0]['f5']?>>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="g1"
                                                type="text" style="width:6em" value=<?=$horario[0]['g1']?>> -
                                            <input class="timepicker" name="h1" type="text" style="width:6em"
                                                value=<?=$horario[0]['h1']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="g2"
                                                type="text" style="width:6em" value=<?=$horario[0]['g2']?>> -
                                            <input class="timepicker" name="h2" type="text" style="width:6em"
                                                value=<?=$horario[0]['h2']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="g3"
                                                type="text" style="width:6em" value=<?=$horario[0]['g3']?>> -
                                            <input class="timepicker" name="h3" type="text" style="width:6em"
                                                value=<?=$horario[0]['h3']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="g4"
                                                type="text" style="width:6em" value=<?=$horario[0]['g4']?>> -
                                            <input class="timepicker" name="h4" type="text" style="width:6em"
                                                value=<?=$horario[0]['h4']?>>
                                        </td>
                                        <td style="padding:0.2em !important;"> <input class="timepicker" name="g5"
                                                type="text" style="width:6em" value=<?=$horario[0]['g5']?>> -
                                            <input class="timepicker" name="h5" type="text" style="width:6em"
                                                value=<?=$horario[0]['h5']?>>
                                        </td>
                                    </tr>

                                <tbody>
                            </table>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" href="index2.php" class="btn btn-primary">Atualizar</button>
                        </div>
                </div>
                </form>
            </div>
        </div>






</body>

</html>