<div class="container mt-5 p-5 bg-light">
    <div class="row ">
        <div class="col-4">
            <h3>order details</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total=0;
                if(isset($_SESSION['shopping_cart']))
                {
                    foreach ($_SESSION['shopping_cart'] as $key=>$value)
                    {?>
                        <tr>
                            <td><?=$value['itemName']?></td>
                            <td><?=$value['itemQuantity']?></td>
                            <td><?=$value['itemPrice']?></td>
                            <td><?=($value['itemPrice']*$value['itemQuantity'])?></td>
                            <td><a class="btn btn-danger" href="/?action=delete&id=<?=$value['itemId']?>">delete</a></td>
                        </tr>
                        <?php
                        $total+=($value['itemPrice']*$value['itemQuantity']);
                    }
                    $_SESSION['totalPrice']=$total;
                }?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right"><?=number_format($total,2)?></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <form method="post" action="/orders/add">
                <label for="user" class="form-label">User</label>
                <select name="user" id="user" class="form-control">
                    <?php
                    foreach ($users as $user)
                    {?>
                    <option value="<?=$user->id?>"><?=$user->name?></option>
                    <?php }
                    ?>

                </select>
                <button  <?=empty($_SESSION['shopping_cart'])?'disabled':''?> class="btn btn-primary mt-4">Confirm</button>
            </form>
        </div>
        <div class="col-1"></div>
        <div class="col-7">

            <div class="row">
                <?php
                foreach ($products as $product)
                {?>
                    <form class="col-3 " method="post" action="/?action=add&id=<?=$product->id?>">
                        <img  src="<?=$product->imgUrl?>" width="100" height="100">
                        <h4 class="text-info"><?=$product->name?></h4>
                        <h4 class="text-danger"><?=$product->price?></h4>
                        <input type="number" name="quantity" value="1" class="form-control w-50 mb-3" id="">
                        <input type="hidden" name="hidden_name" value="<?=$product->name?>">
                        <input type="hidden" name="hidden_price" value="<?=$product->price?>">
                        <input type="submit" name="submit" value="add to cart" class="btn btn-success">
                    </form>

                <?php }
                ?>
            </div>
        </div>
    </div>
</div>