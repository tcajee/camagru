<?php $this->setSiteTitle('Login') ?>

<?php $this->start('body'); ?>

<script src="./js/login.js"></script>

	<div class="center">

		<h1>Login</h1>
			<input class="input center" id="username" type="text" name="username" value="" placeholder="Username"><p></p>
			<input class="input center" id="password" type="password" name="password" value="" placeholder="Password"><p></p>
			<input class="button text-black grey" id="loginbutton" type="button" name="login" value="Login" /><p></p>
			

			<p id="errors" style="display: none; color: red;"></p>
			</form>
			<br />
			<p>Can't remember your password?</p>
		<form action="login/forgot" method="POST">
			<input class="input center" type="email" name='reset_pass' placeholder='Enter email address'>
			<br />
			<br />
			<input class="button text-black grey" type="submit" name="forgot" value="Reset">
		</form>
			<br />
	</div>
<?php $this->end(); ?>
