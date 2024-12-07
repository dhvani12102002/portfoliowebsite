<?php
require_once('config.php');
?>
<html>
<?php include_once("includes/head.php"); ?>
    <body>
    <?php include_once("includes/header.php");?>

    <!--head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Optional: Add some spacing between form elements */
        .mb-3 {
            margin-bottom: 15px;
        }

        </style>
    </head-->
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