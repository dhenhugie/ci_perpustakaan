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
                                            <h3>Buku Baru</h3>
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
                                                    }else if((isset($_GET['status']) && $_GET['status'] == "success")){ 
                                                        echo "<div class='alert alert-success alert-message'>";
                                                        echo "<i class='fa fa-check'></i>  Buku berhasil ditambahkan";
                                                        echo "</div>";
                                                    } ?>
                                                    <form action="<?php echo base_url() . 'admin/save_buku' ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select name="kategori" class="form-control">
                                                                <option value="">--Pilih Kategori--</option>
                                                                <?php foreach ($kategori as $k) { ?>
                                                                    <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <?php echo form_error('kategori'); ?>
                                                        </div>


                                                        <div class="form-group">
                                                            <label>Judul Buku</label>
                                                            <input type="text" name="judul" class="form-control">
                                                            <?php echo form_error('judul'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Pengarang</label>
                                                            <input type="text" name="pengarang" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Penerbit</label>
                                                            <input type="text" name="penerbit" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tahun Terbit</label>
                                                            <input type="date" name="thnterbit" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>ISBN</label>
                                                            <input type="text" name="isbn" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jumlah Buku</label>
                                                            <input type="text" name="jumlah" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Lokasi</label>
                                                            <input type="text" name="lokasi" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Status Buku</label>
                                                            <select name="status" class="form-control">
                                                                <option value="1">Tersedia</option>
                                                                <option value="0">Sedang dipinjam</option>
                                                            </select>
                                                            <?php echo form_error('status'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Gambar</label>
                                                            <input type="file" name="foto" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                                        </div>
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