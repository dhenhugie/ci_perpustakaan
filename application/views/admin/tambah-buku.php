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
                                                    } else if ((isset($_GET['status']) && $_GET['status'] == "success")) {
                                                        echo "<div class='alert alert-success alert-message'>";
                                                        echo "<i class='fa fa-check'></i>  Buku berhasil ditambahkan";
                                                        echo "</div>";
                                                    } ?>
                                                    <form action="<?php echo base_url() . 'admin/save_buku' ?>" method="post" enctype="multipart/form-data">

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Kategori</label>
                                                                <select name="kategori" class="form-control">
                                                                    <option value="">--Pilih Kategori--</option>
                                                                    <?php foreach ($kategori as $k) { ?>
                                                                        <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?php echo form_error('kategori'); ?>
                                                            </div>


                                                            <div class="form-group col-md-6">
                                                                <label>Judul Buku</label>
                                                                <input type="text" name="judul" class="form-control">
                                                                <?php echo form_error('judul'); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Tahun Terbit</label>
                                                                <input type="date" name="thnterbit" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Lokasi</label>
                                                                <select name="lokasi" class="form-control">
                                                                    <option value="">--Pilih Lokasi--</option>
                                                                    <?php foreach ($rak as $k) { ?>
                                                                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Pengarang</label>
                                                                <input type="text" name="pengarang" class="form-control">
                                                            </div>

                                                            <div class="form-group group col-md-4">
                                                                <label>Penerbit</label>
                                                                <input type="text" name="penerbit" class="form-control">
                                                            </div>

                                                            <div class="form-group group col-md-4">
                                                                <label>ISBN</label>
                                                                <input type="text" name="isbn" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Jumlah Buku</label>
                                                                <input type="text" name="jumlah" class="form-control">
                                                            </div>

                                                            <div class="form-group  col-md-4">
                                                                <label>Status Buku</label>
                                                                <select name="status" class="form-control">
                                                                    <option value="1">Tersedia</option>
                                                                    <option value="0">Sedang dipinjam</option>
                                                                </select>
                                                                <?php echo form_error('status'); ?>
                                                            </div>

                                                            <div class="form-group group col-md-4">
                                                                <label>Denda</label>
                                                                <input type="text" class="form-control" name="denda" id="denda" data-type="currency" placeholder="Rp 1.000">
                                                            </div>
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
        <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                // Jquery Dependency

                var rupiah = document.getElementById("denda");
                rupiah.value = formatRupiah(rupiah.value, "Rp. ");

                rupiah.addEventListener("keyup", function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                    rupiah.value = formatRupiah(this.value, "Rp. ");
                });

                /* Fungsi formatRupiah */
                function formatRupiah(angka, prefix) {
                    var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                    if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiah += separator + ribuan.join(".");
                    }

                    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
                }
            });
        </script>
        <?php $this->load->view('assets/footer'); ?>