  <br>
  <table class="table table-success table-striped  shadow border  shadow-lg p-3 mb-5 bg-body rounded  w-75 m-auto py-5 ">
  <thead>
    <tr>
      <th scope="col">Total sales</th>
      <th scope="col">Total transactions</th>
      <th scope="col">Total items number</th>
      <th scope="col">Total users</th>
       
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="p-3"> <?=$data->total_sell ?> </td>
      <td class="p-3"> <?=$data->transactions_count ?> </td>
      <td class="p-3"><?=$data->items_count ?> </td>
      <td class="p-3"><?= $data->users_count ?></td>


  </tbody>
</table>


<br>
 <br>
 <h2 class="text-center text-uppercase my-4"> Top five expensive items to buy </h2>  

 <div class="row my-5  mb-2 mx-2  pt-2 shadow border my-5 ">
    <?php foreach ($data->top_items as $item) : ?>
        <div class="htu-card-wrapper mb-1 col-12 col-md-6 col-lg-4 col-xl-3  " >
            <div class="card w-100 border-success shadow border">
                <div class="card-body shadow border">
                <img src="./public/img/<?= $item->img ?>" class="card-img-top" alt="..." style="max-width:100%">
                    <h5 class="card-title text-center ">
                    <?= $item->title ?>
                    <br>
                    <?= $item->price ?>$
                    </h5>
                </div>
            </div>
        </div>
        
    <?php endforeach; ?>

</div>