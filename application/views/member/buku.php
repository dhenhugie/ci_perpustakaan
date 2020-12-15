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
                                <h6 class="card-title card-padding pb-0">Data Buku </h6>

                                <div class="tab">
                                    <button class="tablinks" onclick="openCity(event, 'fisik')" id="defaultOpen">Buku Fisik</button>
                                    <button class="tablinks" onclick="openCity(event, 'ebook')">E-Book</button>
                                </div>

                                <div id="fisik" class="tabcontent">
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
                                                            <a href="<?= base_url() . "member/pinjam_buku/" . $key->id_buku ?>" class="btn btn-success" role="button">
                                                                <i class="fas fa-cart-plus"></i> Pinjam Sekarang
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div id="ebook" class="tabcontent">
                                    <div class=" table-responsive p-3">
                                        <table class="table table-hoverable" id="tabel-ebook" name="tabel-ebook">
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
                                                            <a href="<?= base_url() . "member/pinjam_buku/" . $key->id_buku ?>" class="btn btn-success" role="button">
                                                                <i class="fas fa-cart-plus"></i> Pinjam Sekarang
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
                </div>
            </main>
            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>
            <?php $this->load->view('assets/footer'); ?>