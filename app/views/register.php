<?php $this->setSiteTitle('Register') ?>

<?php $this->start('body'); ?>

	<div class="center">
		
		<h1>Register</h1>

			<form action="<?=PROOT?>register/register" method="post">
				<input type="text" name="username" value="" placeholder="Username"><p />
				<input type="password" name="password" value="" placeholder="Password"><p />
				<input type="password" name="vpassword" value="" placeholder="Confirm Password"><p />
				<input type="email" name="email" value="" placeholder="example@example.com"><p />
				<input type="submit" name="register" value="Register">
			</form>	

	</div>

<?php $this->end(); ?>
