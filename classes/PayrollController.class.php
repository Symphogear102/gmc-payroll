<?php

class PayrollController extends Payroll
{
    public function generatePayroll()
    {
        extract($_REQUEST);
        if (isset($submit) && $submit == "generatePayroll") {
            $payroll = new PayrollView();
            $generatePayroll = $payroll->displayPayroll($fromDate, $toDate);
            return $generatePayroll;
        }
    }
}
