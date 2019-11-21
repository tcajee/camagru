<?php $this->setSiteTitle('Login') ?>

<?php $this->start('body'); ?>

	<div class="center">

		<h1>Login</h1>
		<form action="login/login" method="post">
			<input type="text" name="username" value="" placeholder="Username"><p />
			<input type="password" name="password" value="" placeholder="Password"><p />
			<input type="submit" name="login" value="Login">
		</form>	

	</div>

<?php $this->end(); ?>
