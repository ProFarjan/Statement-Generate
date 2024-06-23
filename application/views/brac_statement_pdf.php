<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Statement</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: normal;
        }
    </style>
</head>

<body style="width: 100%;">
    <div>
        <img src="assets/images/brac_bank.png" width="376" />
    </div>
    <div style="width: 100%;margin-top: 10px;">
        <div style="width: 60%;float: left;">
            <p style="font-size: 14px;margin-bottom:4px;line-height: 22px;font-weight: 900;"><?= $name ?></p>
            <p style="margin: 0;"><?= $address ?></p>
            <p style="margin: 0;">REF: <?= $reff ?></p>
        </div>
        <div style="width: 40%;float: left;text-align: right;margin-top: 8px;">
            <table style="width: 100%;" class="text-align: right;">
                <tr>
                    <td style="text-align: left;font-size: 14px;">Customer ID: <?= $cust_id ?></td>
                    <td style="text-align: left;font-size: 14px;">:</td>
                    <td style="text-align: left;font-size: 14px;"><?= $cust_id ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;font-size: 14px;">Account Number</td>
                    <td style="text-align: left;font-size: 14px;">:</td>
                    <td style="text-align: left;font-size: 14px;"><?= $acc_number ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;font-size: 14px;">Account Type</td>
                    <td style="text-align: left;font-size: 14px;">:</td>
                    <td style="text-align: left;font-size: 14px;">High Value Savings</td>
                </tr>
                <tr>
                    <th style="text-align: left;font-size: 14px;">Issue Date</th>
                    <th style="text-align: left;font-size: 14px;">:</th>
                    <th style="text-align: left;font-size: 14px;"><?= $i_date ?></th>
                </tr>
                <tr>
                    <td style="text-align: left;font-size: 14px;">Currency</td>
                    <td style="text-align: left;font-size: 14px;">:</td>
                    <td style="text-align: left;font-size: 14px;">BDT</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-top: 26px;">
        <h3 style="text-align: left;font-size: 14px;">STATEMENT OF ACCOUNT FOR THE PERIOD <?= $state_from_date ?> TO <?= $state_till_date ?></h3>
        <table style="width: 100%;margin-top: 12px;font-size: 12px;" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th style="border-top: 1px dashed;padding: 4px 6px;font-size: 14px;border-bottom: 1px dashed;">DATE</th>
                    <th style="border-top: 1px dashed;padding: 4px 6px;font-size: 14px;border-bottom: 1px dashed;">PARTICULARS</th>
                    <th style="border-top: 1px dashed;padding: 4px 6px;font-size: 14px;border-bottom: 1px dashed;">CHQ.NO</th>
                    <th style="border-top: 1px dashed;padding: 4px 6px;font-size: 14px;border-bottom: 1px dashed;">Withdraw</th>
                    <th style="border-top: 1px dashed;padding: 4px 6px;font-size: 14px;border-bottom: 1px dashed;">Deposit</th>
                    <th style="border-top: 1px dashed;padding: 4px 6px;font-size: 14px;border-bottom: 1px dashed;">Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php $balance = $opending_bal; ?>
                <?php if (!empty($statement_date) && count($statement_date) > 0) : ?>
                    <?php foreach ($statement_date as $key => $s_date) : ?>
                        <tr>
                            <td style="padding: 4px;text-align: center;border-right: 0;border-top:0;"><?= $s_date ?></td>
                            <td style="padding: 4px;border-right: 0;border-top:0;"><?= $particulars[$key] ?></td>
                            <td style="padding: 4px;border-right: 0;border-top:0;"><?= $chq[$key] ?></td>
                            <td style="padding: 4px;text-align: right;border-right: 0;border-top:0;"><?= !empty($withdraw[$key]) ? number_format($withdraw[$key], 2) : '' ?></td>
                            <td style="padding: 4px;text-align: right;border-right: 0;border-top:0;"><?= !empty($deposit[$key]) ? number_format($deposit[$key], 2) : '' ?></td>
                            <td style="padding: 4px;text-align: right;border-top:0;">
                                <?php
                                if ($withdraw[$key] > 0) {
                                    $balance -=  $withdraw[$key];
                                }

                                if ($deposit[$key] > 0) {
                                    $balance +=  $deposit[$key];
                                }
                                echo number_format($balance, 2);
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>