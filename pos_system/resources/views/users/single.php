 
<!-- 
<div class="my-5"> -->
    <!-- for admins -->
    <!-- <h1 class="text-center"> -->
  
<form action="/users/update" method="POST" class="w-50">
<fieldset disabled>
    <input type="hidden" name="id" value="<?= $data->user->id ?>">
    <div class="mb-3">
        <label for="display-name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name"  placeholder="Disabled input" aria-label="Disabled input example"  value="<?= $data->user->display_name ?>">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email" value="<?= $data->user->email ?>">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username" value="<?= $data->user->username ?>">
    </div>
    <div class="mb-3">
        <label for="user-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="user-password" name="password" value="<?= $data->user->password ?>">
    </div>
    <div class="mb-3">
        <label for="user-role" class="form-label">Role</label>
        <input type="text" class="form-control"  id="user-role" aria-label="Role" name="role" value="<?= $data->user->role ?>">
        
    </div>
    </fieldset>
</form>
  
    <div class=" mt-5  flex-left-reverse gap-3">
    <a href="/users/edit?id=<?= $data->user->id ?>" class="btn btn-warning">Edit</a>
    <a href="/users/delete?id=<?= $data->user->id ?>" class="btn btn-danger">Delete</a>
    <a href="/users" class="btn btn-success">Back</a>
</div>

 
    