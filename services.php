<?php
require_once('config.php');
?>
<html>
<?php include_once("includes/head.php"); ?>
    <body>
    <?php include_once("includes/header.php");?>

       <main id="main" class="main">
      <section class="section dashboard">

    <div class="container mt-5">
        <h2>Add advice</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <input type="text" class="form-control" id="content" name="content" required>
            </div>
            
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
    <?php
        if(isset($_REQUEST["submit"]))
        {
          
            $content = $_REQUEST["content"];
            $sql = "insert into advice (content) values (:content)";
            $params=[':content'=>$content];
            $query = $pdo->prepare($sql);
        
            
            $query->execute($params);
        
        }
    ?>
    </section>
    </main> 

    </body>

</html>