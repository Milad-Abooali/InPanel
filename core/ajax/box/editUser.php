<?php

$row = M3::dbRow ('users', $_GET['id'] ?? NULL);

$output->body = '
				<div class="row ">
					<div class="col-md-5 text-left">
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="email">Email</label>
							<input name="email" class="form-control col-8" type="email" placeholder="Email" value="'.$row['email'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="f_name">First Name</label>
							<input name="f_name" class="form-control col-8" type="text" placeholder="First Name" value="'.$row['f_name'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="l_name">Last Name</label>
							<input name="l_name" class="form-control col-8" type="text" placeholder="Last Name" value="'.$row['l_name'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="birthday">Birthday</label>
							<input name="birthday" class="form-control col-8" type="text" placeholder="Birthday" value="'.$row['birthday'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="country">Country</label>
							<input name="country" class="form-control col-8" type="text" placeholder="Country" value="'.$row['country'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="region">Region</label>
							<input name="region" class="form-control col-8" type="text" placeholder="Region" value="'.$row['region'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="city">City</label>
							<input name="city" class="form-control col-8" type="text" placeholder="City" value="'.$row['city'].'">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="company">Company</label>
							<input name="company" class="form-control col-8" type="text" placeholder="Company" value="'.$row['company'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="ncode">National Code</label>
							<input name="ncode" class="form-control col-8" type="text" placeholder="National Code" value="'.$row['ncode'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="language">Language</label>
							<input name="language" class="form-control col-8" type="text" placeholder="Language" value="'.$row['language'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="phone">Phone</label>
							<input name="phone" class="form-control col-8" type="text" placeholder="Phone" value="'.$row['phone'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="mobile">Mobile</label>
							<input name="mobile" class="form-control col-8" type="text" placeholder="Mobile" value="'.$row['mobile'].'">
						</div><br>
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="public_profile">Public Profile</label>
							<input name="public_profile" class="form-control col-8" type="text" placeholder="Public Profile" value="'.$row['public_profile'].'">
						</div><br>	
						<div class="form-inline">
							<label class="col-md-4 col-form-label" for="postcode">Postal Code</label>
							<input name="postcode" class="form-control col-8" type="text" placeholder="Postal Code" value="'.$row['postcode'].'">
						</div>
					</div>
					<div class="col-md-3">
						<label for="invoice_date">Invoice Date</label>
						<input name="invoice_date" class="form-control col-8" type="text" placeholder="Invoice Date" value="'.$row['invoice_date'].'">
						<label for="gateway">Gateway</label>
						<select name="gateway" class="form-control">
				';
$bank_gateway = M3::dbTable('bank_gateway');
foreach ($bank_gateway as $item) {
	$selected = ($row['gateway']==$item['id']) ? 'selected' : NULL;
	$output->body .= '<option value="'.$item['id'].'" '.$selected.'> '.$item['name'].'</option>';
}
$output->body .= '
						</select><br>
						<label for="groups">Groups</label>
						<select name="groups[]" class="form-control" size="9" multiple>
				';
$groups = M3::dbTable('user_groups');
foreach ($groups as $item) {
	$selected = (in_array($item['id'],explode(",",$row['groups']))) ? 'selected' : NULL;
	$output->body .= '<option style="color:#'.$item['color'].'" value="'.$item['id'].'" '.$selected.'>⬤ '.$item['name'].'</option>';
}
$output->body .= '
						</select>
						<input name="id" class="form-control col-8" type="hidden" value="'.$row['id'].'" >
					</div>
					<div class="col-md-12">
							<label for="address">Address</label>
							<textarea name="address" class="form-control" placeholder="Address">'.$row['address'].'</textarea>
					</div>
				</div>
				';