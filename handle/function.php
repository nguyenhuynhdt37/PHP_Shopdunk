<?php
function SELECT_PRODUCT($id1, $conn, $dxa)
{
    $sql = "SELECT p.id, p.title, p.thumbnail, mz.name, m.discount, m.price 
    FROM product p 
    INNER JOIN category c ON c.id = p.category_id
    INNER JOIN memory_options m ON m.product_id = p.id
    INNER JOIN memory mz ON mz.id = m.memory_id
    WHERE p.category_id = '$id1'
    GROUP BY p.id";


    $result = mysqli_query($conn, $sql);
    $count = 0;

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            if ($count < $dxa) {
                $count++;
                $x = (($row['price'] - $row['discount']) / $row['price']) * 100;
?>
                <div class="product__box col-6 col-md-4 col-lg-3 text-center ">
                    <a class="link-sp text-decoration-none text-dark" href="index.php?page_layout=product_details&id=<?= $row['id'] ?>">
                        <div class="box-x text-start bg-white p-4 mb-4" style="border-radius: 1rem;">
                            <img src="<?= $row['thumbnail'] ?>" class="img3" style="width: 90%">
                            <div class="img-new container-fluid">
                                <h3 class=" product__name--memory mb-5 fw-bold" style="font-size: 1.9rem;"><?= $row['title'] . ' ' . $row['name'] ?></h3>

                                <span class="price price-all mb-2 fs-3 text-secondary ">
                                    <span class="price actual-price fw-bold fs-3 me-1"><?= number_format($row['discount']) ?>₫</span>
                                    <span class="price old-price fs-3 fw-normal me-1 text-decoration-line-through"><?= number_format($row['price']) ?>₫</span>
                                    <span class="price-ratio-container fs-4 fw-normal">-<?= (int)$x; ?>%</span>

                                </span>
                            </div>
                        </div>
                    </a>
                </div>
<?php
            } else {
                break;
            }
        }
    }
}
?>