<h1 class= "text-center text-uppercase fw-bolder">Edit Transaction</h1>

<form action="/transactions/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
    <div class="mb-3">
        <label for="item-id" class="form-label">Item_id</label>
        <input type="text" class="form-control" id="item-id" name="id" value="<?= $data->transaction->item_id?>">

    <div class="form-floating">
        <input type="number" class="form-control" placeholder="Your Transaction Quantity.." id="Transaction-Quantity" min="1" style="height: 50px"   name="Quantity"  value="<?= $data->transaction->quantity?>" > 
        <label for="post-Quantity">Transaction Quantity</label>
    </div>
   
    <button type="submit" class="btn btn-warning mt-4">Update</button>
 
</form> 