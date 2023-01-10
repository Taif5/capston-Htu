
<div class="login1">
    

    <h1> Login POS</h1>
    
        <form class="form1" method="POST" action="/authenticate">
    
            <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                <div class='alert alert-danger mb-3' role='alert'>
                    <?= $_SESSION['error'] ?>
                </div>
            <?php
                $_SESSION['error'] = null;
            endif; ?>
     
        <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Username" name="username">
      </div>
   
      <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input class="input-field" type="password" placeholder="Password" name="password">
      </div>
    
       <div>
      <label> <input type="checkbox" checked="checked" name="remember" > Remember me </label>
      </div> 
    
      <button type="submit" class="btn1">login</button>
    
      </form>
      </div>
        
    