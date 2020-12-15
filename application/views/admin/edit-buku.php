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
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell--span-12">
                                <div class="mdc-card">
                                    <h6 class="card-title">
                                        <div class="page-header">
                                            <h3>Edit Buku</h3>
                                        </div>
                                    </h6>
                                    <div class="template-demo">
                                        <div class="mdc-layout-grid__inner">
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                <div class="mdc-card p-0">

                                                    <?= validation_errors('<p style="color:red;">', '</p>'); ?>
                                                    <?php
                                                    if ($this->session->flashdata()) {
                                                        echo "<div class='alert alert-danger alert-message'>";
                                                        echo $this->session->flashdata('form_errors');
                                                        echo "</div>";
                                                    } else if ((isset($_GET['status']) && $_GET['status'] == "success")) {
                                                        echo "<div class='alert alert-success alert-message'>";
                                                        echo "<i class='fa fa-check'></i>  Buku berhasil ditambahkan";
                                                        echo "</div>";
                                                    } ?>
                                                    <form name="form_buku" action="<?= base_url() ?>admin/update_buku" method="post" enctype="multipart/form-data" role="form">
                                                        <div class="card-body">
                                                            <input type="hidden" value="<?= $id ?>" name="id">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Kategori</label>
                                                                    <select name="kategori" class="form-control">
                                                                        <option value="">--Pilih Kategori--</option>
                                                                        <?php foreach ($kategori as $k) { ?>
                                                                            <option value="<?php echo $k->id_kategori; ?>" <?php if ($k->id_kategori == $id_kategori) echo "SELECTED"; ?>><?php echo $k->nama_kategori; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php echo form_error('kategori'); ?>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label>Judul Buku</label>
                                                                    <input type="text" name="judul" class="form-control" value="<?= $judul ?>">
                                                                    <?php echo form_error('judul'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Pengarang</label>
                                                                    <input type="text" name="pengarang" class="form-control" value="<?= $pengarang ?>">
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>Penerbit</label>
                                                                    <input type="text" name="penerbit" class="form-control" value="<?= $penerbit ?>">
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label>ISBN</label>
                                                                    <input type="text" name="isbn" class="form-control" value="<?= $isbn ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Tahun Terbit</label>
                                                                    <input type="date" name="thnterbit" class="form-control" value="<?= $thnterbit ?>">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label>Lokasi</label>
                                                                    <select name="lokasi" class="form-control">
                                                                        <option value="">--Pilih Lokasi--</option>
                                                                        <?php foreach ($rak as $k) { ?>
                                                                            <option value="<?php echo $k; ?>" <?php if ($k == $lokasi) echo "SELECTED"; ?>><?php echo $k; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Jumlah Buku</label>
                                                                    <input type="text" name="jumlah" class="form-control" value="<?= $jumlah ?>">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label>Status Buku</label>
                                                                    <select name="status" class="form-control">
                                                                        <option value="1" <?php if ($status == "1") echo "SELECTED"; ?>>Tersedia</option>
                                                                        <option value="0" <?php if ($status == "0") echo "SELECTED"; ?>>Sedang dipinjam</option>
                                                                    </select>
                                                                    <?php echo form_error('status'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Gambar">Gambar</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                                                        <label class="custom-file-label" for="exampleInputFile"><?php echo $gambar ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="card-footer">
                                                            <button type="reset" class="btn btn-danger">Reset</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php $this->load->view('assets/footer'); ?>