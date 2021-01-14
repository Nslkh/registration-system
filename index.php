<?php
session_start();
require 'inc/utils.php';
require 'db/utils.php';

// $tab_title = "Admin panel";
$logged = $_SESSION['logged'] ?? false;

if (!$logged) {
	redirect('login.php');
}

$db_data = get_db();
$users_data = $db_data['users'];
?>

<?php include 'components/heading.php';?>
<!--------navbar starts ----->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Users</a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!--------navbar ends ----->
<!-- modals starts -->
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modals ends -->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8" style="margin-top: 100px">
            <div class="card p-4">
                <div class="card-header text-center">Users list</div>
                    <?php if (count($users_data) > 0): ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">email</th>
                                <th scope="col">picture</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users_data as $key => $user):?>
                                    <tr>
                                        <th scope="row"><?php echo ++$key ?></th>
                                        <td><?php echo $user['firstname'] ?></td>
                                        <td><?php echo $user['lastname'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td><a href="<?php echo sanitize($user['picture']) ?>">uploaded picture</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h5 class="p-3 text-center">Users are not available</h5>
                    <?php endif; ?>
                </div>
            </div>
		</div>
	</div>
</div>

<?php include 'components/ending.php';?>
