<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Statement Generator</title>
	<link href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">

	<script src="assets/js/jquery-3.7.1.slim.min.js"></script>
</head>
<body>
	
<form>
	<div class="container mt-4">
		<img src="assets/images/logo.png" />
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="row mb-3">
					<label for="name" class="col-sm-2 col-form-label">NAME</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" />
					</div>
				</div>
				<div class="row mb-3">
					<label for="address" class="col-sm-2 col-form-label">ADDRESS</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" />
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row mb-3">
					<label for="p_date" class="col-sm-4 col-form-label bolder">Statement Print Date</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="p_date" name="p_date" placeholder="Select Date" />
					</div>
				</div>
				<div class="row mb-3">
					<label for="acc_number" class="col-sm-4 col-form-label bolder">Account Number</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="acc_number" name="acc_number" placeholder="Select Date" />
					</div>
				</div>
				<div class="row mb-3">
					<label for="acc_type" class="col-sm-4 col-form-label bolder">Account Type</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="acc_type" name="acc_type" readonly disabled value="CITY ISLAMIC SAVINGS A/C" placeholder="Enter Account Type" />
					</div>
				</div>
				<div class="row mb-3">
					<label for="cust_number" class="col-sm-4 col-form-label bolder">Customer Number</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="cust_number" name="cust_number" placeholder="Enter Customer Number" />
					</div>
				</div>
				<div class="row mb-3">
					<label for="currency" class="col-sm-4 col-form-label bolder">Currency</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="currency" name="currency" readonly disabled value="BDT" placeholder="Select Currency" />
					</div>
				</div>
				<div class="row mb-3">
					<label for="status" class="col-sm-4 col-form-label bolder">Status</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="status" name="status" readonly disabled value="BDT" placeholder="Select Status" />
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12">
				<p class="mb-4 text-center">
					Account Statement from Date:
					<input type="text" name="state_from_date" />
					Till Date:
					<input type="text" name="state_till_date" />
				</p>
				<table class="table table-bordered table-striped-columns">
					<thead>
						<tr>
							<th>Date</th>
							<th>Ref/Check</th>
							<th>Description</th>
							<th>Withdraw</th>
							<th>Deposit</th>
							<th>Balance</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="more_row">
						<tr>
							<td>
								<input type="text" name="statement_date[]" class="form-control" placeholder="Select Date" aria-label="Select Date">
							</td>
							<td>
								<input type="text" class="form-control" name="ref[]" placeholder="Enter Ref/Check" aria-label="Enter Ref/Check">
							</td>
							<td>
								<input type="text" class="form-control" name="description[]" placeholder="Enter Description" aria-label="Enter Description">
							</td>
							<td>
								<input type="text" class="form-control" name="withdraw[]" placeholder="Enter Withdraw" aria-label="Enter Withdraw">
							</td>
							<td>
								<input type="text" class="form-control" name="deposit[]" placeholder="Enter Deposit" aria-label="Enter Deposit">
							</td>
							<td>
								<input type="text" class="form-control" name="balance[]" placeholder="Enter Balance" aria-label="Enter Balance">
							</td>
							<td>
								<button type="button" onclick="javascript:moreAdd(this)" class="btn btn-primary btn-sm">Add</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-8">
				<p><strong>Total Withdraws in BDT: 385,085.00</strong></p>
				<p><strong>Total Deposits in BDT: 142,449.03</strong></p>
			</div>
			<div class="col-md-4">
				<div class="row mb-3">
					<label for="opending_bal" class="col-sm-4 col-form-label">Opening Balance</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="opending_bal" name="opending_bal" placeholder="Enter Opening Balance" />
					</div>
				</div>
				<div class="row mb-3">
					<label for="avail_bal" class="col-sm-4 col-form-label">Available Balance</label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="avail_bal" value="24,940.78" readonly disabled name="avail_bal" placeholder="Enter Available Balance" />
					</div>
				</div>
			</div>
		</div>
		<h4 class="text-center bg-body-secondary mt-4 fw-semibold p-3">END OF STATEMENT</h4>

		<div class="d-grid gap-2 mt-5">
			<button type="submit" class="btn btn-success btn-lg">Generate Statement</button>
		</div>
	</div>
</form>
<<script>
	function moreAdd(tag){
		let tr = `<tr>
					<td>
						<input type="text" name="statement_date[]" class="form-control" placeholder="Select Date" aria-label="Select Date">
					</td>
					<td>
						<input type="text" class="form-control" name="ref[]" placeholder="Enter Ref/Check" aria-label="Enter Ref/Check">
					</td>
					<td>
						<input type="text" class="form-control" name="description[]" placeholder="Enter Description" aria-label="Enter Description">
					</td>
					<td>
						<input type="text" class="form-control" name="withdraw[]" placeholder="Enter Withdraw" aria-label="Enter Withdraw">
					</td>
					<td>
						<input type="text" class="form-control" name="deposit[]" placeholder="Enter Deposit" aria-label="Enter Deposit">
					</td>
					<td>
						<input type="text" class="form-control" name="balance[]" placeholder="Enter Balance" aria-label="Enter Balance">
					</td>
					<td>
						<button type="button" onclick="javascript:delRow(this)" class="btn btn-danger btn-sm">Del</button>
					</td>
				</tr>`;
		$('#more_row').append(tr);
	}

	function delRow(tag){
		$(tag).parents('tr').remove();
	}
</script>
</body>
</html>
