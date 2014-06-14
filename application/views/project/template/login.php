<?php
$username = array(
	'name' => 'username',
	'id' => 'username',
	//'style' => 'width:50%',
);
$password = array(
	'name' => 'password',
	'id' => 'password',
	//'style' => 'width:50%',
);
$submit = array(
	'value' => 'Login',
);
?>

<?php print validation_errors(); ?>
<?php print form_open(); ?>
<?php print form_fieldset('Login Information'); ?>
<table>
	<tr>
		<td>Email Address</td>
		<td><?php print form_input($username); ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?php print form_password($password); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php print form_submit($submit); ?></td>
	</tr>
</table>
<?php print form_fieldset_close(); ?>
<?php print form_close(); ?>