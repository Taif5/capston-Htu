<?php

use Core\Helpers\Helper;
?>


<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center text-uppercase fw-bolder">
        <?= $data->item->title ?>
    </h1>
    <div>
    <img src="./public/img/<?= $data->item->img ?>" class="card-img-top" alt="..." style="max-width:20%;margin-right:1rem">

    <div class=" w-50  mt-5   ">
    <h5 class="mb-2 mx-2 shadow border fw-bold p-3      ">

        Quantity:<?= $data->item->quantity ?>
    </h5>

    <h5 class="mb-2 mx-2 shadow border fw-bold p-3       ">
        
        Created At: <?= $data->item->create_at ?>
    </h5 >

    <h5 class="mb-2 mx-2 shadow border fw-bold p-3      ">
        Updated At: <?= $data->item->updated_at ?>
    </h5>
    </div>

    <div class="mt-5 mx-4 d-flex  gap-3 ">
    <?php if (Helper::check_permission(['item:read', 'item:update'])) : ?>
        <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning  w-2">Edit</a>
    <?php endif;
    if (Helper::check_permission(['item:read', 'item:delete'])) :
    ?>
        <a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger w-2">Delete</a>
    <?php endif; ?>
</div>
</div>

