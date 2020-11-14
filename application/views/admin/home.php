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
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
              <div class="mdc-card info-card info-card--success">
                <div class="card-inner">
                  <h5 class="card-title">Jumlah Buku Yang Terdaftar</h5>
                  <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?= $jmlbuku ?></h5>
                  <p class="tx-12 text-muted"></p>
                  <div class="card-icon-wrapper">
                    <i class="material-icons">library_books</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
              <div class="mdc-card info-card info-card--danger">
                <div class="card-inner">
                  <h5 class="card-title">Jumlah Anggota yang terdaftar</h5>
                  <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?= $jmlanggota ?></h5>
                  <p class="tx-12 text-muted"></p>
                  <div class="card-icon-wrapper">
                    <i class="material-icons">people</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
              <div class="mdc-card info-card info-card--primary">
                <div class="card-inner">
                  <h5 class="card-title">Peminjaman belum selesai</h5>
                  <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?= $jmltransaksi ?></h5>
                  <p class="tx-12 text-muted"></p>
                  <div class="card-icon-wrapper">
                    <i class="material-icons">airplay</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
              <div class="mdc-card info-card info-card--info">
                <div class="card-inner">
                  <h5 class="card-title">Peminjaman Sudah selesai ok</h5>
                  <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?= $jmltransaksi ?></h5>
                  <p class="tx-12 text-muted"></p>
                  <div class="card-icon-wrapper">
                    <i class="material-icons">check_circle</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet">
              <div class="mdc-card p-2">
                <!-- <h6 class="card-title card-padding pb-0">Transaksi Terakhir</h6> -->
                <div class="d-flex justify-content-between">
                  <h3 class="font-weight-normal pt-4 pl-3">Transaksi Terakahir</h3>
                </div>
                <div class="pl-3 pr-3">
                  <div class="table-responsive">
                    <?php if ($jmltransaksi > 0) { ?>
                      <table class="table table-hoverable">
                        <thead>
                          <tr>
                            <th class="text-left">TANGGAL TRANSAKSI</th>
                            <th>TANGGAL PINJAM</th>
                            <th>TANGGAL KEMBALI</th>
                            <th>TOTAL DENDA</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($transaksi as $key) { ?>
                            <tr>
                              <td class="text-left">Frozen yogurt</td>
                              <td>1.59</td>
                              <td>6.0</td>
                              <td>50</td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <div><button class="btn btn-primary">Lihat semua transaksi</button></div>
                    <?php } else { ?>
                      <div class="d-flex justify-content-center"> <div class="d-flex align-items-center">Tidak ada transaksi baru-baru ini...</div></div> 
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-2-tablet">
              <div class="mdc-card bg-white text-black">
                <div class="d-flex justify-content-between">
                  <h3 class="font-weight-normal">Anggota Terbaru</h3>
                </div>
                <div class="table-responsive" style="color: white;">
                  <table class="table dashboard-table">
                    <tbody>
                      <?php foreach ($anggota as $key) { ?>
                        <tr>
                          <td><span class="material-icons">
                              <?php if ($key->gender == 'Laki-laki') { ?>
                                sentiment_satisfied <?php } else { ?>
                                sentiment_very_satisfied
                              <?php } ?>
                            </span></td>
                          <td><?= $key->nama_anggota ?></td>
                          <td><?= $key->no_telp ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div><button class="btn btn-primary mt-auto" onclick="window.location='<?= base_url('admin/anggota') ?>'">Lihat semua anggota</button></div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-2-tablet">
              <div class="mdc-card bg-white text-black">
                <div class="d-flex justify-content-between">
                  <h3 class="font-weight-normal">Buku Populer</h3>
                </div>
                <div class="table-responsive" style="color: white;">
                  <table class="table dashboard-table">
                    <tbody>
                      <?php foreach ($buku as $key) { ?>
                        <tr>
                          <td>
                            <span class="material-icons">
                              collections_bookmark
                            </span></td>
                          <td><?= $key->judul_buku ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div><button class="btn btn-primary" onclick="window.location='<?= base_url('admin/buku') ?>'">Lihat semua buku</button></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <?php $this->load->view('assets/footer'); ?>