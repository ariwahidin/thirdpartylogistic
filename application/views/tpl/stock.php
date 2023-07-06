<section class="content-header">
    <h1>
        Stock
        <small>Data Stock Product</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stock</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header"></div>
                <div class="box-body table-responsive">
                    <table style="font-size: 12px;" class="table table-responsive table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 200px;">Whs Name</th>
                                <th style="width: 100px;">Item Code</th>
                                <th>Item Name</th>
                                <th>OnHand</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($stock->result() as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->whsname ?></td>
                                    <td><?= $data->itemcode ?></td>
                                    <td><?= $data->ItemName ?></td>
                                    <td><?= number_format($data->OnHand) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>