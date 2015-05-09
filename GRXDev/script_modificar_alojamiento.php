<?php 
if((isset($_GET['ID_Alojamiento'])))
{
    $id_alojamiento = $_GET['ID_Alojamiento'];
    if(isset($_POST['add_nombre']) && isset($_POST['add_direccion']) && isset($_POST['add_tipo']) && isset($_POST['add_descripcion']) && isset($_COOKIE['id_usuario']))
    {
        include 'conexionBD.php';
        $cadena = "UPDATE alojamiento SET Nombre='".$_POST['add_nombre']."',Direccion='".$_POST['add_direccion']."',Descripcion='".$_POST['add_descripcion']."',Tipo_alojamiento='".$_POST['add_tipo']."' WHERE ID='".$id_alojamiento."'";
        $res=$datos->Query($cadena);
        //Hago una consulta de todas las caracteristicas
        $del=$datos->Query("DELETE FROM caracteristicasalojamiento WHERE ID_Alojamiento=".$id_alojamiento);
        if($del)//si se ha borrado las antiguas caracteristicas
        {
            $result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='0'");

            $caracteristicas=array();
            while($fila=mysql_fetch_array($result)){
                //echo '  Post:   '.$_POST[$fila['Descripcion']];
                if(isset($_POST[$fila['ID_Caracteristicas']])){
                    //echo '  Post:   '.$_POST[$fila['Descripcion']];
                    $nombreCarac=$fila['ID_Caracteristicas'];
                    $valorCarac=$_POST[$nombreCarac];
                    if($fila['Tipo_check']==1)
                    {
                        $insert=$datos->Query("INSERT INTO caracteristicasalojamiento (ID_Caracteristicas, ID_Alojamiento, Cantidad) VALUES ('$nombreCarac','$id_alojamiento','1')");
                    }
                    else
                    {
                    $insert=$datos->Query("INSERT INTO caracteristicasalojamiento (ID_Caracteristicas, ID_Alojamiento, Cantidad) VALUES ('$nombreCarac','$id_alojamiento','$valorCarac')");
                    }
                    if(!$insert)
                    {
                        echo 'NO Insertado: '.$nombreCarac.' '.$valorCarac.' <br>';
                    }
                }
            }
            header( 'refresh:5;url=index.php?cat=gestion_alojamientos' );
        }
    }
    else
    {
        echo "Error obteniendo los valores del formulario";
        header( 'refresh:5;url=index.php?cat=gestion_alojamientos' );
    }
}
else
{
    echo "No se puede obtener el ID de alojamiento";
    header( 'refresh:5;url=index.php?cat=gestion_alojamientos' );
}

