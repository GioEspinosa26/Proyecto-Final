<!DOCTYPE HTML>
<html>

<head>
    <title>Calzado Veloz AG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--ESTO ES PARA AGREGAR ICONOS EN NUESTRA PAGINA QUE SERA VISIBLE EN LA PARTE DE ARRIBA-->
    <link rel="icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-md-9">
                            <div id="colorlib-logo"><a href="index.html">Calzado Veloz </a></div>
                        </div>
                        <div class="col-sm-5 col-md-3">
                            <form action="#" class="search-wrap">
                                <div class="form-group">
                                    <input type="search" class="form-control search" placeholder="Search">
                                    <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-left menu-1">
                            <ul>
                                <li class="active"><a href="index_admin.html">INICIO</a></li>
                                <li class="has-dropdown">
                                    <a href="men_admin.html">CABALLEROS</a>
                                    <ul class="dropdown">
                                        <li><a href="product-detail_admin.html">Detalles del producto</a></li>
                                        <li><a href="cart_admin.html">Carrito</a></li>
                                        <li><a href="checkout_admin.html">Caja</a></li>
                                        <li><a href="order-complete_admin.html">Pedido Completado</a></li>
                                        <li><a href="add-to-wishlist_admin.html">Lista de Deseos</a></li>
                                    </ul>
                                </li>
                                <li><a href="women_admin.html">DAMAS</a></li>
                                <li><a href="about_admin.html">ACERCA DE </a></li>
                                <li><a href="contact_admin.html">CONTACTO</a></li>
                                <li class="cart"><a href="cart_admin.html"><i class="icon-shopping-cart"></i> Carrito [3]</a></li>
                                <li><a href="login.php">Iniciar Sesion</a></li>
                                <li><a href="admin.php">Administrador</a></li>
                                <li><a></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sale">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2 text-center">
                            <div class="row">
                                <div class="owl-carousel2">
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="#">NO SE PUEDE MARCAR UN BUEN PASO SIN NUESTROS ZAPATOS</a></h3>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="#">USA LOS MEJORES ZAPATOS ¡SOLO PÍDELOS!</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-left menu-1">
                            <ul>
                                <li class="active"><a href="#">PRODUCTOS</a></li>
                                <li class=""><a href="admin.php">USUARIOS</a></li>
                                <li><a href="comprar.php">COMPRAR</a></li>
                                <li><a></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!--Boton Agregar -->
        <button type="button" class="nvoUsu btn btn-outline-success" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#insertarUsu" style="margin-left:70px">Nuevo</button><br>

        <!--Inicio de la tabla-->
        <table class="table table-striped tblUsu table-hover justify-content-center align-items-center text-center" style="width:70%; margin:0 auto;border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; color:black">
            <tr style="color: black;">
                <th style="color: black;">ID</th>
                <th style="color: black;">Nombre</th>
                <th style="color: black;">Descripcion</th>
                <th style="color: black;">Categoria</th>
                <th style="color: black;">Precio</th>
                <th style="color: black;">Stock</th>
                <th style="color: black;">Opciones</th>
            </tr>

            <?php
            $conexion = mysqli_connect("localhost", "root", "", "calzadoVeloz");
            // //$sql = "SELECT CvUser, mPerson.Nombre as nombre, Login, Contra, FechaIni, FechaFin, EdoCta FROM mUsuario, mPerson 
            // //WHERE mUsuario.CvPerson=mPerson.CvPerson ORDER BY CvUser;";
            $sql = $sql = "SELECT productos.id, productos.nombre, descripcion, categorias.nombre as categoria_id, precio, stock FROM productos, categorias WHERE categorias.id=productos.categoria_id;";
            $result = mysqli_query($conexion, $sql);

            while ($mostrar = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td style="color: black;"><?php echo $mostrar['id']; ?></td>
                    <td style="color: black;"><?php echo $mostrar['nombre']; ?></td>
                    <td style="color: black;"><?php echo $mostrar['descripcion']; ?></td>
                    <td style="color: black;"><?php echo $mostrar['categoria_id']; ?></td>
                    <td style="color: black;"><?php echo $mostrar['precio']; ?></td>
                    <td style="color: black;"><?php echo $mostrar['stock']; ?></td>
                    <td>
                        <a href=" editarProduct.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-success editbtn" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editarUsu">Editar</a><!-- ----data-toggle="modal" data-target="editarUsu""-->
                        <a href="eliminarProduct.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-danger button-red table__item__link">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            mysqli_free_result($result);
            ?>
        </table>
        <!--Fin tabla -->
    </div>
    <!-- Inicio Modal Editar -->
    <div class="modal fade" id="editarUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="editarProduct.php" method="post">
                    <div class="modal-body" style="color: black;">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label for="">Producto: </label>
                            <input type="text" name="producto" id="producto" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion: </label>
                            <input type="text" name="descrip" id="descrip" class="form-control">
                        </div>

                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" name="categoria" id="categoria">
                                <?php
                                include("config/connectionDB.php");
                                // //$sql = "SELECT mPerson.CvPerson as cvUser, mPerson.Nombre as nombre FROM mPerson GROUP BY nombre;";
                                $sql = "SELECT * FROM categorias;";
                                $result = mysqli_query($conexion, $sql);
                                while ($mostrar = mysqli_fetch_assoc($result)) {
                                    $id = $mostrar['id'];
                                    $nombre = $mostrar['nombre'];
                                ?>
                                    <option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Precio:</label>
                            <input type="number" name="precio" id="precio" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Stock:</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin Modal Editar-->

    <!-- Inicio Modal Insertar -->
    <div class="modal fade" id="insertarUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="insertarProduct.php" method="post">
                    <div class="modal-body" style="color: black;">
                        <input type="hidden" name="insert_id" id="insert_id">

                        <div class="form-group">
                            <label for="">Producto: </label>
                            <input type="text" name="producto" id="producto" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion: </label>
                            <input type="text" name="descrip" id="descrip" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" name="categoria" id="categoria">
                                <?php
                                include("config/connectionDB.php");
                                // //$sql = "SELECT mPerson.CvPerson as cvUser, mPerson.Nombre as nombre FROM mPerson GROUP BY nombre;";
                                $sql = "SELECT * FROM categorias;";
                                $result = mysqli_query($conexion, $sql);
                                while ($mostrar = mysqli_fetch_assoc($result)) {
                                    $id = $mostrar['id'];
                                    $nombre = $mostrar['nombre'];
                                ?>
                                    <option value="<?php echo $id ?>"><?php echo $nombre ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Precio:</label>
                            <input type="number" name="precio" id="precio" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Stock:</label>
                            <input type="number" name="stock" id="stock" class="form-control" required>
                        </div>

                        <div class="form-control">
                            <label for="">Imagen del Producto:</label>
                            <input type="file" required></input>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin Modal Insertar-->

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>



    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- popper -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap 4.1 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Date Picker -->
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- Stellar Parallax -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="confirmacionProduct.js"></script>
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editarUsu').modal('show');

                $tr = $(this).closest('tr');
                var datos = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(datos);
                $('#update_id').val(datos[0]);
                $('#producto').val(datos[1]);
                $('#descrip').val(datos[2]);
                $('#categoria').val(datos[3]);
                $('#precio').val(datos[4]);
                $('#stock').val(datos[5]);
            });
        });
    </script>
</body>

</html>