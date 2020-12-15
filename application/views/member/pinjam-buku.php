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
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell--span-12">
                                <div class="mdc-card">
                                    <h6 class="card-title">
                                        <div class="page-header">
                                            <h3>Konfirmasi Peminjaman Buku</h3>
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
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td style="width: 60%;">
                                                                <form action="<?php echo base_url() . 'member/save_pinjam' ?>" method="post" enctype="multipart/form-data">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Kategori</label>
                                                                            <input type="hidden" value="<?= $buku->id_buku; ?>" name="id">
                                                                            <input type="text" name="kategori" value="<?= $buku->nama_kategori ?>" class="form-control" readonly="">
                                                                        </div>


                                                                        <div class="form-group col-md-6">
                                                                            <label>Judul Buku</label>
                                                                            <input type="text" name="judul" class="form-control" value="<?= $buku->judul_buku ?>" readonly="">
                                                                            <?php echo form_error('judul'); ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Tahun Terbit</label>
                                                                            <input type="text" name="thnterbit" class="form-control" value="<?= $buku->tahun_terbit ?>" readonly="">
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label>Denda keterlambatan pengembalian</label>
                                                                            <input type="text" class="form-control" name="denda" id="denda" data-type="currency" placeholder="Rp 1.000" readonly="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label>Pengarang</label>
                                                                            <input type="text" name="pengarang" class="form-control" value="<?= $buku->pengarang ?>" readonly="">
                                                                        </div>

                                                                        <div class="form-group group col-md-4">
                                                                            <label>Penerbit</label>
                                                                            <input type="text" name="penerbit" class="form-control" value="<?= $buku->penerbit ?>" readonly="">
                                                                        </div>

                                                                        <div class="form-group group col-md-4">
                                                                            <label>ISBN</label>
                                                                            <input type="text" name="isbn" class="form-control" value="<?= $buku->isbn ?>" readonly="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Tanggal Pinjam</label>
                                                                            <input type="date" name="pinjam" id="pinjam" class="form-control">
                                                                        </div>

                                                                        <div class="form-group  col-md-6">
                                                                            <label>Tanggal Kembali</label>
                                                                            <input type="date" class="form-control" name="kembali" id="kembali">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                                                        <a href="<?= base_url() ?>member/buku" role="button" class="btn btn-danger">Batal</a>
                                                                    </div>

                                                                </form>
                                                            </td>
                                                            <td style="width: 40%; vertical-align:center; text-align:center;"><img src="<?= base_url() . 'upload/' . $buku->gambar; ?>" width="300" height="300" style="padding: 100;"></td>
                                                        </tr>
                                                    </table>
                                                </div>
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

                Date.prototype.toDateInputValue = (function() {
                    var local = new Date(this);
                    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
                    return local.toJSON().slice(0, 10);
                });

                Date.prototype.addDays = function(days) {
                    this.setDate(this.getDate() + parseInt(days));
                    return this;
                };


                $('#pinjam').val(new Date().toDateInputValue());
                $('#kembali').val(new Date().addDays(7).toDateInputValue());

                $('#pinjam').change(function() {
                    var date = $(this).val();
                    var newdate = new Date(date);
                    console.log(newdate);
                    $('#kembali').val(newdate.addDays(7).toDateInputValue());
                });

            });
        </script>
        <?php $this->load->view('assets/footer'); ?>