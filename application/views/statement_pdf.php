<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Statement</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-weight: normal;
        }
    </style>
</head>

<body style="width: 100%;">
    <div>
        <img src="assets/images/logo.png" width="205" />
    </div>
    <div style="width: 100%;margin-top: 20px;">
        <div style="width: 50%;float: left;">
            <h2 style="font-size: 14px;text-decoration: underline;margin-bottom:4px;line-height: 22px;"><?= $name ?></h2>
            <p style="margin: 0;"><?= $address ?></p>
        </div>
        <div style="width: 50%;float: left;text-align: right;margin-top: 8px;">
            <table style="width: 100%;" class="text-align: right;">
                <tr>
                    <th style="font-size: 17px;text-decoration: underline;margin-bottom:4px;text-align: right;">Statement Print Date: <?= $p_date ?></th>
                </tr>
                <tr>
                    <td style="text-align: right;font-size: 14px;">Account Number: <?= $acc_number ?></td>
                </tr>
                <tr>
                    <td style="text-align: right;font-size: 14px;">Account Type: HIGH VALUE SAVINGS A/C</td>
                <tr>
                    <td style="text-align: right;font-size: 14px;">Customer Number: <?= $cust_number ?></td>
                </tr>
                <tr>
                    <td style="text-align: right;font-size: 14px;">Currency: BDT</td>
                </tr>
                <tr>
                    <td style="text-align: right;font-size: 14px;">Status: Active</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-top: 26px;">
        <h3 style="text-align: center;font-size: 14px;">Account Statement from Date: <?= $state_from_date ?> Till Date: <?= $state_till_date ?></h3>
        <table style="width: 100%;margin-top: 12px;font-size: 12px;" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th style="border: 1px solid;padding: 4px 6px;background-color: #dcdcdc;font-size: 14px;border-right: 0;">Date</th>
                    <th style="border: 1px solid;padding: 4px 6px;background-color: #dcdcdc;font-size: 14px;border-right: 0;">Ref/Check</th>
                    <th style="border: 1px solid;padding: 4px 6px;background-color: #dcdcdc;font-size: 14px;border-right: 0;">Description</th>
                    <th style="border: 1px solid;padding: 4px 6px;background-color: #dcdcdc;font-size: 14px;border-right: 0;">Withdraw</th>
                    <th style="border: 1px solid;padding: 4px 6px;background-color: #dcdcdc;font-size: 14px;border-right: 0;">Deposit</th>
                    <th style="border: 1px solid;padding: 4px 6px;background-color: #dcdcdc;font-size: 14px;">Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php $balance = $opending_bal; ?>
                <?php if (!empty($statement_date) && count($statement_date) > 0) : ?>
                    <?php foreach ($statement_date as $key => $s_date) : ?>
                        <tr>
                            <td style="border: 1px solid;padding: 4px;text-align: center;border-right: 0;border-top:0;"><?= $s_date ?></td>
                            <td style="border: 1px solid;padding: 4px;border-right: 0;border-top:0;"><?= $ref[$key] ?></td>
                            <td style="border: 1px solid;padding: 4px;border-right: 0;border-top:0;"><?= $description[$key] ?></td>
                            <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;border-top:0;"><?= !empty($withdraw[$key]) ? number_format($withdraw[$key], 2) : '' ?></td>
                            <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;border-top:0;"><?= !empty($deposit[$key]) ? number_format($deposit[$key], 2) : '' ?></td>
                            <td style="border: 1px solid;padding: 4px;text-align: right;border-top:0;">
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