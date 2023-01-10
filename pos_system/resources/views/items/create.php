<h1 class="text-center text-uppercase fw-bolder">Create Item</h1>

<form action="/items/store" method="POST" class="w-50  mt-3 ">

<div class="mb-3 mt-3 ">
  <input type="file" class="form-control" id="inputGroupFile02">
  <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
</div>


    <div class="mb-3  mt-3  ">
        <label for="item-title" class="form-label p-2   fw-bold p-1">Item Title</label>
        <input type="text" class="form-control mb-2 mx-2 shadow border " style="height:40px" id="item-title" name="title">
    </div>
    <div class="mb-3  mt-3">
        <label for="item-Quantity"class="form-label p-2   fw-bold p-1" >Item Quantity</label>
     <input type="number" class="form-control mb-2 mx-2 shadow border" placeholder="Your item Quantity.." id="item-Quantity"  min="1" style="height:40px" name="Quantity">  
         
    </div>
    <button type="submit" class="btn btn-success mt-2 ms-2">Create</button>
</form>

 