<?php require_once "includes/db.php"?>

<!-- Header section -->

<?php require_once "includes/header.php"?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php require_once "includes/nav.php"?>
    <!-- Navigation -->
   
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
    
     <?php

    if(isset($_POST['btn_search']))
    {
        $Search = $_POST['search'];
        $sql = "select * from posts where post_tags like '%$Search%'";
        $result = mysqli_query($con,$sql);
    
        if(mysqli_num_rows($result)) {

        while($row = mysqli_fetch_assoc($result)) {

            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_img = $row['post_img'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
        ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?> </p>
                <hr>
                <img class="img-responsive" src="imgs/<?php echo $post_img ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                
                <?php
            }
        }
        else {
            echo "<h2> Record not found </h2>";
        }
    }

        ?>
            </div>

            <!-- Sidebar -->
            <?php require_once "includes/side_bar.php"?>

        <hr>

        <!-- Footer -->
        <?php require_once "includes/footer.php"?>

   
