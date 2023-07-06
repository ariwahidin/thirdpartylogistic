<script>
    loadingShow()
</script>
<style>
    .custom-textarea {
        width: 250px;
        height: 150px;
        /* Menentukan lebar textarea */
    }

    .custom-input {
        width: 250px;
        /* Menentukan lebar textarea */
    }
</style>
<section class="content-header">
    <h1>
        Purchase Order
        <small>Data Purchase Order</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Order</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header"></div>
                <div class="box-body table-responsive" id="box-table-po">
                    <?php $this->view('tpl/table_po') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="modalDetail"></div>
<div id="lihatDetail"></div>
<script>
    // $('.btnDetail').on('click', function() {
    //     loadingShow()
    //     let nopo = $(this).data('nopo')
    //     $('#modalDetail').load("<?= base_url('tpl/detail') ?>", {
    //         nopo
    //     })
    // })

    function loadModalDetail(button) {
        loadingShow()
        let nopo = $(button).data('nopo')
        $('#modalDetail').load("<?= base_url('tpl/detail') ?>", {
            nopo
        })
    }

    function validate(input1, input2, nopo) {
        let result = false;
        $.ajax({
            url: "<?= base_url('tpl/validate') ?>",
            async: false,
            data: {
                noref: input1,
                remark: input2,
                nopo: nopo
            },
            method: "POST",
            dataType: "JSON",
            success: function(response) {
                // console.log(response)
                if (response.success == true) {
                    result = true
                } else {
                    result = false
                }
            },
            error: function(error) {
                console.log(error)
            }
        })
        return result
    }

    function loadConfirm(button) {

        const nopo = $(button).data('no-po')
        var row = $(button).parent()

        Swal.fire({
            title: 'Confirm?',
            html: '<input id="inputnopo"  class="swal2-input custom-input" value="' + nopo + '" readonly><br>' +
                '<input id="input1"  class="swal2-input custom-input" placeholder="No LBP/BT"><br>' +
                '<textarea  id="input2" class="swal2-input custom-textarea" placeholder="Remark">',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            showLoaderOnConfirm: true,
            preConfirm: () => {

                const input1 = document.getElementById('input1').value;
                const input2 = document.getElementById('input2').value;

                // Periksa apakah input kosong
                if (input1.trim() === '' || input2.trim() === '') {
                    Swal.showValidationMessage('Input tidak boleh kosong');
                    return false; // Menghentikan proses konfirmasi
                }

                // Periksa validasi disisi server
                const validateInput = validate(input1, input2, nopo)
                if (validateInput === false) {
                    Swal.showValidationMessage('Terjadi kesalahan / data sudah diinput, \n coba untuk refresh halaman');
                    return false; // Menghentikan proses konfirmasi
                }

                // Jika tidak kosong lanjutkan
                return fetch("<?= base_url('tpl/confirm') ?>", {
                        method: 'POST',
                        body: JSON.stringify({
                            nopo: nopo,
                            noref: input1,
                            remark: input2
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            // `Request failed: ${error}`
                            `Request failed!`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
            if (result.isConfirmed) {

                if (result.value === false) {
                    return; // Menghentikan eksekusi jika terjadi kesalahan
                }

                if (result.value.success === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: result.value.message,
                        showConfirmButton: false,
                        timer: 1200
                    }).then(() => {
                        var result_nopo = result.value.nopo
                        var result_noref = result.value.noref
                        var result_confirm = result.value.confirm
                        var result_remark = result.value.remark
                        var trElement = $(`tr[data-tr-nopo="${result_nopo}"]`);
                        var td_noref = trElement.find('.td_noref');
                        var td_confirm = trElement.find('.td_confirm');
                        var td_remark = trElement.find('.td_remark');
                        var btnDetailConfirm = trElement.find('.btnDetailConfirm');
                        var btnEdit = trElement.find('.btnEdit');
                        td_noref.text(result_noref);
                        td_confirm.text(result_confirm);
                        td_remark.text(result_remark);
                        btnDetailConfirm.attr('disabled', true);
                        btnDetailConfirm.removeClass('btn-success').addClass('btn-default');
                        btnEdit.attr('disabled', false);
                        btnEdit.removeClass('btn-default').addClass('btn-primary');
                        $('#modal-default').modal('hide')
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: result.value.message,
                        showConfirmButton: true // Menampilkan tombol konfirmasi setelah menampilkan pesan error
                    });
                }
            }
        })
    }

    function getDetail(nopo) {
        let result = {}
        $.ajax({
            url: "<?= base_url('tpl/getdetail') ?>",
            async: false,
            data: {
                nopo
            },
            method: "POST",
            dataType: "JSON",
            success: function(response) {
                // console.log(response)
                result = response.data[0]
            },
            error: function(error) {
                console.log(error)
            }
        })
        return result
    }

    function loadEdit(button) {

        const nopo = $(button).data('nopo')
        let detailConfirm = getDetail(nopo)
        // console.log(detailConfirm)

        var row = $(button).parent()

        Swal.fire({
            title: 'Edit',
            html: '<input id="inputnopo"  class="swal2-input custom-input" value="' + nopo + '" readonly><br>' +
                '<input id="edit_noref"  class="swal2-input custom-input" value="' + detailConfirm.noref + '" placeholder="No LBP/BT"><br>' +
                '<textarea  id="edit_remark" class="swal2-input custom-textarea" placeholder="Remark">' + detailConfirm.remark + '</textarea>',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            showLoaderOnConfirm: true,
            preConfirm: () => {

                const noref = document.getElementById('edit_noref').value;
                const remark = document.getElementById('edit_remark').value;

                // Periksa apakah input kosong
                if (noref.trim() === '' || remark.trim() === '') {
                    Swal.showValidationMessage('Input tidak boleh kosong');
                    return false; // Menghentikan proses konfirmasi
                }

                // Periksa validasi disisi server
                // const validateInput = validate(noref, remark, nopo)
                // if (validateInput === false) {
                //     Swal.showValidationMessage('Terjadi kesalahan / data sudah diinput, \n coba untuk refresh halaman');
                //     return false; // Menghentikan proses konfirmasi
                // }

                // Jika tidak kosong lanjutkan
                return fetch("<?= base_url('tpl/editconfirm') ?>", {
                        method: 'POST',
                        body: JSON.stringify({
                            id: detailConfirm.id,
                            nopo: nopo,
                            noref: noref,
                            remark: remark
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                            // `Request failed!`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
            if (result.isConfirmed) {

                if (result.value === false) {
                    return; // Menghentikan eksekusi jika terjadi kesalahan
                }

                if (result.value.success === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: result.value.message,
                        showConfirmButton: false,
                        timer: 1200
                    }).then(() => {
                        var result_nopo = result.value.nopo
                        var result_noref = result.value.noref
                        var result_confirm = result.value.confirm
                        var result_remark = result.value.remark
                        var trElement = $(`tr[data-tr-nopo="${result_nopo}"]`);
                        var td_noref = trElement.find('.td_noref');
                        var td_confirm = trElement.find('.td_confirm');
                        var td_remark = trElement.find('.td_remark');
                        // var btnDetailConfirm = trElement.find('.btnDetailConfirm');
                        td_noref.text(result_noref);
                        td_confirm.text(result_confirm);
                        td_remark.text(result_remark);
                        // btnDetailConfirm.attr('disabled', true);
                        // btnDetailConfirm.removeClass('btn-success').addClass('btn-default');
                        // $('#modal-default').modal('hide')
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: result.value.message,
                        showConfirmButton: true // Menampilkan tombol konfirmasi setelah menampilkan pesan error
                    });
                }
            }
        })
    }

    function lihatDetail(button) {
        let nopo = $(button).data('nopo')
        $('#lihatDetail').load("<?= base_url('tpl/showdetail') ?>", {
            nopo
        })
    }
</script>