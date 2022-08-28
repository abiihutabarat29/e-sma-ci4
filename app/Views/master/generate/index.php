<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="
                  d-flex
                  align-items-left align-items-md-center
                  flex-column flex-md-row
                ">
            <div>
                <h2 class="text-white pb-2 fw-bold"><?= $titlebar ?></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-info card-annoucement card-round">
                <div class="card-body text-center">
                    <div class="card-opening">Selamat Datang <?= session()->get('nama'); ?></div>
                    <div class="card-desc">
                        Sebelum melakukan "Generate" maka pastikan syarat & ketentuan terpenuhi dengan benar.
                    </div>
                    <div class="card-detail">
                        <a href="<?= base_url('generate/export') ?>" class="btn btn-primary btn-rounded">Generate</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?= $title ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="card-list">
                            <div class="item-list">
                                <div class="info-user ml-3">
                                    <span class="text-muted">1. Pastikan Internet Anda Terkoneksi dengan baik.</span>
                                </div>
                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                            <div class="item-list">
                                <div class="info-user ml-3">
                                    <span class="text-muted">2. Gunakan Browser Google Chrome dan Mozilla Firefox terbaru.</span>
                                </div>
                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                            <div class="item-list">
                                <div class="info-user ml-3">
                                    <span class="text-muted">3. Seluruh data yang dibutuhkan sudah ter-input dengan benar.</span>
                                </div>
                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                            <div class="item-list">
                                <div class="info-user ml-3">
                                    <span class="text-muted">4. Jika masih ada data yangbelum lengkap maka hasil export tidak akan sesuai dengan permintaan.</span>
                                </div>
                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                            <div class="item-list">
                                <div class="info-user ml-3">
                                    <span class="text-muted">5. Jika data yang ter-generate tidak sesuai dengan inputan data maka <b>Contact Developer</b>.</span>
                                </div>
                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>