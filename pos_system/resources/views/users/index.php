<h1 class="d-flex justify-content-around mb-5  text-center text-uppercase fw-bolder">Users List (<?= $data->users_count ?>)</h1>

<div class="row" >
    <table class="table table-success table-striped  w-50  shadow-lg p-3 mb-5 bg-body rounded ">
        <thead>
            <tr>
                <th scope="col" >Display Name</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach ($data->users as $user) : ?>
                <tr>
                    <td ><?= $user->display_name ?></td>
                    <td><a href="./user?id=<?= $user->id ?>" class=" text-end btn btn-success d-flex justify-content-end justify-content-around  shadow border "  >Check User</a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>