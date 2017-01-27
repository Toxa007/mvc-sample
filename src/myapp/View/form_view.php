<h2>
    <?php
    if($data['form_data']['id'] > 0)
        echo "Edit product (#".$data['form_data']['id'].")";
    else
        echo "Add product";
    ?>
</h2>

<div style="width: 400px">

    <?php
        if(!empty($data['form_errors'])) {
            echo '<div class="alert alert-danger">';
            foreach ($data['form_errors'] as $error) {
                echo $error['message'] . "<br>";
            }
            echo '</div>';
        }
    ?>

    <form name="product" method="post">
        <div id="product">
            <div class="form-group">
                <label for="product_name" class="required">Name</label>
                <input type="text" id="product_name" name="product[name]" required="required" maxlength="100" class="form-control" value="<?=$data['form_data']['name'] ?>">
            </div>
            <div class="form-group">
                <label for="product_price" class="required">Price</label>
                <input type="text" id="product_price" name="product[price]" required="required" class="form-control" value="<?=$data['form_data']['price'] ?>">
            </div>
            <div class="form-group">
                <label for="product_description" class="required">Description</label>
                <textarea id="product_description" name="product[description]" required="required" class="form-control"><?=$data['form_data']['description'] ?></textarea>
            </div>
            <input type="hidden" name="product[id]" value="<?=$data['form_data']['id'] ?>">
            <div><button type="submit" id="product_save" name="product[save]">Save</button></div>
        </div>
    </form>
</div>