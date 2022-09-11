<?<php>
//Recibo los datos del formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

echo "Los datos son los siguientes: <br>";
echo "$nombres,$apellidos,$direccion,$telefono,$usuario,$clave";

</php>