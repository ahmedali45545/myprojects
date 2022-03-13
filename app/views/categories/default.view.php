
<div class="container">
    <table class="w-75  table table-striped table-hover">
        <thead>
        <tr>
            <th class="col-10">Category Name</th>
            <th class="col-2">Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($categories as $key )
        {?>
            <tr>
                <td><?=$key->name?></td>
                <td>
                    <a class="btn btn-warning" href="/categories/edit/<?=$key->id?>">Edit</a>
                    <a class="btn btn-danger" href="/categories/delete/<?=$key->id?>">Delete</a>
                </td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>
