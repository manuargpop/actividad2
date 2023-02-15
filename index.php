

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ejercicio web 2</title>
  </head>
  <body>
    <h1>form</h1>

    <form action="" method="post">

      <label for="cedula">Cedula de identidad:</label><br>
      <input type="input" name="cedula" id="cedulaid"><br><br>

      <label for="name">nombre:</label><br>
      <input type="input" name="name" id="nombreid"><br><br>
      
      <label for="mate">nota de matematica:</label><br>
      <input type="number" name="mate" id="mateid"><br><br>

      <label for="fisica">nota de fisica:</label><br>
      <input type="number" name="fisica" id="fisicaid"><br><br>

      <label for="prog">nota de programacion:</label><br>
      <input type="number" name="prog" id="progid"><br><br>

      <button type="submit">enviar</button>

    </form>
  </body>
</html>

<?php 

if (isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['cedula']) && $_POST['cedula'] != "" && isset($_POST['mate']) && $_POST['mate'] != "" && $_POST['mate'] >=0 && $_POST['mate'] <=20 && isset($_POST['fisica']) && $_POST['fisica'] != "" && $_POST['fisica'] >=0 && $_POST['fisica'] <=20 && isset($_POST['prog']) && $_POST['prog'] != "" && $_POST['prog'] >=0 && $_POST['prog'] <=20 ) 
{
  session_start();
  
  $name = $_POST['name'];
  $cedula = (int) $_POST['cedula'];
  $mate = (int) $_POST['mate'];
  $fisica = (int) $_POST['fisica'];
  $prog = (int) $_POST['prog'];

  //promedios
  if (!isset($_SESSION['cantidad'])) 
  {
    $_SESSION['cantidad'] = 0;
  } 
  if (!isset($_SESSION['mateprom'])) 
  {
    $_SESSION['matprom'] = 0;
  } 
  if (!isset($_SESSION['matetotal'])) 
  {
    $_SESSION['matetotal'] = 0;
  }
  if (!isset($_SESSION['fisicaprom'])) 
  {
    $_SESSION['fisicaprom'] = 0;
  } 
  if (!isset($_SESSION['fisicatotal'])) 
  {
    $_SESSION['fisicatotal'] = 0;
  }
  if (!isset($_SESSION['progprom'])) 
  {
    $_SESSION['progprom'] = 0;
  } 
  if (!isset($_SESSION['progtotal'])) 
  {
    $_SESSION['progtotal'] = 0;
  }
  //aprobados
  if (!isset($_SESSION['mateaprob'])) 
  {
    $_SESSION['mateaprob'] = 0;
  }
  if (!isset($_SESSION['fisicaaprob'])) 
  {
    $_SESSION['fisicaaprob'] = 0;
  }
  if (!isset($_SESSION['progaprob'])) 
  {
    $_SESSION['progaprob'] = 0;
  }
  //raspados
  if (!isset($_SESSION['materas'])) 
  {
    $_SESSION['materas'] = 0;
  }
  if (!isset($_SESSION['fisicaras'])) 
  {
    $_SESSION['fisicaras'] = 0;
  }
  if (!isset($_SESSION['progras'])) 
  {
    $_SESSION['progras'] = 0;
  }
  //ace
  if (!isset($_SESSION['ace'])) 
  {
    $_SESSION['ace'] = 0;
  }
  //una y dos
  if (!isset($_SESSION['one'])) 
  {
    $_SESSION['one'] = 0;
  }
  if (!isset($_SESSION['two'])) 
  {
    $_SESSION['two'] = 0;
  }
  //best cada
  if (!isset($_SESSION['matemax'])) 
  {
    $_SESSION['matemax'] = 0;
  }
  if (!isset($_SESSION['fisicamax'])) 
  {
    $_SESSION['fisicamax'] = 0;
  }
  if (!isset($_SESSION['progmax'])) 
  {
    $_SESSION['progmax'] = 0;
  }
//sacar promedio
  $_SESSION['cantidad']++;

  $_SESSION['matetotal'] += (int) $mate;

  $_SESSION['mateprom'] = (int) $_SESSION['matetotal'] / $_SESSION['cantidad'];

  $_SESSION['fisicatotal'] += (int) $fisica;

  $_SESSION['fisicaprom'] = (int) $_SESSION['fisicatotal'] / $_SESSION['cantidad'];

  $_SESSION['progtotal'] += (int) $prog;

  $_SESSION['progprom'] = (int) $_SESSION['progtotal'] / $_SESSION['cantidad'];
  //sacar aprovados

  if ($mate >= "10") 
  {
    $_SESSION['mateaprob']++;
  }
  if ($fisica >= "10") 
  {
    $_SESSION['fisicaaprob']++;
  }
  if ($prog >= "10") 
  {
    $_SESSION['progaprob']++;
  }
  //raspados
  if ($mate <= "9") 
  {
    $_SESSION['materas']++;
  }
  if ($fisica <= "9") 
  {
    $_SESSION['fisicaras']++;
  }
  if ($prog <= "9") 
  {
    $_SESSION['progras']++;
  }
  //ace time
  if ($mate >= "10" && $fisica >= "10" && $prog >= "10")
  {
    $_SESSION['ace']++;
  }
  //one
  if ($mate >= "10" && $fisica <= "9" && $prog <= "9")
  {
    $_SESSION['one']++;
  }
  elseif($mate <= "9" && $fisica >= "10" && $prog <= "9")
  {
    $_SESSION['one']++;
  }
  elseif($mate <= "9" && $fisica <= "9" && $prog >= "10")
  {
    $_SESSION['one']++;
  }
  //two
  if ($mate >= "10" && $fisica >= "10" && $prog <= "9")
  {
    $_SESSION['two']++;
  }
  elseif($mate <= "9" && $fisica >= "10" && $prog >= "10")
  {
    $_SESSION['two']++;
  }
  elseif($mate >= "10" && $fisica <= "9" && $prog >= "10")
  {
    $_SESSION['two']++;
  }
  //maxima
  if($mate > $_SESSION['matemax'])
  {
    $_SESSION['matemax'] = $mate;
  }
  if($fisica > $_SESSION['fisicamax'])
  {
    $_SESSION['fisicamax'] = $fisica;
  }
  if($prog > $_SESSION['progmax'])
  {
    $_SESSION['progmax'] = $prog;
  }

echo  
"<br>" . "nota promedio de matematica es: " . $_SESSION['mateprom'] .
"<br>" . "nota promedio de fisica es: " . $_SESSION['fisicaprom'] .
"<br>" . "nota promedio de programacion es: " . $_SESSION['progprom'] .

"<br>" . "en matematicas aprobron: " . $_SESSION['mateaprob'] .
"<br>" . "en fisica aprobron: " . $_SESSION['fisicaaprob'] .
"<br>" . "en programacion aprobron: " . $_SESSION['progaprob'] .

"<br>" . "en matematicas rasparon: " . $_SESSION['materas'] .
"<br>" . "en fisica rasparon: " . $_SESSION['fisicaras'] .
"<br>" . "en programacion rasparon: " . $_SESSION['progras'] .

"<br>" . "en total pasaron todas las materias: " . $_SESSION['ace'] .

"<br>" . "en total pasaron solo 1 materia: " . $_SESSION['one'] .

"<br>" . "en total pasaron solo 2 materias: " . $_SESSION['two'] .

"<br>" . "la mejor nota de matematicas fue: " . $_SESSION['matemax'] .
"<br>" . "la mejor nota de fisica fue: " . $_SESSION['fisicamax'] .
"<br>" . "la mejor nota de programacion fue: " . $_SESSION['progmax'] ;
//session_destroy();
}
?>