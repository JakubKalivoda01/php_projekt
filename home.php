<form class="pure-form pure-form-stacked odk" action="index.php" method="post">
  <input type="text" name="jmeno" placeholder="Jméno"><br>
  <input type="password" name="heslo" placeholder="Heslo"><br>
  <input type="text" name="odkaz" placeholder="Odkaz"><br>
  <button class="pure-button pure-button-primary" type="submit">Vložit odkaz</button>
</form>
<?php
  if (!empty($_POST["jmeno"]) AND !empty($_POST["odkaz"])) {
    $jmeno = $_POST["jmeno"];
    $odkaz = $_POST["odkaz"];
    $time = date("Y-m-d");
    $time = $time ." " . date("H:i:s");

    $result = mysqli_query($conn,"SELECT jmeno FROM uzivatel WHERE jmeno = '$jmeno'");
    if (mysqli_num_rows($result) == 0){ //pokud jméno není obsazené - uživatel neexistuje
      mysqli_query($conn,"INSERT INTO uzivatel (jmeno, pocet_odkazu) VALUES ('$jmeno','0')");
      $result = mysqli_query($conn,"SELECT id_uzivatel FROM uzivatel WHERE jmeno = '$jmeno'");
      $result = mysqli_fetch_array($result);
      mysqli_query($conn,"INSERT INTO odkaz (id_uzivatel,url,datum) VALUES ('$result[id_uzivatel]','$odkaz','$time')");

      $pocet = mysqli_query($conn,"SELECT pocet_odkazu FROM uzivatel WHERE jmeno = '$jmeno'"); //:)
      $pocet = mysqli_fetch_array($pocet);
      $pocet = $pocet["pocet_odkazu"];
      $pocet = ++$pocet;
      mysqli_query($conn, "UPDATE uzivatel SET pocet_odkazu = '$pocet' WHERE jmeno = '$jmeno'"); //:)

    } else { //uživatel existuje
      $result = mysqli_query($conn,"SELECT heslo FROM uzivatel WHERE jmeno = '$jmeno'");
      $result = mysqli_fetch_array($result);
      if ($result["heslo"] != null) { //pokud je uživatel zaregistrován
        if (!empty($_POST["heslo"])) {  //pokud je heslo zadané
          $heslo = $_POST["heslo"];

          if (md5($heslo) === $result["heslo"]) { //pokud zadané heslo odpovídá
            $result = mysqli_query($conn,"SELECT id_uzivatel FROM uzivatel WHERE jmeno = '$jmeno'");
            $result = mysqli_fetch_array($result);
            mysqli_query($conn,"INSERT INTO odkaz (id_uzivatel,url,datum) VALUES ('$result[id_uzivatel]','$odkaz','$time')");

            $pocet = mysqli_query($conn,"SELECT pocet_odkazu FROM uzivatel WHERE jmeno = '$jmeno'"); //:)
            $pocet = mysqli_fetch_array($pocet);
            $pocet = $pocet["pocet_odkazu"];
            $pocet = ++$pocet;
            mysqli_query($conn, "UPDATE uzivatel SET pocet_odkazu = '$pocet' WHERE jmeno = '$jmeno'"); //:)
          } else {
            echo "Zadané heslo neodpovídá";
          }
        } else {
          echo "zadejte heslo";
        }
      }else { //heslo je null
        $result = mysqli_query($conn,"SELECT id_uzivatel FROM uzivatel WHERE jmeno = '$jmeno'");
        $result = mysqli_fetch_array($result);
        mysqli_query($conn,"INSERT INTO odkaz (id_uzivatel,url,datum) VALUES ('$result[id_uzivatel]','$odkaz','$time')");

        $pocet = mysqli_query($conn,"SELECT pocet_odkazu FROM uzivatel WHERE jmeno = '$jmeno'"); //:)
        $pocet = mysqli_fetch_array($pocet);
        $pocet = $pocet["pocet_odkazu"];
        $pocet = ++$pocet;
        mysqli_query($conn, "UPDATE uzivatel SET pocet_odkazu = '$pocet' WHERE jmeno = '$jmeno'"); //:)
      }

    }

  }
?>
<table>
  <tr>
    <th>Jméno</th>
    <th>Čas</th>
    <th>Odkaz</th>
  </tr>
  <?php
    include "config.php";
    $result = mysqli_query($conn, "SELECT uzivatel.jmeno, odkaz.url, odkaz.datum FROM uzivatel INNER JOIN odkaz ON uzivatel.id_uzivatel = odkaz.id_uzivatel ORDER BY id_odkaz DESC LIMIT 20");
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>" . '<td>' . $row["jmeno"] . '</td>';
      echo "<td>" . $row['datum'] . "</td>";
      echo "<td>" . $row['url'] . "</td>" . '</tr>';
    }
  ?>
</table>
