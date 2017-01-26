<h2>Add product</h2>

<div style="width: 400px">
    <form name="product" method="post">
        <div id="product">
            <div class="form-group">
                <label for="product_name" class="required">Name</label>
                <input type="text" id="product_name" name="product[name]" required="required" maxlength="100" class="form-control" value="<?=$data['product']->getName() ?>">
            </div>
            <div class="form-group">
                <label for="product_price" class="required">Price</label>
                <input type="text" id="product_price" name="product[price]" required="required" class="form-control" value="<?=$data['product']->getPrice() ?>">
            </div>
            <div class="form-group">
                <label for="product_description" class="required">Description</label>
                <textarea id="product_description" name="product[description]" required="required" class="form-control"><?=$data['product']->getDescription() ?></textarea>
            </div>
            <input type="hidden" name="product[id]" value="<?=$data['product']->getId() ?>">
            <div><button type="submit" id="product_save" name="product[save]">Save</button></div>
        </div>
    </form>
</div>