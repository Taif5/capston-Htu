<h1 class="d-flex justify-content-around  text-center text-uppercase fw-bolder py-5 ">Transaction List (<?= $data->transactions_count ?>)</h1>

<div class="row ">
    <table class="table table-success table-striped  table responsive w-75 m-auto py-5">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Item_id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">Action</th>
  
    </tr>
  </thead>  
<tbody>
    <tr> 
    <tbody>
    <?php
    
    foreach($data->transactions as $transaction ):
      ?>
      <tr>
        <td class="p-3"><?= $transaction->id?></td> 
        <td class="p-3"><?= $transaction->item_id?></td>
        <td class="p-3"><?= $transaction->quantity?></td>
        <td class="p-3"><?= $transaction->total?></td>
        <td class="p-3"><?=$transaction->created_at?></td>
        <td class="p-3"><?= $transaction->updated_at?></td>  
        <td class="p-3"><a href="/transactions/edit?id=<?=$transaction->id ?>" class="btn btn-warning  w-2" >Edit</a> 
        <a href="/transactions/delete?id=<?=$transaction->id?>" class="btn btn-danger w-2">Delete</a>             
        </td>  
      <?php  
    endforeach; ?>
  </tbody>
</table>
</div>
 
 