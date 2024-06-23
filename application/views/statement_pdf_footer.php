<?php
$balance = $opending_bal;
$total_withdraw = 0;
$total_deposit = 0;
if (!empty($statement_date) && count($statement_date) > 0) {
    foreach ($statement_date as $key => $s_date) {
        if ($withdraw[$key] > 0) {
            $balance -=  $withdraw[$key];
            $total_withdraw += $withdraw[$key];
        }

        if ($deposit[$key] > 0) {
            $balance +=  $deposit[$key];
            $total_deposit += $deposit[$key];
        }
    }
}
?>

<table style="width: 100%;">
    <tr>
        <td style="padding: 2px;">
            <p style="font-family: `Times New Roman`, Times, serif;font-weight: normal;font-size: 12px;">Total Withdraws in BDT: <?= number_format($total_withdraw, 2) ?></p>
        </td>
        <td style="text-align: right;padding: 2px;">
            <p style="font-family: `Times New Roman`, Times, serif;font-weight: normal;font-size: 12px;">Opening Balance: <?= number_format($opending_bal, 2) ?></p>
        </td>
    </tr>
    <tr>
        <td style="padding: 2px;">
            <p style="font-family: `Times New Roman`, Times, serif;font-weight: normal;font-size: 12px;">Total Deposits in BDT: <?= number_format($total_deposit, 2) ?></p>
        </td>
        <td style="text-align: right;padding: 2px;">
            <p style="font-family: `Times New Roman`, Times, serif;font-weight: normal;font-size: 12px;">Available Balance: <?= number_format($balance, 2) ?></p>
        </td>
    </tr>
</table>
<h3 style="background-color: rgb(233, 236, 239) !important;padding: 8px;text-align: center;font-style: italic;font-weight: 400;font-size: 14px;">END OF STATEMENT</h3>

<div style="text-align: right; font-size: 10px;margin-top:80px;">
    {PAGENO}/{nb}
</div>
