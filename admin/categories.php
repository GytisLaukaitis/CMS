<?php require_once ('./includes/header.php'); ?>

<!-- Header -->
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once ('./includes/nav.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Author</small>
                        </h1>
                    </div>
                    <!-- Add new category -->
                    <div class="col-lg-6">

                    <?php
                        if(isset($_POST['btn_category'])) {

                            if ($_POST['category'] == "") {
                                echo '<p class="allert allert-danger"> Please enter category </p>';
                            } else {
                            $Add_Cat = $_POST['category'];
                            $query = "insert into categories (cat_title) values ('$Add_Cat')";
                            mysqli_query($con,$query);
                            }
                        }
                    ?>
                    <!-- Add new category -->
                        <form action="" method="POST">
                        <label> Add New Category </label>
                        <input type="text" name="category" placeholder="Category" class="form-control mb-2">
                        <button class="btn btn-succes" type="submit" name="btn_category"> Add Category </button>
                        </form>

                        <!-- Edit category -->
                        <?php
                        if (isset($_GET['edit'])) {

                            $Edit_id = $_GET['edit'];
                            $sql = "select * from categories where cat_id = '$Edit_id'";
                            $result = mysqli_query($con,$sql);
                            $data = mysqli_fetch_assoc($result);
                            ?>
                            <form action="update.php" method="POST">
                        <div class="form group">
                        <label> Edit Category </label>
                        <input type="text" name="edit_category" placeholder="Category" value="<?php echo $data['cat_title']; ?>" class="form-control mb-2">
                        <input type="hidden" name="edit_id" value="<?php echo $data['cat_id']; ?>">
                        </div>
                        <div class="form group">
                        <button class="btn btn-succes" type="submit" name="btn_edit_category"> Edit Category </button>
                        </div>
                        </form>
                            <?php
                        }

                        ?>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 20%"> Category ID </th>
                                <th style="width: 50%"> Category Name </th>
                                <th style="width: 30%" colspan="2"> Operations </th>
                            </tr>
                            <tr>
                            <?php
                                
                                $sql = "select * from categories ";
                                $result = mysqli_query($con,$sql);

                                while($row = mysqli_fetch_assoc($result)) {
                     
                            ?>
                                <td><?php echo $row['cat_id']; ?></td>
                                <td><?php echo $row['cat_title']; ?></td>
                                <td><a href="categories.php?Del=<?php echo $row['cat_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
                                <td><a href="categories.php?edit=<?php echo $row['cat_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                            </tr>
                            <?php
                                }

                                // Delete the record
                                if(isset($_GET['Del'])) {
                                    $Del = $_GET['Del'];
                                    $sql = "delete from categories where cat_id='$Del'";
                                    $result = mysqli_query($con,$sql);

                                    if ($result) {
                                        header("location: categories.php");
                                    }
                                }
                                ?>
                        </table>
                    </div>
                </div>
          <!-- Footer -->
          </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

          <?php require_once ('./includes/footer.php') ?>
