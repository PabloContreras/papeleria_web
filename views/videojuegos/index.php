<?php 
    session_start();
    if (isset($_SESSION['name'])){
        $name = $_SESSION['name'];
    }else{
        header('Location: /');
        die() ;

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bienvenido | <?php echo $_SESSION['name']; ?></title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
  
    <body>      
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/views/turista/index.php"><i class="fas fa-home"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/views/mascotas/index.php">Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/pais/index.php">País</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/videojuegos/index.php">Videojuegos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/notas/index.php">Notas</a>
                    </li>
                </ul>
            </div>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="/base/logout.php">Salir</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="col-lg-10 ml-auto mr-auto mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Consola</th>
                                <th scope="col">Descripción</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $conexion = mysqli_connect("localhost","admin","admin","project");
                                $registros = mysqli_query($conexion,"SELECT * FROM videojuegos where turista_id = {$_SESSION['turista_id']}"); 
                                
                                while ( $fila = mysqli_fetch_array($registros) ){
                                    echo '<tr>';
                                    echo '<td>'.$fila ["id"].'</td>';
                                    echo '<td>'.$fila ["nombre"].'</td>';
                                    echo '<td>'.$fila ["precio"].'</td>';
                                    echo '<td>'.$fila ["consola"].'</td>';
                                    echo '<td>'.$fila ["descripcion"].'</td>';
                                    echo '<td><button class="btn btn-info" style="background-color: transparent; border: none; padding-top: 0px; padding-bottom: 0px;" data-toggle="modal" data-target="#exampleModal'.$fila ["id"].'"><i class="fas fa-edit mb-2" style="color:black;"></i></a></td>';

                                    echo '<td><a href="/views/videojuegos/delete.php?id='.$fila ["id"].'"><i class="fas fa-trash-alt" style="color:black;"></i></a></td>';
                                    echo '</tr>';       
                                    echo  '<div class="modal fade" id="exampleModal'.$fila ["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="/views/videojuegos/update.php?id='.$fila ["id"].'">
                                                    <div class="modal-body">
                                                        <div class="col-lg-12"> 
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="recipient-videojuego" class="col-form-label">Videojuego:</label>
                                                                        <input name="name" type="text" class="form-control is-valid" id="recipient-videojuego" value="'.$fila ["nombre"].'">
                                                                        <div class="valid-feedback" id="valid-feedback-edit">Correcto</div>
                                                                        <div class="invalid-feedback-edit" id="invalid-feedback">Ingresa un nombre</div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-precio" class="col-form-label">Precio:</label>
                                                                        <input name="price" type="number" class="form-control is-valid" id="recipient-precio" value="'.$fila ["precio"].'">
                                                                        <div class="valid-feedback" id="price-valid-feedback-edit">Correcto</div>
                                                                        <div class="invalid-feedback-edit" id="price-invalid-feedback">Ingresa un precio</div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-consola" class="col-form-label">Consola:</label>
                                                                        <input name="console" type="text" class="form-control is-valid" id="recipient-consola" value="'.$fila ["consola"].'">
                                                                        <div class="valid-feedback" id="consola-valid-feedback-edit">Correcto</div>
                                                                        <div class="invalid-feedback-edit" id="consola-invalid-feedback">Ingresa una consola</div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Descripción:</label>
                                                                        <textarea name="description" class="form-control is-valid" id="message-text">'.ucfirst($fila ["descripcion"]).'</textarea>
                                                                        <div class="valid-feedback" id="desc-valid-feedback-edit">Correcto</div>
                                                                        <div class="invalid-feedback-edit" id="desc-invalid-feedback">Ingresa una descripción</div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>';                    
                                }
                             ?>
                        </tbody>
                    </table> 
                </div>
                <div class="col-lg-2 my-auto">
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Agregar</button>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/views/videojuegos/create.php">
                        <div class="modal-body">
                            <div class="col-lg-12"> 
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="recipient-videojuego" class="col-form-label">Videojuego:</label>
                                            <input name="name" type="text" class="form-control" id="recipient-videojuego" required="">
                                            <div class="valid-feedback" id="valid-feedback">Correcto</div>
                                            <div class="invalid-feedback" id="invalid-feedback">Ingresa un nombre</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-precio" class="col-form-label">Precio:</label>
                                            <input name="price" type="number" class="form-control" id="recipient-precio" min="0" step="0.01" required="">
                                            <div class="valid-feedback" id="price-valid-feedback">Correcto</div>
                                            <div class="invalid-feedback" id="price-invalid-feedback">Ingresa un precio</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-consola" class="col-form-label">Consola:</label>
                                            <input name="console" type="text" class="form-control" id="recipient-consola" required="">
                                            <div class="valid-feedback" id="price-valid-feedback">Correcto</div>
                                            <div class="invalid-feedback" id="price-invalid-feedback">Ingresa una consola</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-descripcion" class="col-form-label">Descripción:</label>
                                            <textarea name="description" class="form-control" id="recipient-descripcion" required=""></textarea>
                                            <div class="valid-feedback" id="desc-valid-feedback">Correcto</div>
                                            <div class="invalid-feedback" id="desc-invalid-feedback">Ingresa una descripción</div>
                                        </div> 
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" name="turista_id" value="<?php echo $_SESSION['turista_id']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <footer class="footer fixed-bottom" style="background-color: #1a1a1a;">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">

            <div class="col-auto ml-auto text-white mb-5 mt-5">
                &copy;<script>
                    document.write(new Date().getFullYear());
                </script>, Hecho con <i class="fa fa-heart heart"></i>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        /*
        **              VALIDACIONES
        */
        //        Variables para inserción
        // Nombre del juego
        var nameInput = document.getElementById('recipient-videojuego');
        var validFeedback = document.getElementById('valid-feedback');
        var invalidFeedback = document.getElementById('invalid-feedback');
        // Precio
        var priceInput = document.getElementById('recipient-precio');
        var priceValidFeedback = document.getElementById('price-valid-feedback');
        var priceInvalidFeedback = document.getElementById('price-invalid-feedback');
        // Precio
        var consoleInput = document.getElementById('recipient-consola');
        var consoleValidFeedback = document.getElementById('console-valid-feedback');
        var consoleInvalidFeedback = document.getElementById('console-invalid-feedback');
        // Descripcion
        var descInput = document.getElementById('recipient-descripcion');
        var descValidFeedback = document.getElementById('desc-valid-feedback');
        var descInvalidFeedback = document.getElementById('desc-invalid-feedback');
        //        Variables para edición
        // Nombre del juego
        var nameInputEdit = document.getElementById('recipient-videojuego-edit');
        var validFeedbackEdit = document.getElementById('valid-feedback-edit');
        var invalidFeedbackEdit = document.getElementById('invalid-feedback-edit');
        // Precio
        var priceInputEdit = document.getElementById('recipient-precio-edit');
        var priceValidFeedbackEdit = document.getElementById('price-valid-feedback-edit');
        var priceInvalidFeedbackEdit = document.getElementById('price-invalid-feedback-edit');
        // Consola
        var consoleInputEdit = document.getElementById('recipient-consola-edit');
        var consoleValidFeedbackEdit = document.getElementById('console-valid-feedback-edit');
        var consoleInvalidFeedbackEdit = document.getElementById('console-invalid-feedback-edit');
        // Descripcion
        var descInputEdit = document.getElementById('recipient-descripcion-edit');
        var descValidFeedbackEdit = document.getElementById('desc-valid-feedback-edit');
        var descInvalidFeedbackEdit = document.getElementById('desc-invalid-feedback-edit');

        function toggleFeedback(){
            let value = $(nameInput).val();

            // Nombre
            if (value.length > 0) {
                $(validFeedback).show();
                $(nameInput).addClass('is-valid');
                $(invalidFeedback).hide();
                $(nameInput).removeClass('is-invalid');
            }else{
                $(validFeedback).hide();
                $(nameInput).removeClass('is-valid');
                $(invalidFeedback).show();
                $(nameInput).addClass('is-invalid');
            }
        }
        function toggleFeedbackEdit(){
            let valueEdit = $(nameInputEdit).val();
            if (valueEdit.length > 0) {
                $(validFeedbackEdit).show();
                $(nameInputEdit).addClass('is-valid');
                $(invalidFeedbackEdit).hide();
                $(nameInputEdit).removeClass('is-invalid');
            }else{
                $(validFeedbackEdit).hide();
                $(nameInputEdit).removeClass('is-valid');
                $(invalidFeedbackEdit).show();
                $(nameInputEdit).addClass('is-invalid');
            }
            
        }
        function priceToggleFeedback(){
            if ($(priceInput).val() > 0) {
                $(priceValidFeedback).show();
                $(priceInput).addClass('is-valid');
                $(priceInvalidFeedback).hide();
                $(priceInput).removeClass('is-invalid');
            }else{
                $(priceValidFeedback).hide();
                $(priceInput).removeClass('is-valid');
                $(priceInvalidFeedback).show();
                $(priceInput).addClass('is-invalid');
            }
        }
        function priceToggleFeedbackEdit(){
            if ($(priceInput).val() > 0) {
                $(priceValidFeedbackEdit).show();
                $(priceInputEdit).addClass('is-valid');
                $(priceInvalidFeedbackEdit).hide();
                $(priceInputEdit).removeClass('is-invalid');
            }else{
                $(priceValidFeedbackEdit).hide();
                $(priceInputEdit).removeClass('is-valid');
                $(priceInvalidFeedbackEdit).show();
                $(priceInputEdit).addClass('is-invalid');
            }
        }
        function consoleToggleFeedback(){
            let valueConsole = $(consoleInput).val();
            if ( valueConsole.length > 0) {
                $(consoleValidFeedback).show();
                $(consoleInput).addClass('is-valid');
                $(consoleInvalidFeedback).hide();
                $(consoleInput).removeClass('is-invalid');
            }else{
                $(consoleValidFeedback).hide();
                $(consoleInput).removeClass('is-valid');
                $(consoleInvalidFeedback).show();
                $(consoleInput).addClass('is-invalid');
            }
        }
        function consoleToggleFeedbackEdit(){
            let valueConsole = $(consoleInput).val();
            if ( valueConsole.length > 0 ) {
                $(priceValidFeedbackEdit).show();
                $(priceInputEdit).addClass('is-valid');
                $(priceInvalidFeedbackEdit).hide();
                $(priceInputEdit).removeClass('is-invalid');
            }else{
                $(priceValidFeedbackEdit).hide();
                $(priceInputEdit).removeClass('is-valid');
                $(priceInvalidFeedbackEdit).show();
                $(priceInputEdit).addClass('is-invalid');
            }
            
        }
        function descToggleFeedback(){
            let valueDesc = $(descInput).val();
            if ( valueDesc.length > 0) {
                $(descValidFeedback).show();
                $(descInput).addClass('is-valid');
                $(descInvalidFeedback).hide();
                $(descInput).removeClass('is-invalid');
            }else{
                $(descValidFeedback).hide();
                $(descInput).removeClass('is-valid');
                $(descInvalidFeedback).show();
                $(descInput).addClass('is-invalid');
            }
        }
        function descToggleFeedbackEdit(){
            let valueDesc = $(descInput).val();
            if ( valueDesc.length > 0 ) {
                $(descValidFeedbackEdit).show();
                $(descInputEdit).addClass('is-valid');
                $(descInvalidFeedbackEdit).hide();
                $(descInputEdit).removeClass('is-invalid');
            }else{
                $(descValidFeedbackEdit).hide();
                $(descInputEdit).removeClass('is-valid');
                $(descInvalidFeedbackEdit).show();
                $(descInputEdit).addClass('is-invalid');
            }
            
        }
        function inicializarComponentes(){
            // Nombre videojuego
            $(validFeedback).hide();
            $(invalidFeedback).hide();
            $(validFeedbackEdit).show();
            $(invalidFeedbackEdit).hide();
            // Precio
            $(priceValidFeedback).hide();
            $(priceInvalidFeedback).hide();
            $(priceValidFeedbackEdit).show();
            $(priceInvalidFeedbackEdit).hide();
            // Consola
            $(consoleValidFeedback).hide();
            $(consoleInvalidFeedback).hide();
            $(consoleValidFeedbackEdit).show();
            $(consoleInvalidFeedbackEdit).hide();
            // Descripción
            $(descValidFeedback).hide();
            $(descInvalidFeedback).hide();
            $(descValidFeedbackEdit).show();
            $(descInvalidFeedbackEdit).hide();
        }
        function agregarEventos(){
            nameInput.addEventListener('change', function () {
                toggleFeedback();
            });
            priceInput.addEventListener('change', function () {
                priceToggleFeedback();
            });
            consoleInput.addEventListener('change', function () {
                consoleToggleFeedback();
            });
            descInput.addEventListener('change', function () {
                descToggleFeedback();
            });
            nameInputEdit.addEventListener('change', function() {
                toggleFeedbackEdit();
            });
            priceInputEdit.addEventListener('change', function () {
                priceToggleFeedbackEdit();
            });
            consoleInputEdit.addEventListener('change', function () {
                consoleToggleFeedbackEdit();
            });
            descInputEdit.addEventListener('change', function () {
                descToggleFeedbackEdit();
            });
        }

        $(document).ready(function(){
            inicializarComponentes();
            agregarEventos();
        });
    </script>   
</body>
</html>