<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<?php $balance = $opending_bal; ?>
<?php $total_withdraw = 0; ?>
<?php $total_deposit = 0; ?>
<?php if (!empty($statement_date) && count($statement_date) > 0) : ?>
    <?php foreach ($statement_date as $key => $s_date) : ?>
    <?php
        if ($withdraw[$key] > 0) {
            $balance -=  $withdraw[$key];
            $total_withdraw += $withdraw[$key];
        }

        if ($deposit[$key] > 0) {
            $balance +=  $deposit[$key];
            $total_deposit += $deposit[$key];
        }
    ?>
    <?php endforeach; ?>
<?php endif; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Statement</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: normal;
            font-size: 12px;
            word-spacing: 1px;
        }
    </style>
</head>

<body style="width: 100%;">
    <div style="width: 95%;margin: 0 auto;">
        <div style="width: 100%;">
            <div style="width: 60%;float: left;">
                <p style="margin-bottom:12px;margin-top:25px;font-weight: bold;"><?= $name ?></p>
                <p style="margin: 0;color: #404044;width: 70%;"><?= $address ?></p>
                <p style="margin: 0;color: #404044;"><?= $city ?></p>
                <p style="margin: 0;color: #404044;"><?= $country ?></p>

                <p style="margin-bottom:12px;margin-top:25px;font-weight: bold;">Account Summary</p>
                <table style="width: 80%;margin: 0;padding: 0;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="color: #404044;margin: 0;padding: 0;text-align: left;">Opening Balance</td>
                        <td style="color: #404044;margin: 0;padding: 0;text-align: right;"><?= number_format($opending_bal, 2);?></td>
                    </tr>
                    <tr>
                        <td style="color: #404044;margin: 0;padding: 0;text-align: left;">Withdrawals</td>
                        <td style="color: #404044;margin: 0;padding: 0;text-align: right;"><?= number_format($total_withdraw, 2)?></td>
                    </tr>
                    <tr>
                        <td style="color: #404044;margin: 0;padding: 0 0 4px;text-align: left;">Deposits</td>
                        <td style="color: #404044;margin: 0;padding: 0 0 4px;text-align: right;"><?= number_format($total_deposit, 2)?></td>
                    </tr>
                    <tr>
                        <th style="border: 1px dotted;border-left: 0; border-right: 0;color: #404044;margin: 0;padding: 5px 0;text-align: left;">Closing Balance on <?= date('M d', strtotime($state_till_date))?></th>
                        <th style="border: 1px dotted;border-left: 0; border-right: 0;color: #404044;margin: 0;padding: 5px 0;text-align: right;">BDT <?= number_format($balance, 2)?></th>
                    </tr>
                </table>
            </div>
            <div style="width: 40%;float: left;margin-top:25px;">
                <p style="margin: 0 0 14px;color: #404044;">For <?= strtoupper($state_from_date) ?> to <?= strtoupper($state_till_date) ?></p>
                <table style="width: 100%;margin: 0;">
                    <tr>
                        <th style="text-align: left;">Account Number</th>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><p style="margin: 0 0 12px;color: #404044;"><?= $acc_number ?></p></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Customer ID</th>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><p style="margin: 0 0 12px;color: #404044;"><?= $cust_id ?></p></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <th style="text-align: left;">Account Type</th>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><p style="margin: 0 0 12px;color: #404044;">Savings Account</p></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Currency</th>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><p style="margin: 0 0 12px;color: #404044;">Bangladeshi Taka - BDT</p></td>
                    </tr>
                </table>
                <p style="margin-top:15px;margin-bottom: 0;line-height: 16px;font-weight: bold;">Contact Information</p>
                <p style="text-align: justify;margin: 0;color: #404044;line-height: 16px;">09612322001, 09612007004</p>
                <p style="text-align: justify;margin: 0;color: #404044;line-height: 16px;">Contact us by phone or questions</p>
                <p style="text-align: justify;margin: 0;color: #404044;line-height: 16px;">on this statement, change of</p>
                <p style="text-align: justify;margin: 0;color: #404044;line-height: 16px;">personal information and general</p>
                <p style="margin: 0;color: #404044;line-height: 16px;">inquiries.</p>
            </div>
        </div>
        <div style="margin-top: 12px;">
            <h3 style="text-align: left;font-size: 12px;margin-bottom: 4px;">Your Transaction Details</h3>
            <table style="width: 100%;margin-top: 12px;font-size: 10px;border-collapse: collapse;" cellspacing="0" border="0">
            <tbody>
                <tr>
                    <th style="border: 1px solid;padding: 4px 6px;font-size: 10px;border-right: 0;width: 10%;">DATE</th>
                    <th style="border: 1px solid;padding: 4px 6px;font-size: 10px;border-right: 0;">CHQ.NO</th>
                    <th style="border: 1px solid;padding: 4px 6px;font-size: 10px;border-right: 0;">PARTICULARS</th>
                    <th style="text-align: right;border: 1px solid;padding: 4px 6px;font-size: 10px;border-right: 0;">WITHDRAW</th>
                    <th style="text-align: right;border: 1px solid;padding: 4px 6px;font-size: 10px;border-right: 0;">DEPOSIT</th>
                    <th style="text-align: right;border: 1px solid;padding: 4px 6px;font-size: 10px;">BALANCE</th>
                </tr>

                <tr>
                    <td style="border: 1px solid;padding: 4px;text-align: center;border-right: 0;"></td>
                    <td style="border: 1px solid;padding: 4px;border-right: 0;"></td>
                    <td style="border: 1px solid;padding: 4px;border-right: 0;">OPENING BALANCE</td>
                    <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;">0.00</td>
                    <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;">0.00</td>
                    <td style="border: 1px solid;padding: 4px;text-align: right;"><?= number_format($opending_bal, 2)?></td>
                </tr>
                <?php $balance = $opending_bal; ?>
                <?php $total_withdraw = 0; ?>
                <?php $total_deposit = 0; ?>
                <?php if (!empty($statement_date) && count($statement_date) > 0) : ?>
                    <?php foreach ($statement_date as $key => $s_date) : ?>
                        <tr>
                            <td style="border: 1px solid;padding: 4px;text-align: center;border-right: 0;"><?= $s_date ?></td>
                            <td style="border: 1px solid;padding: 4px;border-right: 0;"><?= $chq[$key] ?></td>
                            <td style="border: 1px solid;padding: 4px;border-right: 0;"><?= $particulars[$key] ?></td>
                            <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;"><?= !empty($withdraw[$key]) ? number_format($withdraw[$key], 2) : '' ?></td>
                            <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;"><?= !empty($deposit[$key]) ? number_format($deposit[$key], 2) : '' ?></td>
                            <td style="border: 1px solid;padding: 4px;text-align: right;">
                                <?php
                                if ($withdraw[$key] > 0) {
                                    $balance -=  $withdraw[$key];
                                    $total_withdraw += $withdraw[$key];
                                }

                                if ($deposit[$key] > 0) {
                                    $balance +=  $deposit[$key];
                                    $total_deposit += $deposit[$key];
                                }
                                echo number_format($balance, 2);
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

                <tr>
                    <td style="border: 1px solid;padding: 4px;text-align: center;border-right: 0;"><?= $s_date ?></td>
                    <td style="border: 1px solid;padding: 4px;border-right: 0;"></td>
                    <td style="border: 1px solid;padding: 4px;border-right: 0;">TOTAL TRANSACTION AMOUNT</td>
                    <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;"><?= number_format($total_withdraw, 2)?></td>
                    <td style="border: 1px solid;padding: 4px;text-align: right;border-right: 0;"><?= number_format($total_deposit, 2)?></td>
                    <td style="border: 1px solid;padding: 4px;text-align: right;"><?= number_format($balance, 2)?></td>
                </tr>
            </tbody>
        </table>
        </div>

        <div style="width: 80%;margin: 0 auto;margin-top: 120px;">
            <p style="padding: 8px;text-align: center;font-weight: normal;font-size: 12px;">***END OF THE STATEMENT***</p>
        </div>
    </div>
</body>

</html>