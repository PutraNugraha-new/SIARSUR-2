<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 mt-2 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="container">
        <form action="/admin/suratmasuk/update/<?= $surat['id_masuk']; ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="slug" value="<?= $surat['slug']; ?>">
                        <input type="hidden" name="fileLama" value="<?= $surat['dokumen']; ?>">
                        <input type="hidden" name="id_masuk" value="<?= $surat['id_masuk']; ?>">
                        <div class="form-group mb-3">
                            <label for="no_agenda" class="mb-2">No Agenda</label>
                            <input type="text" class="form-control <?= ($validation->hasError('no_agenda')) ? 'is-invalid' : ''; ?>" name="no_agenda" placeholder="nomor surat" id="no_agenda" value="<?= $surat['no_agenda']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_agenda'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_surat" class="mb-2">No Surat</label>
                            <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" name="no_surat" placeholder="nomor surat" id="no_surat" value="<?= $surat['no_surat']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_surat'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tglsurat" class="mb-    2">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" class="form-control <?= ($validation->hasError('tgl_surat ')) ? 'is-invalid' : ''; ?>" id="tglsurat" value="<?= $surat['tgl_surat']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tgl_surat'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tglterima" class="mb-2">Tanggal Diterima</label>
                            <input type="date" name="tgl_terima" class="form-control <?= ($validation->hasError('tgl_terima ')) ? 'is-invalid' : ''; ?>" id="tglterima" value="<?= $surat['tgl_terima']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tgl_terima'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="perihal" class="mb-2">Perihal</label>
                            <textarea class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" name="perihal" id="perihal"><?= $surat['perihal']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('perihal'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="id_sifat" class="mb-2">Sifat</label>
                            <select id="id_sifat" name="id_sifat" class="form-select <?= ($validation->hasError('id_sifat')) ? 'is-invalid' : ''; ?>">
                                <option hidden value="<?= $surat['id_sifat']; ?>">
                                    <?php
                                    if ($surat['id_sifat'] == '2') {
                                        echo "Segera";
                                    } else if ($surat['id_sifat'] == '3') {
                                        echo "Penting";
                                    } else if ($surat['id_sifat'] == '4') {
                                        echo "Biasa";
                                    } else {
                                        echo "Sangat Segera";
                                    }
                                    ?>
                                </option>
                                <?php foreach ($sifat as $data) : ?>
                                    <option value="<?= $data['id_sifat']; ?>"><?= $data['sifat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_sifat'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="id_jenis" class="mb-2">jenis</label>
                            <select id="id_jenis" name="id_jenis" class="form-select <?= ($validation->hasError('id_jenis')) ? 'is-invalid' : ''; ?>">
                                <option hidden value="<?= $surat['id_jenis']; ?>">
                                    <?php
                                    if ($surat['id_jenis'] == '2') {
                                        echo "Rahasia";
                                    } else if ($surat['id_jenis'] == '3') {
                                        echo "Konfidensial";
                                    } else if ($surat['id_jenis'] == '4') {
                                        echo "Biasa";
                                    } else {
                                        echo "Sangat Rahasia";
                                    }
                                    ?>
                                </option>
                                <?php foreach ($jenis as $data) : ?>
                                    <option value="<?= $data['id_jenis']; ?>"><?= $data['jenis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_jenis'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="surat_dari" class="mb-2">Surat Dari</label>
                            <input type="text" name="surat_dari" class="form-control <?= ($validation->hasError('surat_dari')) ? 'is-invalid' : ''; ?>" id="surat_dari" value="<?= $surat['surat_dari']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('surat_dari'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="surat_untuk" class="mb-2">Surat Untuk</label>
                            <input type="text" name="surat_untuk" class="form-control <?= ($validation->hasError('surat_untuk')) ? 'is-invalid' : ''; ?>" id="surat_untuk" value="<?= $surat['surat_untuk']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('surat_untuk'); ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dokumen" class="mb-2">Upload Dokumen</label>
                            <div class="input-group mb-3">
                                <p class="text-danger">
                                    <?= $surat['dokumen']; ?>
                                </p>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control <?= ($validation->hasError('dokumen')) ? 'is-invalid' : ''; ?>" id="dokumen" name="dokumen">
                                    <label class="input-group-text" for="dokumen">Upload</label>
                                    <div class="invalid-feedback" value="<?= old('dokumen'); ?>">
                                        <?= $validation->getError('dokumen'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>