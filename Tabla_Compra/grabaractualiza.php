<?php
   /*  Este software se hizo para el resultado de aprendizaje CRUD 
   Elaboro:  Víctor J. Rodríguez P.
   Para que entiendan como se actualiza, borra, inserta, en una base de datos en Xampp 
   Se deben tener concentos claros ya de Php, mysql, html, css, java script  */
	   
	include(".\conexion.php");
	$accion=$_POST["Accion"];
 //   $Codigop=$_GET['codigo'];
	if(isset($accion))
	{
		if($accion=="Update")
		{
			//echo"Enviado desde actualizaci�n";
			$query="UPDATE compra
					SET	com_fecha_expedicion = '".$_POST['txtfechexp']."',                                                                                          
						com_fecha_vencimiento = '".$_POST['txtfechven']."',
						com_cantidad_pro = '".$_POST['txtcantidad']."',
						com_referencia_pro = '".$_POST['txtreferencia']."',
						com_unitario_pro = '".$_POST['txtunitario']."',
						com_valor_total_pro = '".$_POST['txtvalortotal']."'
						WHERE id_compra = '".$_POST['txtidcompra']."'";
				
			$result=mysqli_query($link,$query) or die ("Error en la actualizacion de los datos. Error: ".mysqli_error());
			echo "<script>
					alert('Los datos fueron actualizados correctamente');
					location.href='../indexCOM.html';
					</script>";
		}
		else
		{
			
			//echo "El codigo es $Numerop ";
			//echo "El codigo es $Codigop ";
			//echo"Enviado desde eliminacion";
			$query="DELETE 
					FROM compra
					WHERE id_compra = '".$_POST['txtidcompra']."'";
			$result=mysqli_query($link,$query) or die ("Error en el borrado de los datos. Error: ".mysqli_error());
			echo "<script>
					alert('Los datos fueron borrados correctamente');
					location.href='../indexCOM.html';
					</script>";
		}
	}
?>