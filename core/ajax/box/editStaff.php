<?php

$row_staff = SYS::staff ($_GET['id'] ?? NULL);

$output->body = '
				<div class="row">
					<div class="col-md-5">
						<div class="form-inline">
							<input name="id" class="form-control col-4" type="number" placeholder="User ID" value="'.$row_staff['id'].'" disabled>
							<input name="name" class="form-control col-8" type="text" placeholder="CB Name" value="'.$row_staff['name'].'" minlength="4" maxlength="4">
						</div><br>
						<select name="role" class="form-control">
						<option value="" disabled>User Role</option>
				';
$roles = M3::dbTable('staffs_roles');
foreach ($roles as $item) {
	$selected = ($row_staff['role']==$item['id']) ? 'selected' : NULL;
	$output->body .= '<option value="'.$item['id'].'" '.$selected.'>'.$item['name'].'</option>';
}							
$output->body .= '
						</select>

					</div>
					<div class="col-md-4">
						<select name="departments[]" class="form-control" size="4" multiple>
				';
$departments = M3::dbTable('staffs_departments');
foreach ($departments as $item) {
	$selected = (in_array($item['id'],explode(",",$row_staff['departments']))) ? 'selected' : NULL;
	$output->body .= '<option value="'.$item['id'].'" '.$selected.'>'.$item['name'].'</option>';
}
$output->body .= '
						</select>
					</div>
					<div class="col-md-3">
						<input name="psk" class="form-control" type="text" placeholder="PS Key" value="'.$row_staff['psk'].'"><br>
						<input name="psn" class="form-control" type="number" placeholder="PS Number" value="'.$row_staff['psn'].'" min="00" max="99">
					</div>
				</div>
				';