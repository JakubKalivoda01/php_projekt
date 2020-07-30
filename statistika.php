<h2>Top 5 jmen s nejvíce odkazy</h2>
<table>
  <tr>
    <th>Jméno</th>
    <th>Počet odkazů</th>
  </tr>
  <?php
    include "config.php";
    $result = mysqli_query($conn,"SELECT jmeno, pocet_odkazu FROM uzivatel ORDER BY pocet_odkazu DESC LIMIT 5");
    while ($row = mysqli_fetch_array($result)){
      echo "<tr>" . '<td>' . $row["jmeno"] . '</td>';
      echo "<td>" . $row['pocet_odkazu'] . "</td>" . '</tr>';
    }
  ?>
</table>
<h2>Dnes nových odkazů:
  <?php //k tomuhle se vrať
    $time = date("Y-m-d");
    $dnes = 0;
    $result = mysqli_query($conn,"SELECT datum FROM odkaz");
    while ($row = mysqli_fetch_array($result)) {
      $str = substr($row["datum"], 0, 10);
      if ($time == $str) {
        $dnes++;
      }
    }
    echo $dnes;
  ?>
</h2>
<h2>Celkový počet odkazů:
  <?php
    $result = mysqli_query($conn,"SELECT id_odkaz FROM odkaz");
    $num = mysqli_num_rows($result);
    echo "$num";
  ?>
</h2>
<h2>Unikátní jména v systému:
  <?php
    $result = mysqli_query($conn,"SELECT jmeno FROM uzivatel");
    $num = mysqli_num_rows($result);
    echo "$num";
  ?>
</h2>
