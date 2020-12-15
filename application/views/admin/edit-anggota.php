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
                                            <h3>Edit anggota</h3>
                                        </div>
                                    </h6>
                                    <div class="template-demo">
                                        <div class="mdc-layout-grid__inner">
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                <div class="mdc-card p-0">

                                                    <?= validation_errors('<p style="color:red;">', '</p>'); ?>
                                                    <?php
                                                    if ($this->session->flashdata() && (isset($_GET['status']) && $_GET['status'] != "failedemail")) {
                                                        echo "<div class='alert alert-danger alert-message'>";
                                                        echo $this->session->flashdata('form_errors');
                                                        echo "</div>";
                                                    }
                                                    if ((isset($_GET['status']) && $_GET['status'] == "success")) {
                                                        echo "<div class='alert alert-success alert-message'>";
                                                        echo "<i class='fa fa-check'></i>  anggota berhasil ditambahkan";
                                                        echo "</div>";
                                                    } else if ((isset($_GET['status']) && $_GET['status'] == "failedemail")) {
                                                        echo "<div class='alert alert-danger alert-message'>";
                                                        echo "<i class='fas fa-exclamation-circle'></i>  Password lama anda tidak sesuai";
                                                        echo "</div>";
                                                    } ?>
                                                    <form name="form_anggota" action="<?= base_url() ?>admin/update_anggota" method="post" enctype="multipart/form-data" role="form">
                                                        <div class="card-body">
                                                            <input type="hidden" value="<?= $id ?>" name="id">
                                                            <input type="hidden" value="<?= $password ?>" name="password">

                                                            <div class="form-group">
                                                                <label>Nama anggota</label>
                                                                <input type="text" name="nama" class="form-control" value="<?= $nama ?>">
                                                                <?php echo form_error('nama'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Jenis kelamin</label>
                                                                <select name="gender" class="form-control">
                                                                    <option value="">-- Select --</option>
                                                                    <option value="Laki-laki" <?php if ($gender == "Laki-laki") echo "SELECTED"; ?>>Laki-laki</option>
                                                                    <option value="Perempuan" <?php if ($gender == "Perempuan") echo "SELECTED"; ?>>Perempuan</option>
                                                                </select>
                                                                <?php echo form_error('gender'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>No Telepon</label>
                                                                <input type="number" name="no_telp" class="form-control" value="<?= $no_telp; ?>">
                                                                <?php echo form_error('no_telp'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <input type="text" name="alamat" class="form-control" value="<?= $alamat; ?>">
                                                                <?php echo form_error('alamat'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email" class="form-control" value="<?= $email; ?>">
                                                                <?php echo form_error('email'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Password Lama</label>
                                                                <input type="password" name="password_old" class="form-control" placeholder="Masukan Password lama">
                                                                <?php echo form_error('password_old'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Password Baru</label>
                                                                <input type="password" name="password_new" class="form-control" placeholder="Masukan Password baru">
                                                                <?php echo form_error('password_new'); ?>
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