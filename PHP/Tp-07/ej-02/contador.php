<?php
// Archivo para acumular el numero de visitas
$archivo = "contador.dat";
// Abrir el archivo para lectura
$abrir = fopen($archivo, "a+");
// Leer el contenido del archivo
$cont = fread($abrir, filesize($archivo));
// Cerrar el archivo fclose($abrir); 
// Abrir nuevamente el archivo para escritura
$abrir = fopen($archivo, "w");
// Agregar 1 visita 
$cont = $cont + 1; // Guardar la modificación 
$guardar = fwrite($abrir, $cont);
// Cerrar el archivo 
fclose($abrir);
// Mostrar el total de visitas 
if ($cont == 1) {
  echo "Bienvenido";
  return;
}
echo "<font face='arial' size='3'> Cantidad de visitas:" . $cont . "</font>";