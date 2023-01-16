<h1 class= "text-center text-uppercase fw-bolder">Edit item</h1>

<form action="/items/update" method="POST" class="w-50">

    <input type="hidden" name="id" value="<?= $data->item->id ?>">

    <div class="mb-3 mt-3 ">
  <input type="file" class="form-control" id="inputGroupFile02">
  <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
</div>
    <div class="mb-3">
        <label for="item-title" class="form-label">Item Title</label>
        <input type="text" class="form-control" id="item-title" name="title" value="<?= $data->item->title ?>">
    </div>
    <div class="form-floating">
        <input type="number" class="form-control" placeholder="Your item Quantity.." id="item-Quantity" min="1" style="height: 50px"   name="Quantity"  value="<?= $data->item->quantity?>" > 
        <label for="post-Quantity">Item Quantity</label>
    </div>
   

    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>