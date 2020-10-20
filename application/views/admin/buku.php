<?php $this->load->view('assets/header'); ?>
<div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php $this->load->view('assets/nav'); ?>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
        <?php $this->load->view('assets/nav-top'); ?>
        <div class="page-wrapper mdc-toolbar-fixed-adjust">
            <main class="content-wrapper">
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-card p-0">
                                <h6 class="card-title card-padding pb-0">Data Buku <button class="btn btn-primary float-right" style="margin-bottom: 10;" onclick="window.location='<?= base_url('admin/tambah_buku') ?>'">Tambah</button></h6>
                                <?php 
                                if((isset($_GET['status']) && $_GET['status'] == "success")){ 
                                    echo "<div class='alert alert-success alert-message mr-4 ml-4'>";
                                    echo "<i class='fa fa-check'></i>  Data Buku telah dihapus";
                                    echo "</div>";
                                } ?>
                                <div class=" table-responsive p-3">
                                    <table class="table table-hoverable" id="tabel-buku" name="tabel-buku">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Tahun terbit</th>
                                                <th>ISBN</th>
                                                <th>Lokasi</th>
                                                <th>Status</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($buku as $key) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><img src="<?= base_url() . 'upload/' . $key->gambar; ?>" width="80" height="80"></td>
                                                    <td><?= $key->judul_buku; ?></td>
                                                    <td><?= $key->pengarang; ?></td>
                                                    <td><?= $key->penerbit; ?></td>
                                                    <td><?= $key->tahun_terbit; ?></td>
                                                    <td><?= $key->isbn; ?></td>
                                                    <td><?= $key->lokasi; ?></td>
                                                    <td>
                                                        <?php if ($key->status_buku == 1) {
                                                            echo "Tersedia";
                                                        } else {
                                                            echo "Sedang dipinjam";
                                                        } ?>
                                                    </td>
                                                    <td nowrap="nowrap">
                                                        <a href="<?= base_url() . "admin/edit_buku/" . $key->id_buku ?>" class="btn btn-success" role="button">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?= base_url("admin/hapus_buku/" . $key->id_buku . "/" . $key->gambar) ?>" class="btn btn-danger" role="button">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
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
            <?php $this->load->view('assets/footer'); ?>