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
        foreach ($users as $user) {
         ?>
            <tr>
                <td><?=$no++ ?></td>
                <td><?= $user['nama'] ?> </td>
                <td><?= $user['npm'] ?> </td>
                <td><?= $user['nama_kelas'] ?></td>
                <td class="d-flex">
                <a class="mx-1 btn btn-info" href="<?= base_url('user/' . $user['id']) ?>">detail</a>
                <a  href="<?= base_url('user/' . $user['id']).'/edit' ?>" class="btn btn-sm btn-success mx-1">Edit</a>
                <form action="<?= base_url('user/delete/' . $user['id']) ?>" method="POST">
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