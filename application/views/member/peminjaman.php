<?php $this->load->view('assets/header'); ?>
<div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php $this->load->view('assets/nav-member'); ?>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
        <?php $this->load->view('assets/nav-top'); ?>
        <div class="page-wrapper mdc-toolbar-fixed-adjust">
            <main class="content-wrapper">
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-card p-0">
                                <h6 class="card-title card-padding pb-0">Data Transaksi <button class="btn btn-primary float-right" style="margin-bottom: 10;" onclick="window.location='<?= base_url('admin/tambah_transaksi') ?>'">Tambah</button></h6>
                                <?php
                                if ((isset($_GET['status']) && $_GET['status'] == "success")) {
                                    echo "<div class='alert alert-success alert-message mr-4 ml-4'>";
                                    echo "<i class='fa fa-check'></i>  Proses Berhasil";
                                    echo "</div>";
                                } ?>
                                <div class=" table-responsive p-3">
                                    <table class="table table-hoverable" id="tabel-transaksi" name="tabel-buku">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th style="text-align: left;">Buku</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Tanggal Dikembalikan</th>
                                                <th>Denda/Hari</th>
                                                <th>Total Denda</th>
                                                <th>Status</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($trans as $key) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td style="text-align: left;"><?= $key->judul_buku; ?></td>
                                                    <td><?= date('d/m/Y', strtotime($key->tanggal_pinjam)); ?></td>
                                                    <td><?= date('d/m/Y', strtotime($key->tanggal_kembali)); ?></td>
                                                    <td><?php if (empty($key->tanggal_pengembalian)) {
                                                            echo "-";
                                                        } else {
                                                            echo date('d/m/Y', strtotime($key->tanggal_pengembalian));
                                                        } ?></td>
                                                    <td><?= "Rp. " . number_format($key->denda) . ",-"; ?></td>
                                                    <td><?= "Rp. " . number_format($key->total_denda) . ",-"; ?></td>
                                                    <td>
                                                        <?php if (!empty($key->batal) && $key->batal == 1) {
                                                            echo "<span style='color:red;'>Dibatalkan</span>";
                                                        } else if (empty($key->status_peminjaman)) {
                                                            echo "<span style='color:red;'>Menunggu Approve</span>" . $key->batal;
                                                        } else if ($key->status_peminjaman == 1 && (empty($key->status_pengembalian) || $key->status_pengembalian == 0)) {
                                                            echo "<span style='color:blue;'>Sedang Dipinjam</span>";
                                                        } else if ($key->status_peminjaman == 1) {
                                                            echo "<span style='color:green;'>Selesai</span>";
                                                        } ?>
                                                    </td>
                                                    <td nowrap="nowrap">
                                                        <?php if (!empty($key->batal) && $key->batal == 1) { ?>
                                                            -
                                                        <?php } else if (empty($key->status_peminjaman)) { ?>
                                                            <button class="btn btn-danger" id="cancelBtn" onclick="cancel('<?= $key->id_pinjam; ?>')">
                                                                <i class="far fa-check-circle"></i> Batalkan Transaksi
                                                            </button>
                                                        <?php } else if ($key->status_peminjaman == 1 && (empty($key->status_pengembalian) || $key->status_pengembalian == 0)) { ?>
                                                            Kembalaikan sebelum tanggal <?= $key->tanggal_kembali ?>
                                                        <?php } else if ($key->status_peminjaman == 1) {
                                                            echo "<span style='color:green;'>Selesai</span>";
                                                        } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script>
                function cancel(id) {
                    Swal.fire({
                        title: 'Batalkan peminjaman?',
                        showDenyButton: false,
                        showCancelButton: true,
                        confirmButtonText: `Ya`,
                        cancelButtonText: `Tidak`,
                        cancelButtonColor: `red`
                    }).then((result) => {
                        console.log(result);
                        if (result.isConfirmed) {
                            url = '<?= base_url() ?>member/batal_pinjam/' + id;
                            console.log(url);
                            $.ajax({
                                url: url,
                                error: function() {
                                    alert('Something is wrong');
                                },
                                success: function() {
                                    Swal.fire("Berhasil!", "Peminjaman telah dibatalkan!", "success");
                                    setTimeout(function() {
                                        location.reload(); //Refresh page
                                    }, 1000);
                                }
                            });
                        }
                    })
                }
            </script>
            <?php $this->load->view('assets/footer'); ?>