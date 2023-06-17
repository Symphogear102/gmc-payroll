<!-- Payslip -->
<!-- <div class="modal fade" id="payslipModal">
    <div class="modal-dialog modal-xl modal-fullscreen-xl-down modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary"><b>Payslip</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body print-container">
                <form class="form-horizontal" method="POST">

                    <h2 align="center">GMC CORP</h2>
                    <h4 align="center" style="font-weight:bold;" id="display_employeeName"></h4>
                    <center>
                        <table id="payslip" cellspacing="0" cellpadding="5">
                            <div class="container-fluid">
                                <div class="row">

                                    <tr>
                                        <div class="col-md-4">
                                            <td class="info">Employee ID: </td>
                                            <td>&nbsp;<span id="display_employeeID"></span></td>
                                        </div>
                                        <div class="col-lg-9">
                                            <td>From - to: </td>
                                            <td> &nbsp;<span id="display_fromToDate"></span></td>
                                        </div>
                                    </tr>
                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-">
                                            <td>Basic Salary:</td>
                                            <td> &nbsp;<span id="display_basicSalary"></span></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Working Hour: </td>
                                            <td> &nbsp;<span id="display_workingHour"></span></td>
                                        </div>

                                    </tr>
                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-6 ">
                                            <td>Rate per Hour:</td>
                                            <td> &nbsp;<span id="display_hourlyRate"></span></td>

                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Overtime Hour: </td>
                                            <td>&nbsp;<span id="display_overTime"></td>
                                        </div>
                                    </tr>
                                </div>

                                <div class="row">
                                    <tr>
                                        <div class="col-md-4">
                                            <td>Over Time Rate:</td>
                                            <td>&nbsp;<span id="display_overTimeRate"></span></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Total Working Hour:</td>
                                            <td><b>&nbsp;<span id="display_totalWorkingHour"></span></td>
                                        </div>


                                    </tr>
                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-4">
                                            <td></td>
                                            <td></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Deduction:</td>
                                            <td>&nbsp;<span id="display_deduction"></span></td>
                                        </div>

                                    </tr>
                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-4">
                                            <td></td>
                                            <td></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td><b>Basic Pay:</b></td>
                                            <td><b>&nbsp;<span id="display_basicPay"></span></b></td>
                                        </div>

                                    </tr>
                                </div>

                            </div> -->

<!-- 
                        </table>
                    </center>
                    <hr> -->
<!-- </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary btn-flat" onclick="window.print();"><i class="fa fa-print"></i>Print</button>
                <button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- Payslip -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .print-container,
        .print-container * {
            visibility: visible;
        }
    }

    td {
        height: 50px;
        width: 130px;
        text-align: center;
    }
</style>
<div class="modal fade" id="payslipModal">
    <div class="modal-dialog modal-xl modal-fullscreen-xl-down modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary"><b>Payslip</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body print-container">
                <form class="form-horizontal" method="POST">

                    <h2 align="center">GMC CORP</h2>
                    <h4 align="center" style="font-weight:bold;" id="display_employeeName"></h4>
                    <center>
                        <table id="payslip" cellspacing="0" cellpadding="5">
                            <div class="container-fluid">
                                <div class="row">

                                    <tr>
                                        <div class="col-md-4">
                                            <td class="info">Employee ID: </td>
                                            <td>&nbsp;<span id="display_employeeID"></span></td>
                                        </div>
                                        <div class="col-lg-9">
                                            <td>From - to: </td>
                                            <td> &nbsp;<span id="display_fromToDate"></span></td>
                                        </div>
                                    </tr>

                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-">
                                            <td>Basic Salary:</td>
                                            <td> &nbsp;<span id="display_basicSalary"></span></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Working Hour: </td>
                                            <td> &nbsp;<span id="display_workingHour"></span></td>
                                        </div>

                                    </tr>
                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-6 ">
                                            <td>Rate per Hour:</td>
                                            <td> &nbsp;<span id="display_hourlyRate"></span></td>

                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Overtime Hour: </td>
                                            <td>&nbsp;<span id="display_overTime"></td>

                                        </div>

                                    </tr>
                                </div>

                                <div class="row">
                                    <tr>
                                        <div class="col-md-4">
                                            <td>Over Time Rate:</td>
                                            <td>&nbsp;<span id="display_overTimeRate"></span></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Total Working Hour:</td>
                                            <td><b>&nbsp;<span id="display_totalWorkingHour"></span></td>
                                        </div>

                                    </tr>
                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-4">
                                            <td></td>
                                            <td></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td>Deduction:</td>
                                            <td>&nbsp;<span id="display_deduction"></span></td>
                                        </div>

                                    </tr>
                                </div>
                                <div class="row">
                                    <tr>
                                        <div class="col-md-4">
                                            <td></td>
                                            <td></td>
                                        </div>
                                        <p></p>
                                        <div class="col-md-4 ms-auto">
                                            <td><b>Basic Pay:</b></td>
                                            <td><b>&nbsp;<span id="display_basicPay"></span></b></td>
                                        </div>

                                    </tr>
                                </div>

                            </div>

                        </table>
                    </center>
                    <hr>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary btn-flat" onclick="window.print();"><i class="fa fa-plus"></i>Print</button>
                <button type="button" class="btn btn-sm btn-danger btn-flat" data-bs-dismiss="modal"><i class="fa fa-ban"></i>Close</button>
                </form>
            </div>
        </div>
    </div>
</div>