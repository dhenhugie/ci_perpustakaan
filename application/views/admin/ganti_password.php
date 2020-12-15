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
                        <div class="mdc-layout-grid__cell--span-12">
                            <div class="mdc-card">
                                <h6 class="card-title">Update Password</h6>
                                <div class="template-demo">
                                    <div class="mdc-layout-grid__inner">
                                        <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-12-tablet">
                                            <div class="mdc-card">
                                                <?php if (isset($_GET['status']) && $_GET['status'] == "failed") { ?>
                                                    <div class="alert" style="border:1px solid #ed0000;background-color:#ed0000;color:white; text-align: center;">
                                                        <strong style="color:yellow"><i class="fa fa-exclamation-triangle "></i> <b>Update password failed!</b></strong><br>Konfirmasi password tidak cocok
                                                    </div>
                                                <?php } else if (isset($_GET['status']) && $_GET['status'] == "error") { ?>
                                                    <div class="alert" style="border:1px solid #ed0000;background-color:#ed0000;color:white; text-align: center;">
                                                        <strong style="color:yellow"><i class="fa fa-exclamation-triangle "></i> <b>Update password failed!</b></strong><br>Gagal update password, coba ulangi lagi
                                                    </div>
                                                <?php } else if (isset($_GET['status']) && $_GET['status'] == "success") { ?>
                                                    <div class="alert" style="border:1px solid #00aeed;background-color:#00aeed;color:black;text-align: center;">
                                                        <strong style="color:yellow"><i class="fa fa-exclamation-triangle "></i> <b>Selamat..!</b></strong><br>Password anda telah berhasil diganti
                                                    </div>
                                                <?php } ?>
                                                <form action="update_password" method="post">
                                                    <div class="mdc-layout-grid">
                                                        <div class="mdc-layout-grid__inner">
                                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-trailing-icon">
                                                                    <input class="mdc-text-field__input" id="text-field-hero-input" name="pass_baru" type="password">
                                                                    <div class="mdc-notched-outline">
                                                                        <div class="mdc-notched-outline__leading"></div>
                                                                        <div class="mdc-notched-outline__notch">
                                                                            <label for="text-field-hero-input" class="mdc-floating-label">Password Baru</label>
                                                                        </div>
                                                                        <div class="mdc-notched-outline__trailing"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-trailing-icon">
                                                                    <input class="mdc-text-field__input" id="text-field-hero-input" name="pass_confirm" type="password">
                                                                    <div class="mdc-notched-outline">
                                                                        <div class="mdc-notched-outline__leading"></div>
                                                                        <div class="mdc-notched-outline__notch">
                                                                            <label for="text-field-hero-input" class="mdc-floating-label">Konfirmasi Password</label>
                                                                        </div>
                                                                        <div class="mdc-notched-outline__trailing"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                                <button type="submit" class="mdc-button mdc-button--raised w-100">
                                                                    Update Password
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
        <?php $this->load->view('assets/footer'); ?>