<div class="my-5">
    <!-- for public -->
    <h1 class="text-center mb-5">
        <?= $data->item->title?>
    </h1>

    <?php if (!empty($data->item->author)) : ?>
        <p class="mb-3">
            Author: <?= $data->item->author ?>
        </p>
    <?php endif; ?>

    <p class="mb-3">
        Created: <?= $data->item->create_at ?>
    </p>
    
    <p>
        <?= $data->item->content?>
    </p>
</div>