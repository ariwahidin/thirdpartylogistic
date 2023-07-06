<div class="modal fade" id="detailPo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail PO : <strong><?= $po->row()->nopo ?></strong></h4>
            </div>
            <div class="modal-body">
                <div class="invoice">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- <h2 class="page-header">
                                <i class="fa fa-globe"></i> AdminLTE, Inc.
                                <small class="pull-right">Date: 2/10/2014</small>
                            </h2> -->
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-8 invoice-col">
                            <address>
                                Customer Name : <strong><?= $po->row()->namacust ?></strong><br>
                                Tgl. PO : <strong><?= date('d/m/Y', strtotime($po->row()->tglpo)) ?></strong><br>
                                Life time PO : <strong><?= date('d/m/Y', strtotime($po->row()->lifetimepo)) ?></strong><br>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <address>
                                Confirm : <strong><?= $po->row()->confirm_date != null ? date('d/m/Y', strtotime($po->row()->confirm_date)) : '' ?></strong><br>
                                No. LBP/BT : <strong><?= $po->row()->noref ?></strong><br>
                            </address>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Product</th>
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1;
                                    foreach ($item->result() as $data) { ?>
                                        <tr>
                                            <td><?= $num++ ?></td>
                                            <td><?= $data->kodeproduk ?></td>
                                            <td><?= $data->namaproduk ?></td>
                                            <td><?= number_format($data->Quantity) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <!-- <p class="lead">Payment Methods:</p>
                            <img src="../../dist/img/credit/visa.png" alt="Visa">
                            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                            <img src="../../dist/img/credit/american-express.png" alt="American Express">
                            <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <strong>Remark</strong> : <br> <?= $po->row()->remark ?>
                            </p>
                        </div>
                        <div class="col-xs-6">
                            <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                            <!-- <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>$250.30</td>
                                    </tr>
                                    <tr>
                                        <th>Tax (9.3%)</th>
                                        <td>$10.34</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                </table>
                            </div> -->
                        </div>
                    </div>
                    <div class="row no-print">
                        <!-- <div class="col-xs-12">
                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                            </button>
                            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    $('#detailPo').modal('show')
</script>