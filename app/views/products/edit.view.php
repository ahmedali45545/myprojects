
<div class="container">
    <form method="post" enctype="multipart/form-data" class="w-50">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="<?=$product->name?>" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" value="<?=$product->price?>" class="form-control" name="price" id="price">
        </div>
        <div class="mb-3">
            <label for="imgUrl" class="form-label">Image</label>
            <input type="file" value="<?=file_get_contents($product->imgUrl)?>" class="form-control" name="imgUrl" id="imgUrl">
        </div>
        <div class="mb-3">
            <label for="catName" class="form-label">Select Category</label>
            <select class="form-select" name="catId" aria-label="Default select example">
                <option selected disabled>Select Category</option>
                <?php
                foreach ($categories as $category)
                {?>
                    <option <?=$product->catId==$category->id?'selected':''?> value="<?=$category->id?>"><?=$category->name?></option>
                <?php }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

