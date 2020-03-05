<div id="product<?php echo $index?>" class="productItem">                
    <p><?php echo $product->name ?></p>
        <div style="width:150px;">
            <?php
                if(file_exists('image/'.$product->code)){ 
            ?>
                <img src="<?php echo 'image/'.$product->code ?>" alt="#" width="150px">
            <?php 
                }else{
            ?>
                <p>No Image</p>
            <?php }?>
        </div>
        <p>¥<?php echo $product->value?></p>
        <form action="input.php" method="POST">
            <div>
                <label for="colorSelect">カラー</label>
                <select name="color">
                    <?php foreach($product->color as $color):?>
                        <option value="<?php echo $color?>"><?php echo $color?></option>
                    <?php
                        endforeach;
                        unset($color);
                    ?>
                </select>
            </div>
            <div>
                <label for="sizeSelect">サイズ</label>
                <select name="size">
                    <?php foreach($product->size as $size):?>
                        <option value="<?php echo $size?>"><?php echo $size?></option>
                    <?php 
                        endforeach;
                        unset($size);
                    ?>
                </select>
            </div>
        </form>
        <div>
            <input type="submit" value="カートにいれる">
        </div>
</div>