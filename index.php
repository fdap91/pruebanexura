
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="author" content="Francis Aguero">
    <title>Prueba Tecnica Nexura</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    
 
  </head>
  <body>
    
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">NEXURA INTERNACIONAL</h5> 
</div>

<div class="container">
  <div class="col-md-12">
      <div class="card mb-4"> 
        
    </div>
  </div>
</div>
 

<div class="container">
  <div class="card-deck mb-3">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Lista de Empleados</h4>
      </div>
      <div class="card-body">
         
         <div class="col-md-12 text-md-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCrearEmpleado"><i class="fa fa-user-plus"></i> Crear</button>
          <br/>
        </div>

         <div class="table-responsive">
          <table class="table">
            <thead>
              <th><i class="fa fa-user"></i> Nombre</th>
              <th>@ Email</th>
              <th><i class="fa fa-venus-mars"></i> Sexo</th>
              <th><i class="fa fa-briefcase"></i> Area</th>
              <th><i class="fa fa-envelope"></i> Boletin</th>
              <th>Modificar</th>
              <th>Eliminar</th>
            </thead>
            <tbody id="Lista_empleados">
              
            </tbody>
          </table>
        </div>



      </div>
    </div>  
  </div>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="img/logo.png" alt="" >
        <small class="d-block mb-3 text-muted">&copy; <?php echo date('Y') ?></small>
      </div>       
    </div>
  </footer>
</div>


    


<!-- Modal -->
<div class="modal fade" id="ModalCrearEmpleado" tabindex="-1" aria-labelledby="ModalCrearEmpleado_label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCrearEmpleado_label">Crear Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
              Los campos con asterisco (*) son obligatorios
            </div>

            <div class="alert " role="alert" id='ModalCrearEmpleado_showalert' style="display:none"> 
            </div>
          </div>

          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalCrearEmpleado_nombrecompleto" class="col-sm-2 col-form-label fw-bold">Nombre Completo *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ModalCrearEmpleado_nombrecompleto" placeholder="Nombre completo del empleado">
              </div>
            </div>

          </div>

          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalCrearEmpleado_correoelectronico" class="col-sm-2 col-form-label fw-bold">Correo Electronico *</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="ModalCrearEmpleado_correoelectronico" placeholder="Correo Electronico">
              </div>
            </div>

          </div>

          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalCrearEmpleado_sexo" class="col-sm-2 col-form-label fw-bold">Sexo *</label>
              <div class="col-sm-10" id='ModalCrearEmpleado_sexo_contenedor'>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ModalCrearEmpleado_sexo" id="ModalCrearEmpleado_sexo_m" value="M">
                  <label class="form-check-label" for="ModalCrearEmpleado_sexo_m">
                    Masculino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ModalCrearEmpleado_sexo" id="ModalCrearEmpleado_sexo_f" value="F">
                  <label class="form-check-label" for="ModalCrearEmpleado_sexo_f">
                    Femenino
                  </label>
                </div>
              </div>
            </div>

          </div>


          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalCrearEmpleado_area" class="col-sm-2 col-form-label fw-bold">Area *</label>
              <div class="col-sm-10">
                <select class="form-control" id="ModalCrearEmpleado_area"></select>
              </div>
            </div>

          </div>


          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalCrearEmpleado_descripcion" class="col-sm-2 col-form-label fw-bold">Descripción *</label>
              <div class="col-sm-10">
                <textarea  class="form-control" id="ModalCrearEmpleado_descripcion" placeholder="Descripcion de la experiencia del empleado"></textarea>
              </div>
            </div>

          </div>


          <div class="col-md-12">
            <div class="mb-3 row">
              <div class="col-sm-10 ">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="ModalCrearEmpleado_boletininformativo">
                  <label class="form-check-label" for="ModalCrearEmpleado_boletininformativo">
                    Deseo recibir boletín informativo
                  </label>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalCrearEmpleado_roles" class="col-sm-2 col-form-label fw-bold">Roles *</label>
              <div class="col-sm-10" id='ModalCrearEmpleado_roles'>
              </div>
            </div>

          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='ModalCrearEmpleado_btnguardar'>Guardar</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="ModalEditarEmpleado" tabindex="-1" aria-labelledby="ModalEditarEmpleado_label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditarEmpleado_label">Crear Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
              Los campos con asterisco (*) son obligatorios
            </div>

            <div class="alert " role="alert" id='ModalEditarEmpleado_showalert' style="display:none"> 
            </div>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" id="ModalEditarEmpleado_idempleado" placeholder="Nombre completo del empleado">
            <div class="mb-3 row">
              <label for="ModalEditarEmpleado_nombrecompleto" class="col-sm-2 col-form-label fw-bold">Nombre Completo *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ModalEditarEmpleado_nombrecompleto" placeholder="Nombre completo del empleado">
              </div>
            </div>

          </div>

          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalEditarEmpleado_correoelectronico" class="col-sm-2 col-form-label fw-bold">Correo Electronico *</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="ModalEditarEmpleado_correoelectronico" placeholder="Correo Electronico">
              </div>
            </div>

          </div>

          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalEditarEmpleado_sexo" class="col-sm-2 col-form-label fw-bold">Sexo *</label>
              <div class="col-sm-10" id='ModalEditarEmpleado_sexo_contenedor'>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ModalEditarEmpleado_sexo" id="ModalEditarEmpleado_sexo_m" value="M">
                  <label class="form-check-label" for="ModalEditarEmpleado_sexo_m">
                    Masculino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ModalEditarEmpleado_sexo" id="ModalEditarEmpleado_sexo_f" value="F">
                  <label class="form-check-label" for="ModalEditarEmpleado_sexo_f">
                    Femenino
                  </label>
                </div>
              </div>
            </div>

          </div>


          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalEditarEmpleado_area" class="col-sm-2 col-form-label fw-bold">Area *</label>
              <div class="col-sm-10">
                <select class="form-control" id="ModalEditarEmpleado_area"></select>
              </div>
            </div>

          </div>


          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalEditarEmpleado_descripcion" class="col-sm-2 col-form-label fw-bold">Descripción *</label>
              <div class="col-sm-10">
                <textarea  class="form-control" id="ModalEditarEmpleado_descripcion" placeholder="Descripcion de la experiencia del empleado"></textarea>
              </div>
            </div>

          </div>


          <div class="col-md-12">
            <div class="mb-3 row">
              <div class="col-sm-10 ">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="ModalEditarEmpleado_boletininformativo">
                  <label class="form-check-label" for="ModalEditarEmpleado_boletininformativo">
                    Deseo recibir boletín informativo
                  </label>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">

            <div class="mb-3 row">
              <label for="ModalEditarEmpleado_roles" class="col-sm-2 col-form-label fw-bold">Roles *</label>
              <div class="col-sm-10" id='ModalEditarEmpleado_roles'>
              </div>
            </div>

          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='ModalEditarEmpleado_btnguardar'>Guardar</button>
      </div>
    </div>
  </div>
</div>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery/jquery-3.6.1.min.js"></script>
  <script type="text/javascript" src="js/functions.js?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="js/index.js?v=<?php echo time(); ?>"></script>
  </body>
</html>
