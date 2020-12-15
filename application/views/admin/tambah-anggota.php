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
                                            <h3>Anggota Baru</h3>
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
                                                        echo "<i class='fa fa-check'></i>  anggota berhasil ditambahkan";
                                                        echo "</div>";
                                                    } ?>
                                                    <form action="<?php echo base_url() . 'admin/save_anggota' ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Nama anggota</label>
                                                            <input type="text" name="nama" class="form-control">
                                                            <?php echo form_error('nama'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="">-- Select --</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            <?php echo form_error('gender'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>No Telepon</label>
                                                            <input type="number" name="no_telp" class="form-control">
                                                            <?php echo form_error('no_telp'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input type="text" name="alamat" class="form-control">
                                                            <?php echo form_error('alamat'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control">
                                                            <?php echo form_error('email'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" name="password" class="form-control">
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