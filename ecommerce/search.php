<?php
require_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 display-6 text-center py-5">
            Search Results
        </div>
    </div>
    <div class="row" style="min-height: 300px;">
        <?php
        require_once './classes/db.php';
        $search = $_GET['search'];
        $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
        $result = $conn->query($sql);
        $product = $result->fetch_all(MYSQLI_ASSOC);
        ?>
        <?php foreach ($product as $p) : ?>
            <div class="col-md-2">
                <div class="card">
                    <img src="./Assets/images/<?= $p['img'] ?>" class="card-img-top" alt="..." style="height: 160px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title d-inline overflow-hidden w-100" style="text-overflow: ellipsis; white-space: nowrap;"><?= $p['name'] ?></h5>
                        <!-- regular_price -->
                        <div>
                            <span class="card-text text-decoration-line-through text-muted "><?= $p['regular_price'] ?></span>
                            <!-- discount_price -->
                            <span class="card-text"><?= $p['discount_price'] ?></span>
                        </div>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
require_once 'footer.php';
?>