<?php
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = "home";

    include "config.php";
  }
?>
<!DOCTYPE html>
<html lang="cz" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- PURE CSS, nastylovat formulář přes class -->
    <title>Kalivoda projekt</title>
  </head>
  <body>
    <h1>Odkazový systém</h1>
    <nav>
      <a href="index.php?page=home">Home</a>
      <a href="index.php?page=statistika">Statistika</a>
    </nav>

    <aside>
      <h2>Registrace</h2>
      <form class="pure-form pure-form-stacked" action="index.php" method="post">
        <input type="text" name="uname" placeholder="Jméno"><br>
        <input type="password" name="pwd" placeholder="Heslo"><br>
        <button class="pure-button pure-button-primary" type="submit">Registrace</button>

        <?php
          if (!empty($_POST["pwd"]) AND !empty($_POST["uname"])) {
            $jmeno = $_POST["uname"];
            $heslo = md5($_POST["pwd"]);
            $result = mysqli_query($conn,"SELECT jmeno FROM uzivatel WHERE jmeno = '$jmeno'");

            if (mysqli_num_rows($result) == 0) { //uživatel neexistuje
              mysqli_query($conn,"INSERT INTO uzivatel(jmeno, heslo, pocet_odkazu) VALUES ('$jmeno', '$heslo', '0')");
              header("Location: redirect.php");
            } else { //uživatel existuje
              $result = mysqli_query($conn,"SELECT heslo FROM uzivatel WHERE jmeno = '$jmeno'");
              $result = mysqli_fetch_array($result);
              if ($result["heslo"] == null) { //uživatel nemá heslo
                mysqli_query($conn,"UPDATE uzivatel SET heslo = '$heslo' WHERE jmeno = '$jmeno'");
                header("Location: redirect.php");
              } else {
                echo "Uživatel již je zaregistrován";
              }
            }
          } else {
            echo "Zadejte údaje";
          }
        ?>
      </form>
    </aside>
    <main>
      <?php
        switch ($page) {
          case "home":
            include "home.php";
            break;
          case "statistika":
            include "statistika.php";
            break;
          default:
            include "home.php";
            break;
        }
      ?>
    </main>
  </body>
</html>
