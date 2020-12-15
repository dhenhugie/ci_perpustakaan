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
                                            <h3>Transaksi Baru</h3>
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
                                                        echo "<i class='fa fa-check'></i>  transaksi berhasil ditambahkan";
                                                        echo "</div>";
                                                    } ?>
                                                    <form action="<?php echo base_url() . 'admin/finish_transaksi' ?>" method="post" enctype="multipart/form-data">

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Anggota</label>
                                                                <input type="hidden" name="buku" value="<?= $key->id_pinjam ?>" class="form-control">
                                                                <input type="text" name="buku" value="<?= $key->nama_anggota ?>" class="form-control" readonly="">
                                                                <?php echo form_error('anggota'); ?>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Buku</label>
                                                                <input type="text" name="buku" class="form-control" value="<?= $key->judul_buku?>" readonly="">
                                                                <?php echo form_error('buku'); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Tanggal Pinjam</label>
                                                                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $key->tanggal_pinjam?>">
                                                                <?php echo form_error('tgl_pinjam'); ?>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tanggal Pengembalian</label>
                                                                <input type="date" name="dikembalikan" id="dikembalikan" class="form-control" >
                                                                <?php echo form_error('tgl_kembali'); ?>
                                                            </div>
                                                            <!-- <div class="form-group col-md-4">
                                                                <label>Denda / Hari</label>
                                                                <input type="text" class="form-control" name="denda" id="denda" data-type="currency" placeholder="Rp 1.000">
                                                                <?php echo form_error('denda'); ?>
                                                            </div> -->
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {

                Date.prototype.toDateInputValue = (function() {
                    var local = new Date(this);
                    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
                    return local.toJSON().slice(0, 10);
                });

                Date.prototype.addDays = function(days) {
                    this.setDate(this.getDate() + parseInt(days));
                    return this;
                };


                // $('#tgl_pinjam').val(new Date().toDateInputValue());
                // $('#tgl_kembali').val(new Date().addDays(7).toDateInputValue());

                // $('#tgl_pinjam').change(function() {
                //     var date = $(this).val();
                //     var newdate = new Date(date);
                //     console.log(newdate);
                //     $('#tgl_kembali').val(newdate.addDays(7).toDateInputValue());
                // });
            });
        </script>
        <?php $this->load->view('assets/footer'); ?>