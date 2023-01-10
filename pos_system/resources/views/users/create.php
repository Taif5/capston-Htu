<h1 class="text-center text-uppercase fw-bolder">Create User</h1>

<form action="/users/store" method="POST" class="w-50  mt-3 ">
    <div class="mb-3 mt-3">
        <label for="display-name" class="form-label  fw-bold p-2">Display Name</label>
        <input type="text" class="form-control mb-2 mx-2 shadow border mb-2 mx-2 shadow border " id="display-name" name="display_name">
    </div>
    <div class="mb-3 mt-3">
        <label for="user-email" class="form-label  fw-bold p-2">Email</label>
        <input type="email" class="form-control form-control mb-2 mx-2 shadow border" id="user-email" name="email">
    </div>
    <div class="mb-3 mt-3">
        <label for="user-username" class="form-label  fw-bold p-2  ">Username</label>
        <input type="text" class="form-control form-control mb-2 mx-2 shadow border" id="username-email" name="username">
    </div>
    <div class="mb-3 mt-3">
        <label for="user-password" class="form-label  fw-bold p-2">Password</label>
        <input type="password" class="form-control form-control mb-2 mx-2 shadow border" id="password-email" name="password">
    </div>
    <button type="submit" class="btn btn-success mt-4">Create</button>
    <a href="/users" class="btn btn-danger ms-3 mt-4">Cancel</a>
</form>


 

 

 
 