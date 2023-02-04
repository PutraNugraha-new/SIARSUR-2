<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3  d-flex justify-content-between">
        <h6 class="m-0 mt-2 font-weight-bold text-primary">Data <?= $judul; ?></h6>
        <a href="/suratmasuk/create" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Tambah <?= $judul; ?></span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Tgl Surat</th>
                        <th>Jenis / Sifat</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($surat as $data) :
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data->no_surat; ?></td>
                            <td><?= $data->tgl_surat; ?></td>
                            <td><?= $data->jenis; ?> / <?= $data->sifat; ?></td>
                            <td><?= $data->surat_dari; ?></td>
                            <td><?= $data->surat_untuk; ?></td>
                            <td><?= $data->perihal; ?></td>
                            <td>
                                <a href="/suratmasuk/edit/<?= $data->id_masuk; ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>
                                <form action="/suratmasuk/<?= $data->id_masuk; ?>" method="post" class="d-inline mx-auto">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus ??')"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="<?= base_url('filesuratmasuk/' . $data->dokumen); ?>" class="btn btn-info mt-2 btn-icon-split">
                                    <span class="icon text-white">
                                        <i class="fas fa-download"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>