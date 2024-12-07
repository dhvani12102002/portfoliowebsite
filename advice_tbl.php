<?php
require_once('config.php');
?>
<html>
    <?php include_once("includes/head.php"); ?>
    <body>
      <?php include_once("includes/header.php");?>
    
    <?php
        if(isset($_GET["deltbladvice_tbl"])){

        $id= $_GET["id"];

        $sql = "delete from advice_tbl where id = :id";
        $params=[":id" =>$id];
        $query = $pdo->prepare($sql);

        $query->execute($params);

        }
      ?>

      <main id="main" class="main">
        <section class="section dashboard">

          <h2>Producttbl Information</h2>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>id</th>
                      <th>content</th>

              </thead>
              <tbody>
                  <?php

                      $sql="select * from advice";

                      $query = $pdo->query($sql);

                      $query->execute();

                      $results  = $query->fetchAll(PDO::FETCH_ASSOC);

                      //print_r($results);

                      foreach($results as $row){
                          $id=$row["id"];
                  ?>
                  <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['content'];?></td>
                      
                      <td><a href='advice_tbl.php?deltbladvice_tbl=true&id=<?php echo $id; ?>'>Delete </a></td>
                  </tr>
                  <?php } ?>
              </tbody>
          </table>
        </section>
      </main>

      <?php include_once("includes/footer.php");?>
    </body>
</html>
