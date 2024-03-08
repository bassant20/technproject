<!DOCTYPE html>
<?php

use App\Models\Product;

require_once('pclasses.php')
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>

    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">

        </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
            </div>
        </div>
    </header></br>
    <!-- Section-->
    <div>
    <form action="" method="GET">
            <div class="card">
                <div class="container">
                    <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                    <label for="">Rating</label>
                    <input type="text" name="rate" value="<?php if(isset($_GET['rate'])){echo $_GET["rate"];}?>">
                </div>
            </div>
        </form>
        <form action="" method="GET">
            <div class="card">
                <div class="container">
                    <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                    <label for="">Max Price</label>
                    <input type="text" name="max_price" value="<?php if(isset($_GET['max_price'])){echo $_GET["max_price"];} else{echo "200";}?>">
                </div>
            </div>
        </form>
        <form action="" method="GET">
            <div>
                <div class="container">
                    <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                    <?php
                    $options = new Options();
                    $option2 = $options->option2();
                    if ($option2) {
                    ?>
                        <h4>Color</h4>
                        <?php
                        $color = null;
                        foreach ($option2 as $row) {

                            $color = explode(",", $row);
                        }
                        foreach ($color as $row1) {
                            $checked = [];
                            if (isset($_GET['product1'])) {
                                $checked = $_GET['product1'];
                            } ?>
                            <input type="checkbox" name="product1[]" value="<?= $row1; ?>" <?php
                                                                                            if (in_array($row1, $checked)) {
                                                                                                echo "checked ";
                                                                                            }
                                                                                            ?> />
                    <?php
                            echo $row1 . '<br>';
                        }
                    }
                    ?>
                    <?php
                    $options = new Options();
                    $option1 = $options->option1();
                    if ($option1) {
                    ?>
                        <h4>Size</h4>
                        <?php
                        $size = null;
                        foreach ($option1 as $row) {

                            $size = explode(",", $row);
                        }
                        foreach ($size as $row1) {
                            $checked = [];
                            if (isset($_GET['product'])) {
                                $checked = $_GET['product'];
                            } ?>
                            <input type="checkbox" name="product[]" value="<?= $row1; ?>" <?php
                                                                                            if (in_array($row1, $checked)) {
                                                                                                echo "checked ";
                                                                                            }
                                                                                            ?> />
                    <?php
                            echo $row1 . '<br>';
                        }
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
    <?php
    if(isset($_GET['rate']) ){ ?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    $products = new Products();
                    $dvariant = new Variants();
                    $result = $products->products1($_GET['rate']);
                    if ($result) {
                        foreach ($result as $row) {
                            $result1 = $dvariant->variant($row['id']);
                            if ($result1) {
                                foreach ($result1 as $row1) {

                    ?>
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Sale badge-->
                                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">

                                            </div>
                                            <!-- Product image-->
                                            <img class="card-img-top" src="css/tshirt.jpg" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">

                                                        <?php echo $row['title']; ?></h5>

                                                    <!-- Product price-->
                                                    <h6>
                                                        <?php echo $row1['price']; ?></h6>
                                                    <h6>
                                                        <?php echo $row1['option1'] . ',' . $row1['option2']; ?></h6>


                                                    <?php

                                                    if ($row1['is_in_stock'] == 1) {
                                                        echo "InStock";
                                                    }
                                                    ?>
                                                </div>

                                            </div>


                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                                <div class="text-center">
                                                    <?php echo 'Only ' . $row1['stock'] . ' is left'; ?></br>
                                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                    <?php
                                }
                            } else {
                                echo "error";
                            }
                        }
                    } else {
                        echo "error";
                    }

                    ?>
                </div>
            </div>
        </section>
    <?php } 
    
else if(isset($_GET['max_price'])){?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    $products = new Products();
                    $dvariant = new Variants();
                    $result = $products->products();
                            $result1 = $dvariant->variant3($_GET['max_price']);
                            if ($result1) {
                                foreach ($result1 as $row1) {

                    ?>
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Sale badge-->
                                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">

                                            </div>
                                            <!-- Product image-->
                                            <img class="card-img-top" src="css/tshirt.jpg" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">

                                                        <?php echo $row1['title']; ?></h5>

                                                    <!-- Product price-->
                                                    <h6>
                                                        <?php echo $row1['price']; ?></h6>
                                                    <h6>
                                                        <?php echo $row1['option1'] . ',' . $row1['option2']; ?></h6>


                                                    <?php

                                                    if ($row1['is_in_stock'] == 1) {
                                                        echo "InStock";
                                                    }
                                                    ?>
                                                </div>

                                            </div>


                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                                <div class="text-center">
                                                    <?php echo 'Only ' . $row1['stock'] . ' is left'; ?></br>
                                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                    <?php
                                }
                            } else {
                                echo "error";
                            }
                        
                   
                    ?>
                </div>
            </div>
        </section><?php
    }
    else if (isset($_GET['product1'])) { ?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"><?php
                                                                                                            $branchecked = [];
                                                                                                            $branchecked = $_GET['product1'];
                                                                                                            foreach ($branchecked as $rowcolor) {

                                                                                                            ?>

                        <?php
                                                                                                                $products = new Products();
                                                                                                                $dvariant = new Variants();
                                                                                                                $result1 = $dvariant->variant2($rowcolor);
                                                                                                                if ($result1) {
                                                                                                                    foreach ($result1 as $row1) {


                        ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Sale badge-->
                                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">

                                        </div>
                                        <!-- Product image-->
                                        <img class="card-img-top" src="css/tshirt.jpg" alt="..." />
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">

                                                    <?php echo $row1['title']; ?></h5>

                                                <!-- Product price-->
                                                <h6>
                                                    <?php echo $row1['price']; ?></h6>
                                                <h6>
                                                    <?php echo $row1['option1'] . ',' . $row1['option2']; ?></h6>


                                                <?php

                                                                                                                        if ($row1['is_in_stock'] == 1) {
                                                                                                                            echo "InStock";
                                                                                                                        }
                                                ?>
                                            </div>

                                        </div>


                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                            <div class="text-center">
                                                <?php echo 'Only ' . $row1['stock'] . ' is left'; ?></br>
                                                <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                    <?php
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    echo "error";
                                                                                                                }
                                                                                                            } ?>
                </div>
            </div>
        </section><?php
                }
             else if(isset($_GET['product'])) { ?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"><?php
                                                                                                            $branchecked = [];
                                                                                                            $branchecked = $_GET['product'];
                                                                                                            foreach ($branchecked as $rowsize) {

                                                                                                            ?>

                        <?php
                                                                                                                $products = new Products();
                                                                                                                $dvariant = new Variants();
                                                                                                                $result1 = $dvariant->variant1($rowsize);
                                                                                                                if ($result1) {
                                                                                                                    foreach ($result1 as $row1) {


                        ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Sale badge-->
                                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">

                                        </div>
                                        <!-- Product image-->
                                        <img class="card-img-top" src="css/tshirt.jpg" alt="..." />
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">

                                                    <?php echo $row1['title']; ?></h5>

                                                <!-- Product price-->
                                                <h6>
                                                    <?php echo $row1['price']; ?></h6>
                                                <h6>
                                                    <?php echo $row1['option1'] . ',' . $row1['option2']; ?></h6>


                                                <?php

                                                                                                                        if ($row1['is_in_stock'] == 1) {
                                                                                                                            echo "InStock";
                                                                                                                        }
                                                ?>
                                            </div>

                                        </div>


                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                            <div class="text-center">
                                                <?php echo 'Only ' . $row1['stock'] . ' is left'; ?></br>
                                                <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                    <?php
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    echo "error";
                                                                                                                }
                                                                                                            } ?>
                </div>
            </div>
        </section><?php
                } else { ?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    $products = new Products();
                    $dvariant = new Variants();
                    $result = $products->products();
                    if ($result) {
                        foreach ($result as $row) {
                            $result1 = $dvariant->variant($row['id']);
                            if ($result1) {
                                foreach ($result1 as $row1) {

                    ?>
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Sale badge-->
                                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">

                                            </div>
                                            <!-- Product image-->
                                            <img class="card-img-top" src="css/tshirt.jpg" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">

                                                        <?php echo $row['title']; ?></h5>

                                                    <!-- Product price-->
                                                    <h6>
                                                        <?php echo $row1['price']; ?></h6>
                                                    <h6>
                                                        <?php echo $row1['option1'] . ',' . $row1['option2']; ?></h6>


                                                    <?php

                                                    if ($row1['is_in_stock'] == 1) {
                                                        echo "InStock";
                                                    }
                                                    ?>
                                                </div>

                                            </div>


                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                                <div class="text-center">
                                                    <?php echo 'Only ' . $row1['stock'] . ' is left'; ?></br>
                                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                    <?php
                                }
                            } else {
                                echo "error";
                            }
                        }
                    } else {
                        echo "error";
                    }

                    ?>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>