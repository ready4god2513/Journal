<div id="my_account">
	<h2>My Account</h2>
	<table class="account_layout">
		<tr>
			<th colspan="2"><?=count($user->journals)?> Journal <?=ucwords(inflector::plural('entry', count($user->journals)))?></th>
		</tr>
		<tr>
			<th>Member Since</th>
			<td><?=date::user_friendly_date($user->created_at)?></td>
		</tr>
		<tr>
			<th>Username</th>
			<td><?=$user->username?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?=$user->email?></td>
		</tr>
	</table>
	
	<div class="left">
		<?=form::open('users/delete', array('class' => 'deleteObjectLink'))?>
			<?=form::submit('submit', 'Delete My Account')?>
		<?=form::close()?>
	</div>
	<div class="clear"></div>
</div>