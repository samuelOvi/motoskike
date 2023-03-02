<?php
    /*componentes*/ 
      use component\initcomponents as initcomponents;
      use component\menuLateral as menuLateral;
      $VarComp = new initcomponents();
      $VarNav = new menuLateral();

      /*modelo*/
        use modelo\marca as marca;
        $objModel = new marca();
        if(!isset($_SESSION['rol'])){    
          die('<script> window.location = "?url=login" </script>');
        }
    $mostrarMarcas = $objModel->mostrarmarcaAjax();

    if(isset($_POST['accion'])){
      if ($_POST['accion'] == 'registrar') {
        $resultado = $objModel->getRegistrarMarca($_POST['marca']);
        if($resultado== true)
          echo 'Registro Exitoso';
        else
          echo 'Registro Fallido';
        return 0;
      }
      else
      if ($_POST['accion'] == 'editar') {
        $resultado = $objModel->selectItem($_POST['id_marca']);
        foreach ($resultado as $valor) {
                echo json_encode([
                    'id' => $valor[0],
                    'nombre' => $valor[1],
                ]);
            }
            return 0;
      }
      else
      if ($_POST['accion'] == 'modificar') {
        $resultado = $objModel->editarMarca($_POST['nombre_marca'], $_POST['id_marca']);
        if($resultado==true){
          echo 'Modificacion exitosa';
        }
        else
          echo 'Modificacion fallida';
        return 0;
      }
    }

    if(isset($_POST['select'])){
      $objModel->getItem($_POST['id']);
    }

    if(isset($_POST['marcaEdit'])){

      $objModel->getEditar($_POST['marcaEdit']);

    }

    if(isset($_POST['eliminar'])){
      $objModel->getEliminar($_POST['id']);
    }
    
   if(file_exists("vista/marca.php")){
        require_once("vista/marca.php");
   }else{
   	    die("<script>window.location=`?url=registro`</script>");
   }
?>