<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Statement Generator</title>
	<link href="<?=site_url('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?=site_url('assets/bootstrap-5.3.3-dist/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">

	<script src="<?=site_url('assets/js/jquery-3.7.1.slim.min.js') ?>"></script>
	<script src="<?=site_url('assets/bootstrap-5.3.3-dist/js/bootstrap-datepicker.min.js') ?>"></script>
</head>

<body>

	<form action="<?= site_url('welcome/save_ddbl')?>" method="post">
		<div class="container mt-4">
			<img src="<?=site_url('assets/images/ddbl.png') ?>" width="320px" />
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
					<div class="row mb-3">
						<label for="City" class="col-sm-2 col-form-label">City</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="City" name="city" placeholder="Enter City" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="Country" class="col-sm-2 col-form-label">Country</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="Country" name="country" placeholder="Enter Country" />
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row mb-3">
						<label for="acc_number" class="col-sm-4 col-form-label bolder">Account Number</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="acc_number" name="acc_number" placeholder="Enter Account Number" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="cust_id" class="col-sm-4 col-form-label bolder">Customer ID</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="cust_id" name="cust_id" placeholder="Enter Customer ID" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="acc_type" class="col-sm-4 col-form-label bolder">Account Type</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="acc_type" name="acc_type" readonly disabled value="High Value Savings" placeholder="Enter Account Type" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="currency" class="col-sm-4 col-form-label bolder">Currency</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="currency" name="currency" readonly disabled value="BDT" placeholder="Select Currency" />
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-md-12">
					<p class="mb-4 text-center">
						STATEMENT OF ACCOUNT FOR THE PERIOD:
						<input type="text" name="state_from_date" class="datepicker-full" />
						TO:
						<input type="text" name="state_till_date" class="datepicker-full" />
					</p>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>DATE</th>
								<th>PARTICULARS</th>
								<th>CHQ.NO</th>
								<th>Withdraw</th>
								<th>Deposit</th>
								<th>Balance</th>
								<th>Action</th>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td>Balance Forward</td>
								<td></td>
								<td>0.00</td>
								<td>0.00</td>
								<td>
								<input type="text" class="form-control" id="opending_bal" onchange="javascript:opening_bal(this)" name="opending_bal" placeholder="Enter Opening Balance" />
								</td>
								<td></td>
							</tr>
						</thead>
						<tbody id="more_row">
							<tr>
								<td>1</td>
								<td>
									<input type="text" name="statement_date[]" class="form-control datepicker" placeholder="Select Date" aria-label="Select Date">
								</td>
								<td>
									<input type="text" class="form-control" name="particulars[]" placeholder="Enter Particulars" aria-label="Enter Particulars">
								</td>
								<td>
									<input type="text" class="form-control" name="chq[]" placeholder="Enter CHQ.NO" aria-label="Enter CHQ.NO">
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
						<tfoot>
							<tr>
								<th colspan="4"></th>
								<th id="total_withdraw"></th>
								<th id="total_deposit"></th>
								<th id="avail_bal"></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>

			<div class="d-grid gap-2 mt-5">
				<button type="submit" class="btn btn-success btn-lg">Generate Statement</button>
			</div>
		</div>
	</form>

	<script>
		let ids = 1;
		let balance = 0;
		let new_bal = 0;
		$(function() {
			$('.datepicker').datepicker({
				format: 'dd-M-yyyy',
				autoclose: true
			});
			$('.datepicker-full').datepicker({
				format: 'MM dd, yyyy',
				autoclose: true
			});
		});

		function moreAdd(tag) {
			let tds = $(tag).parents('tr').find('td');
			let withdraw = parseFloat($(tds[4]).find('input').val());
			let deposit = parseFloat($(tds[5]).find('input').val());
			if (deposit > 0 || withdraw > 0) {
				let tr = `<tr>
				<td>`+ (++ids) +`</td>
			<td>
				<input type="text" name="statement_date[]" class="form-control datepicker" placeholder="Select Date" aria-label="Select Date">
			</td>
			<td>
				<input type="text" class="form-control" name="particulars[]" placeholder="Enter Particulars" aria-label="Enter Particulars">
			</td>
			<td>
				<input type="text" class="form-control" name="chq[]" placeholder="Enter CHQ.NO" aria-label="Enter CHQ.NO">
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
			// let withdraw = parseFloat($(e[4]).find('input').val());
			// let deposit = parseFloat($(e[5]).find('input').val());
			// console.log(e)
			// console.log('withdraw', $(e[4]).find('input'))
			// console.log('deposit', $(e[5]).find('input'))
			$(tag).parents('tr').remove();
		}

		function opening_bal(tag) {
			balance = parseFloat($(tag).val());
			$(tag).attr('readonly', 'readonly');
			$('#avail_bal').text(balance);
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
					$(tds[5]).find('input').attr('type', 'hidden');
					new_bal -= amt;
					setTotalWithdraw();
				}
				if (type == 'd' && amt > 0) {
					$(tds[4]).find('input').attr('type', 'hidden');
					new_bal += amt;
					setTotalDeposit();
				}
				$(tds[6]).find('input').val(new_bal.toFixed(2));
				$('#avail_bal').text(new_bal.toFixed(2));
			}

		}

		function setTotalWithdraw() {
			let total_withdraw = 0;
			$('#more_row').find('tr').each((i, e) => {
				let tds = $(e).find('td');
				let withdraw = parseFloat($(tds[4]).find('input').val());
				if (withdraw > 0) {
					total_withdraw += withdraw;
				}
			});
			$('#total_withdraw').text(total_withdraw.toFixed(2));
		}

		function setTotalDeposit() {
			let total_deposit = 0;
			$('#more_row').find('tr').each((i, e) => {
				let tds = $(e).find('td');
				let deposit = parseFloat($(tds[5]).find('input').val());
				if (deposit > 0) {
					total_deposit += deposit;
				}
			});
			$('#total_deposit').text(total_deposit.toFixed(2));
		}
	</script>
</body>

</html>