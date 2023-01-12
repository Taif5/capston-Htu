<?php

use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS system</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
    
</head>

<style>
   

@media only screen and (max-width : 760px ) {

    .admin-links{

        width: 102%;
    text-align: center;
    height: 100%;
    }
#admin-area{

    text-align: center;
}

form{
    flex: 0 0 auto;
    width: 100% !important;
}
.w-50{
    width: 100% !important;

}
.col-10 {
    flex: 0 0 auto;
    width: 100%;
}
}


   
</style>

<body class="admin-view">

    <nav class="navbar navbar-dark text-light  bg-dark navbar-expand-lg " >
        <div class="container-fluid">  
            <a class="navbar-brand" >POS system</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (Helper::check_permission(['user:read'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">dashboard</a>
                    </li>
                    <?php endif;
                ?>
                     
   
                </ul>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <?php if (Helper::check_permission(['selling:read' ])) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/selling">Selling dashboard</a>
                    </li>
                    <?php endif;
                ?>

                      <?php if (Helper::check_permission(['transaction:read' ])) : ?>

                   <li class="nav-item">
                      <a class="nav-link" href="/transactions">Transactions dashboard</a>
                   </li>
                <?php endif;
                      ?>
                 
                </ul> 



                <ul class="nav navbar-nav navbar-right"> 
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?=$_SESSION['user']['display_name']?></a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>  
                       
                </ul>
                
            </div>
            </div>
        </div>
    </nav>

    <div id="admin-area" class="row" style="--bs-gutter-x: 0rem !important;">
        <div class="col-2 admin-links " id="admin">
            <ul class="list-group list-group-flush mt-3">
                <?php if (Helper::check_permission(['item:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/items">Stock Management  </a>
                    </li>
                <?php endif;
                   
                      
            

                if (Helper::check_permission(['item:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/items/create">Create Item</a>
                    </li>
                <?php endif;
                
                if (Helper::check_permission(['user:read'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users">All Users</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['user:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users/create">Create User</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <div class="col-10 admin-area-content">
            <div class="container my-5">