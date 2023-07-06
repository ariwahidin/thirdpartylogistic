<table style="font-size: 10px;" class="table table-bordered table-striped" id="example">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal PO</th>
            <th>Life Time PO</th>
            <th>No. PO</th>
            <th>Customer Name</th>
            <th>Confirm</th>
            <th>LPB/BTB</th>
            <th>Remark</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($po->result() as $data) { ?>
            <tr data-tr-nopo="<?= $data->nopo ?>">
                <td><?= $no++ ?></td>
                <td><?= date("d/m/Y", strtotime($data->tglpo)) ?></td>
                <td><?= date("d/m/Y", strtotime($data->lifetimepo)) ?></td>
                <td><?= $data->nopo ?></td>
                <td><?= $data->namacust ?></td>
                <td class="td_confirm"><?= $data->confirm_date ?></td>
                <td class="td_noref"><?= $data->noref ?></td>
                <td class="td_remark"><?= $data->remark ?></td>
                <td>
                    <button onclick="loadModalDetail(this)" data-nopo="<?= $data->nopo ?>" class="btn <?= $data->is_confirm == 'y' ? 'btn-default' : 'btn-success'; ?>  btn-xs btnDetailConfirm" <?= $data->is_confirm == 'y' ? 'disabled' : ''; ?>><i class="fa fa-check"></i></button>
                    <button onclick="loadEdit(this)" data-nopo="<?= $data->nopo ?>" class="btn <?= $data->is_confirm != 'y' ? 'btn-default' : 'btn-primary'; ?> btn-xs btnEdit" <?= $data->is_confirm != 'y' ? 'disabled' : ''; ?>><i class="fa fa-edit"></i></button>
                    <button onclick="lihatDetail(this)" data-nopo="<?= $data->nopo ?>" class="btn btn-info btn-xs btnDetail"><i class="fa fa-eye"></i></button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#example').DataTable()
        loadingHide()
    })
</script>