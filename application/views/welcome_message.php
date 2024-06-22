<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Statement Generator</title>
	<link href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/bootstrap-5.3.3-dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

	<script src="assets/js/jquery-3.7.1.slim.min.js"></script>
	<script src="assets/bootstrap-5.3.3-dist/js/bootstrap-datepicker.min.js"></script>
</head>

<body>

	<form action="welcome/save" method="post">
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
							<input type="text" class="form-control datepicker" id="p_date" name="p_date" placeholder="Select Date" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="acc_number" class="col-sm-4 col-form-label bolder">Account Number</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="acc_number" name="acc_number" placeholder="Enter Account Number" />
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
							<input type="text" class="form-control" id="status" name="status" readonly disabled value="Active" placeholder="Select Status" />
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-md-12">
					<p class="mb-4 text-center">
						Account Statement from Date:
						<input type="text" name="state_from_date" class="datepicker" />
						Till Date:
						<input type="text" name="state_till_date" class="datepicker" />
					</p>
					<table class="table table-bordered table-striped">
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
									<input type="text" name="statement_date[]" class="form-control datepicker" placeholder="Select Date" aria-label="Select Date">
								</td>
								<td>
									<input type="text" class="form-control" name="ref[]" placeholder="Enter Ref/Check" aria-label="Enter Ref/Check">
								</td>
								<td>
									<input type="text" class="form-control" name="description[]" placeholder="Enter Description" aria-label="Enter Description">
								</td>
								<td>
									<input type="text" class="form-control" name="withdraw[]" onkeyup="javascript:accounts(this, 'w')" placeholder="Enter Withdraw" aria-label="Enter Withdraw">
								</td>
								<td>
									<input type="text" class="form-control" name="deposit[]" onkeyup="javascript:accounts(this, 'd')" placeholder="Enter Deposit" aria-label="Enter Deposit">
								</td>
								<td>
									<input type="text" class="form-control" name="balance[]" placeholder="Enter Balance" aria-label="Enter Balance" readonly />
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
				<div class="col-md-6">
					<p><strong id="total_withdraw">Total Withdraws in BDT: 0</strong></p>
					<p><strong id="total_deposit">Total Deposits in BDT: 0</strong></p>
				</div>
				<div class="col-md-6">
					<div class="row mb-3">
						<label for="opending_bal" class="col-sm-4 col-form-label">Opening Balance</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="opending_bal" onchange="javascript:opening_bal(this)" name="opending_bal" placeholder="Enter Opening Balance" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="avail_bal" class="col-sm-4 col-form-label">Available Balance</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="avail_bal" value="0" readonly disabled name="avail_bal" placeholder="Enter Available Balance" />
						</div>
					</div>
				</div>
			</div>
			<!-- <h4 class="text-center bg-body-secondary mt-4 fw-semibold p-3">END OF STATEMENT</h4> -->

			<div class="d-grid gap-2 mt-5">
				<button type="submit" class="btn btn-success btn-lg">Generate Statement</button>
			</div>
		</div>
	</form>

	<script>
		let balance = 0;
		let new_bal = 0;
		$(function() {
			$('.datepicker').datepicker({
				format: 'dd-M-yyyy',
				autoclose: true
			});
		});

		function moreAdd(tag) {
			let tds = $(tag).parents('tr').find('td');
			let withdraw = parseFloat($(tds[3]).find('input').val());
			let deposit = parseFloat($(tds[4]).find('input').val());
			if (deposit > 0 || withdraw > 0) {
				let tr = `<tr>
			<td>
				<input type="text" name="statement_date[]" class="form-control datepicker" placeholder="Select Date" aria-label="Select Date">
			</td>
			<td>
				<input type="text" class="form-control" name="ref[]" placeholder="Enter Ref/Check" aria-label="Enter Ref/Check">
			</td>
			<td>
				<input type="text" class="form-control" name="description[]" placeholder="Enter Description" aria-label="Enter Description">
			</td>
			<td>
				<input type="text" class="form-control" name="withdraw[]" placeholder="Enter Withdraw" aria-label="Enter Withdraw" onkeyup="javascript:accounts(this, 'w')">
			</td>
			<td>
				<input type="text" class="form-control" name="deposit[]" placeholder="Enter Deposit" aria-label="Enter Deposit" onkeyup="javascript:accounts(this, 'd')">
			</td>
			<td>
				<input type="text" class="form-control" name="balance[]" placeholder="Enter Balance" aria-label="Enter Balance">
			</td>
			<td>
				<!--<button type="button" onclick="javascript:delRow(this)" class="btn btn-danger btn-sm">Del</button>-->
				<button type="button" onclick="javascript:moreAdd(this)" class="btn btn-primary btn-sm">Add</button>
			</td>
		</tr>`;
				$('#more_row').append(tr);
				$(tag).remove();
				balance = new_bal;
			} else {
				alert('Must be input Withdraw/Deposit Amount then Next Row!')
			}

			$('.datepicker').datepicker({
				format: 'dd-M-yyyy',
				autoclose: true
			});
		}

		function delRow(tag) {
			// let e = $(tag).parents('tr').find('td');
			// let withdraw = parseFloat($(e[3]).find('input').val());
			// let deposit = parseFloat($(e[4]).find('input').val());
			// console.log(e)
			// console.log('withdraw', $(e[3]).find('input'))
			// console.log('deposit', $(e[4]).find('input'))
			$(tag).parents('tr').remove();
		}

		function opening_bal(tag) {
			balance = parseFloat($(tag).val());
			$(tag).attr('readonly', 'readonly');
			$('#avail_bal').val(balance);
		}

		function accounts(tag, type) {
			new_bal = 0;
			new_bal = balance;
			let tds = $(tag).parents('tr').find('td');
			let amt = parseFloat($(tag).val());
			let open_balance = $('#opending_bal').val();
			if (open_balance == "") {
				alert('Must be assign Opening Balance!');
			} else {
				if (type == 'w' && amt > 0) {
					$(tds[4]).find('input').attr('type', 'hidden');
					new_bal -= amt;
					setTotalWithdraw();
				}
				if (type == 'd' && amt > 0) {
					$(tds[3]).find('input').attr('type', 'hidden');
					new_bal += amt;
					setTotalDeposit();
				}
				$(tds[5]).find('input').val(new_bal.toFixed(2));
				$('#avail_bal').val(new_bal.toFixed(2));
			}

		}

		function setTotalWithdraw() {
			let total_withdraw = 0;
			$('#more_row').find('tr').each((i, e) => {
				let tds = $(e).find('td');
				let withdraw = parseFloat($(tds[3]).find('input').val());
				if (withdraw > 0) {
					total_withdraw += withdraw;
				}
			});
			$('#total_withdraw').text("Total Withdraws in BDT: " + total_withdraw.toFixed(2));
		}

		function setTotalDeposit() {
			let total_deposit = 0;
			$('#more_row').find('tr').each((i, e) => {
				let tds = $(e).find('td');
				let deposit = parseFloat($(tds[4]).find('input').val());
				if (deposit > 0) {
					total_deposit += deposit;
				}
			});
			$('#total_deposit').text("Total Deposits in BDT: " + total_deposit.toFixed(2));
		}
	</script>
</body>

</html>