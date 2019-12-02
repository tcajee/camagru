<?php $this->setSiteTitle('Register') ?>

<?php $this->start('body'); ?>

	<script src="./js/register.js"></script>

	<div class="center">
		
		<h1>Register</h1>

			<!-- <form action="<?=PROOT?>register/register" method="post">
				<input type="text" name="username" value="" placeholder="Username"><p />
				<input type="password" name="password" value="" placeholder="Password"><p />
				<input type="password" name="vpassword" value="" placeholder="Confirm Password"><p />
				<input type="email" name="email" value="" placeholder="example@example.com"><p />
				<input type="submit" name="register" value="Register">
			</form> -->

		<input id="username" type="text" placeholder="Username"><p></p>
		<input id="password" type="password" placeholder="Password"><p></p>
		<input id="vpassword" type="password" placeholder="Confirm Password"><p></p>
		<input id="email" type="email" placeholder="example@example.com"><p></p>
		<input id="registerbutton" type="button" name="register" value="Register" /><p></p>

		<p id="errors" style="display: none; color: red;"></p>

	</div>

<?php $this->end(); ?>
