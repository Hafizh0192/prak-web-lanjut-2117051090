<?= $this->extend('layouts/app') ?>
<?=$this->section('content') ?>

    
    <div class="table-responsive">
    <a class="btn btn-primary" href="<?= base_url('user/create')?>">TAMBAH DATA</a>
<table class = "table table-primary">
    <thead class="table-secondary">
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($user as $u) {
         ?>
            <tr>
                <td><?=$no++ ?></td>
                <td><?= $u['nama'] ?> </td>
                <td><?= $u['npm'] ?> </td>
                <td><?= $u['nama_kelas'] ?></td>
                <td class="d-flex">
                <a class="mx-1 btn btn-info" href="<?= base_url('user/' . $u['id']) ?>">detail</a>
                <a href="<?= base_url('user/' . $u['id']).'/edit' ?>" class="mx-1 btn btn-sm btn-success">Edit</a>
                <form action="<?= base_url('user/delete/' . $u['id']) ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <?= csrf_field() ?>
                            <button class="btn btn-danger mx-1" type="submit">Delete</button>
                        </form>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    </div>
    
                

<?= $this->endSection() ?>