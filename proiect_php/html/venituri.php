<?php
$suma_venituri = 0;
if (count($values) > 0) {
    $suma_venituri = 0;
?>
    <?php foreach ($values as $product) { ?>
        <div class="income__list">
            <div class="item clearfix" id="income-0">
                <div class="item__description"><?php echo $product['title'] ?></div>
                <div class="right clearfix">
                    <div class="item__value">+ <?php echo $product['value'] ?></div>
                    <div class="item__delete">
                        <a href="delete_venituri.php?id=<?php echo $product['id'] ?>" class="item__delete--btn"><i class="ion-ios-close-outline"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        $suma_venituri += $product['value'];
    } ?>
<?php }
if ($suma_venituri != 0)
    $_SESSION['suma_venituri'] = (int) $suma_venituri;
$_SESSION['suma_venituri'] = strval($suma_venituri);
