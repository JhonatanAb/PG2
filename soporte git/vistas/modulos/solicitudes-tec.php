<?php

 

      $_SESSION["tecnico-solicitud"] = $_POST["usuario"];

      echo '<script>

								window.location = "mostrar-solicitudes-tecnico";

							</script>';
      

?>