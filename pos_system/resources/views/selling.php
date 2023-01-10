 <form   class="w-50   m-auto mt-3 ">
    <div class="mb-3   mt-3 ">
    <label for="item-title" class="form-label p-2   fw-bold p-1">Item Title</label>
    
        <select   class="form-select mb-2 mx-2 shadow border " style="height:40px" id="item-title"  aria-label="title" name="item-title"  >
            <option value="...">...</option>
            <?php foreach ($data->items as $item) :?>
    
        <option value="<?= $item->id ?>" >  <?= $item->title ?>  </option>
         <?php endforeach; ?>
     
        </select>
     
        

    </div>
    <div class="mb-3  mt-3 m-auto">
        <label for="item-Quantity"class="form-label p-2   fw-bold p-1" >Item Quantity</label>
     <input type="number" class="form-control mb-2 mx-2 shadow border" placeholder="Your item Quantity.." id="item-Quantity"  min="1" style="height:40px" name="item-Quantity">  
         
      
    </div>

    <div class="text-center  ">
    <button type="submit" class="btn btn-success mt-2 ms-2 m-auto px-5 py-2" id="add_transaction">Sell</button>

            </div>


</form>

<table class="table table-success table-striped  shadow border shadow-lg  bg-body rounded w-75  m-auto mt-5">
  <thead>
    <tr>
      <!-- <th scope="col">Id</th> -->
      <th scope="col" class="text-center">Item_Id</th>
      <th scope="col"  class="text-center" >Item Quantity </th>
      <th scope="col"  class="text-center" >Price</th>
      <th scope="col"  class="text-center">total </th>
       
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>

//  get the all transactions


$.ajax({
            type: "get",
            url: "http://test.local/api/transactions",
            success: function(response) {
                response.body.forEach(element => {
                    $('tbody').append(`
                    <tr>
                    
                     <td class="p-3 text-center">${element.item_id}</td>
                     <td class="text-center">${element.quantity}</td>
                     <td class="p-3 text-center">${element.price}</td>
                     <td class="p-3 text-center">${element.total}</td>
                    
                     
          
                   </tr>
                     
                    `);
                });
            }
        });
    $('#add_transaction').click(function(e) {

    e.preventDefault();
    let data = {
         item_id:$("#item-title").val(),
         quantity:$("#item-Quantity").val(),
          total:$("#total").val(),
         
        
    }; 
 
        $.ajax({
            type:"post",
            url: "http://test.local/api/transactions/create",
            data: JSON.stringify(data),
            success: function(response) {


                    $('tbody').html(` `);
                
            $.ajax({
            type: "get",
            url: "http://test.local/api/transactions",
            success: function(response) {

                response.body.forEach(element => {
                    $('tbody').append(`
                    <tr>
                     <td class="p-3">${element.item_id}</td>
                     <td class="p-3">${element.quantity}</td>
                     <td class="p-3">${element.price}</td>
                     <td class="p-3">${element.total}</td>
                      
            
                     
                   </tr>
                     
                    `);
                });
                alert("process completed successfully");

                $('#item-Quantity').val('');
            }
        });
            },
            error: function(e) {
           alert('not done');
            }
        });
  
    });

    </script>

   
 
   







