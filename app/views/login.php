<?php $this->setSiteTitle('Login') ?>

<?php $this->start('body'); ?>

<script src="./js/login.js"></script>

	<div class="center">

		<h1>Login</h1>
			<input id="username" type="text" name="username" value="" placeholder="Username"><p></p>
			<input id="password" type="password" name="password" value="" placeholder="Password"><p></p>
			<input id="loginbutton" type="button" name="login" value="Login" /><p></p>

			<p id="errors" style="display: none; color: red;"></p>
			</form>
			<br />
			<p>Can't remember your password?</p>
		<form action="login/forgot" method="POST">
			<input type="email" name='reset_pass' placeholder='Enter Email of Account'>
			<input type="submit" name="forgot" value="Reset Password">
		</form>
	</div>
<?php $this->end(); ?>
