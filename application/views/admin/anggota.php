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
                                <h6 class="card-title card-padding pb-0">Data Anggota <button class="btn btn-primary float-right" style="margin-bottom: 10;" onclick="window.location='<?= base_url('admin/tambah_anggota') ?>'">Tambah</button></h6>
                                <?php 
                                if((isset($_GET['status']) && $_GET['status'] == "success")){ 
                                    echo "<div class='alert alert-success alert-message mr-4 ml-4'>";
                                    echo "<i class='fa fa-check'></i>  Data anggota telah dihapus";
                                    echo "</div>";
                                } ?>
                                <div class=" table-responsive p-3">
                                    <table class="table table-hoverable" id="tabel-anggota" name="tabel-anggota">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Gender</th>
                                                <th>No Telpon</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($anggota as $key) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $key->nama_anggota; ?></td>
                                                    <td><?= $key->gender; ?></td>
                                                    <td><?= $key->no_telp; ?></td>
                                                    <td><?= $key->alamat; ?></td>
                                                    <td><?= $key->email; ?></td>
                                                    <td nowrap="nowrap">
                                                        <a href="<?= base_url() . "admin/edit_anggota/" . $key->id_anggota ?>" class="btn btn-success" role="button">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?= base_url("admin/hapus_anggota/" . $key->id_anggota) ?>" class="btn btn-danger" role="button">
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