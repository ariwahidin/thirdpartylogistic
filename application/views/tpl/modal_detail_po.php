<div class="modal flip" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PO Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. PO</th>
                            <th>Kode Product</th>
                            <th>Item Name</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 1;
                        foreach ($detail->result() as $data) { ?>
                            <tr>
                                <td><?= $num++ ?></td>
                                <td><?= $data->nopo ?></td>
                                <td><?= $data->kodeproduk ?></td>
                                <td><?= $data->namaproduk ?></td>
                                <td><?= number_format($data->Quantity) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" data-no-po="<?=$detail->row()->nopo?>" onclick="loadConfirm(this)" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#modal-default').modal('show')
        loadingHide()
    })
</script>