<h1 class="d-flex justify-content-around  text-center text-uppercase fw-bolder ">Item List (<?= $data->items_count ?>)</h1>

<div class="row my-5  mb-2 mx-2  pt-2 shadow border  ">

    <?php foreach ($data->items as $item) : ?>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3  " >
            <div class="card w-100 shadow border border-success" style="max-width:100%">
                <div class="card-body shadow border" style="max-width:100%">
                <img src="./public/img/<?= $item->img ?>" class="card-img-top" alt="..." style="max-width:100%">
                    <h5 class="card-title text-center  pt-5">
                        <?= $item->title ?>
                    </h5>
                    <div class="d-flex justify-content-center align-items-center py-3">
                        <a href="./item?id=<?= $item->id ?>" class="btn btn-success shadow border"> Details </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>