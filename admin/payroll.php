<?php
include 'header.php';

?>
<div class="main-content">
    <div class="row ">
        <div class="container-fluid" style="width: 99%;">
            <h2 class="text-primary" style="font-family:Times, Times New Roman, serif;"> Payroll</h2>
        </div>
        <div class="card container-fluid bg-white rounded">
            <br>
            <hr>
            <form action="" method="POST" id="generatePayrollForm">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" style="font-family:Times, Times New Roman, serif;">From Date</label>
                            <input type="date" id="fromDate" name="fromDate" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" style="font-family:Times, Times New Roman, serif;">To Date</label>
                            <input type="date" id="toDate" name="toDate" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-primary" style="margin-top: 37px;" name="generatePayroll" id="generatePayroll"><i class="fa fa-eye"></i>&nbsp;Show</button>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-sm btn-flat " onclick="generate()"><i class="fa fa-print"></i> Payroll</button>
                    </div>
                </div>
            </form>
            <p></p>
            <table id="extra2" class="table table-hover">
                <thead>
                    <th style="visibility:collapse;" hidden> </th>
                    <th style="visibility:collapse;" hidden> </th>
                    <th style="text-align: center; vertical-align: middle;">Date</th>
                    <th style="text-align: center; vertical-align: middle;">Employee Name</th>
                    <th style="text-align: center; vertical-align: middle;">Employee ID</th>
                    <th style="text-align: center;">Working Hour</th>
                    <th style="text-align: center;">OT</th>
                    <th style="text-align: center; vertical-align: middle;">Deduction</th>
                    <th style="text-align: center; vertical-align: middle;">Basic pay</th>
                    <th style="text-align:center;">Tool</th>
                    <th style="visibility:collapse;" hidden> </th>
                    <th style="visibility:collapse;" hidden> </th>
                </thead>

                <tbody id="result">
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include 'modal/payslip_modal.php';
    include 'footer.php';
    ?>