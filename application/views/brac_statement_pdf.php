<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Statement</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-weight: normal;
            font-size: 12px;
            word-spacing: 2px;
        }
    </style>
</head>

<body style="width: 100%;">
    <div style="width: 100%;">
        <div style="width: 60%;float: left;">
            <img src="assets/images/brac_bank.png" width="376" />
            <p style="margin-bottom:12px;margin-top:25px;font-weight: bold;"><?= $name ?></p>
            <p style="margin: 0;color: #404044;"><?= $address ?></p>
            <p style="margin: 0;color: #404044;"><?= $state ?></p>
            <p style="margin: 0;color: #404044;"><?= $city ?></p>
            <p style="margin: 0;color: #404044;"><?= $country ?></p>
            <p style="margin-top: 56px;font-weight: bold;">REF: &emsp; <?= $reff ?></p>
        </div>
        <div style="width: 40%;float: left;">
            <br/>
            <div style="width: 100%;margin-left: 50px;">
                <p style="margin: 0;word-spacing: -3px;line-height: 14px;letter-spacing: 0px;">BRAC Bank PLC.</p>
                <p style="margin: 0;word-spacing: -3px;line-height: 14px;letter-spacing: 0px;">Anik Tower</p>
                <p style="margin: 0;word-spacing: -3px;line-height: 14px;letter-spacing: 0px;">220/B, Tejgaon Gulshan Link Road</p>
                <p style="margin: 0;word-spacing: -3px;line-height: 14px;letter-spacing: 0px;">Tejgaon, Dhaka 1208, Bangladesh</p>
                <table style="margin: 6px 0;width: 100%;">
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>+88 02 8801301-32,</td>
                    </tr>
                    <tr>
                        <td>Fax</td>
                        <td>:</td>
                        <td>+88 02 9898910</td>
                    </tr>
                    <tr>
                        <td>SWIFT</td>
                        <td>:</td>
                        <td>BRAKBDDH</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>:</td>
                        <td>enquiry@bracbank.com</td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td>:</td>
                        <td>www.bracbank.com</td>
                    </tr>
                </table>
            </div>
            <table style="width: 100%;">
                <tr>
                    <td width="40%">Customer ID</td>
                    <td>:</td>
                    <td><?= $cust_id ?></td>
                </tr>
                <tr>
                    <td>Account Number</td>
                    <td>:</td>
                    <td><?= $acc_number ?></td>
                </tr>
                <tr>
                    <td>Account Type</td>
                    <td>:</td>
                    <td>High Value Savings</td>
                </tr>
                <tr>
                    <td>Currency</td>
                    <td>:</td>
                    <td>BDT</td>
                </tr>
                <tr>
                    <td>Issue Date</td>
                    <td>:</td>
                    <td><?= $i_date ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-top: 12px;">
        <h3 style="text-align: left;font-size: 12px;">STATEMENT OF ACCOUNT FOR THE PERIOD &emsp;&emsp; <?= $state_from_date ?> TO <?= $state_till_date ?></h3>
        <table style="width: 100%;margin-top: 12px;font-size: 10px;" cellspacing="2" border="0">
            <thead>
                <tr>
                    <th style="text-align: left;border-top: 1px dashed;padding: 8px 0;font-size: 12px;border-bottom: 1px dashed;width: 10%;">DATE</th>
                    <th style="text-align: left;border-top: 1px dashed;padding: 8px 0;font-size: 12px;border-bottom: 1px dashed;">PARTICULARS</th>
                    <th style="text-align: left;border-top: 1px dashed;padding: 8px 0;font-size: 12px;border-bottom: 1px dashed;width: 10%;">CHQ.NO</th>
                    <th style="text-align: right;border-top: 1px dashed;padding: 8px 0;font-size: 12px;border-bottom: 1px dashed;width: 15%;">Withdraw</th>
                    <th style="text-align: right;border-top: 1px dashed;padding: 8px 0;font-size: 12px;border-bottom: 1px dashed;width: 15%;">Deposit</th>
                    <th style="text-align: right;border-top: 1px dashed;padding: 8px 0;font-size: 12px;border-bottom: 1px dashed;width: 15%;">Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px 0;text-align: left;border-right: 0;border-top:0;"></td>
                    <td style="padding: 8px 0;text-align: left;border-right: 0;border-top:0;">Balance Forward</td>
                    <td style="padding: 8px 0;text-align: left;border-right: 0;border-top:0;"></td>
                    <td style="padding: 8px 0;text-align: right;border-right: 0;border-top:0;">0.00</td>
                    <td style="padding: 8px 0;text-align: right;border-right: 0;border-top:0;">0.00</td>
                    <td style="padding: 8px 0;text-align: right;border-right: 0;border-top:0;"><?= number_format($opending_bal, 2)?></td>
                </tr>
                <?php $balance = $opending_bal; ?>
                <?php $total_withdraw = 0; ?>
                <?php $total_deposit = 0; ?>
                <?php if (!empty($statement_date) && count($statement_date) > 0) : ?>
                    <?php foreach ($statement_date as $key => $s_date) : ?>
                        <tr>
                            <td style="padding: 8px 0;text-align: left;border-right: 0;border-top:0;"><?= $s_date ?></td>
                            <td style="padding: 8px 0;text-align: left;border-right: 0;border-top:0;"><?= $particulars[$key] ?></td>
                            <td style="padding: 8px 0;border-right: 0;border-top:0;ext-align: left;"><?= $chq[$key] ?></td>
                            <td style="padding: 8px 0;text-align: right;border-right: 0;border-top:0;"><?= !empty($withdraw[$key]) ? number_format($withdraw[$key], 2) : '0.00' ?></td>
                            <td style="padding: 8px 0;text-align: right;border-right: 0;border-top:0;"><?= !empty($deposit[$key]) ? number_format($deposit[$key], 2) : '0.00' ?></td>
                            <td style="padding: 8px 0;text-align: right;border-top:0;">
                                <?php
                                    if ($withdraw[$key] > 0) {
                                        $balance -=  $withdraw[$key];
                                        $total_withdraw += $withdraw[$key];
                                    } else if ($deposit[$key] > 0) {
                                        $total_deposit += $deposit[$key];
                                        $balance +=  $deposit[$key];
                                    }
                                    echo number_format($balance, 2);
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="padding: 8px 0;text-align: right;border-right: 0;border-top: 2px solid;"><?= number_format($total_withdraw, 2) ?></td>
                            <td style="padding: 8px 0;text-align: right;border-right: 0;border-top: 2px solid;"><?= number_format($total_deposit, 2) ?></td>
                            <td style="padding: 8px 0;text-align: right;border-right: 0;border-top: 2px solid;">
                                <?=number_format($balance, 2); ?>
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>

    <div style="width: 80%;margin: 0 auto;margin-top: 120px;">
        <p style="padding: 8px;text-align: left;font-weight: normal;font-size: 12px;">This Electronic Statement is valid without signature.</p>
        <h3 style="padding: 8px;text-align: left;font-weight: bold;font-size: 12px;">Please advice the bank of any discrepancies within 14 days from the date of receipt of this
        statement. Otherwise this statement will be considered correct.</h3>
        <p style="padding: 8px;text-align: center;font-weight: normal;font-size: 12px;">***END OF THE STATEMENT***</p>
    </div>
</body>

</html>