<?php
$output->body = '
				<div class="row">
					<div class="col-md-5">
						<div class="form-inline">
							<input name="id" class="form-control col-4" type="number" placeholder="User ID">
							<input name="name" class="form-control col-8" type="text" placeholder="CB Name" minlength="4" maxlength="4">
						</div><br>
						<select name="role" class="form-control">
						<option value="" disabled selected>User Role</option>
				';
$roles = M3::dbTable('staffs_roles');
(is_array($roles[0])) ?: $roles=array(0 => $roles);
foreach ($roles as $item) {
	$output->body .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
}							
$output->body .= '
						</select>

					</div>
					<div class="col-md-4">
						<select name="departments[]" class="form-control" size="4" multiple>
				';
$departments = M3::dbTable('staffs_departments');
(is_array($departments[0])) ?: $departments=array(0 => $departments);
foreach ($departments as $item) {
	$output->body .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
}
$output->body .= '
						</select>
					</div>
					<div class="col-md-3">
						<input name="psk" class="form-control" type="text" placeholder="PS Key"><br>
						<input name="psn" class="form-control" type="number" placeholder="PS Number" min="00" max="99">
					</div>
				</div>
				';