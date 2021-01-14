<div class="container">
	<div class="row justify-content-center" style="margin-top: 50px">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<h1 class="text-center">Sign in</h1>
					<form action="login.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="text"
							class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>"
							id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo sanitize($email) ?>">
							<div class="invalid-feedback">
								<?php echo $errors['email'] ?? '' ?>
							</div>
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1" name="password" value="<?php echo sanitize($password) ?>">
							<div class="invalid-feedback">
								<?php echo $errors['password'] ?? '' ?>
							</div>
						</div>

						<button type="submit" class="btn btn-primary" name="login">Sign in</button>

					</form>
				</div>
				<div class="card-footer">
					<p>Don't have an account? <a href="register.php" class="link-primary">Sing up</a></p>
				</div>
			</div>
		</div>
	</div>
</div>