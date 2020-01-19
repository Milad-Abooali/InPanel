<?php

$row_role = M3::dbCol ('staffs_roles', $_GET['id'] ?? NULL, 'name');

$output->body = '
				<div class="row">
					<div class="col-md-12">
						<div class="form-inline">
							<input name="id" class="form-control col-3" type="number" placeholder="ID" value="'.$_GET['id'].'" disabled>
							<input name="name" class="form-control col-8" type="text" placeholder="Roles Name" value="'.$row_role.'" minlength="3" maxlength="250">
						</div>
					</div>
				</div>
				';