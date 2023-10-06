<?= $this->extend('layouts/app') ?>
<?=$this->section('content') ?>


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
        foreach ($users as $user) {
         ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['nama'] ?> </td>
                <td><?= $user['npm'] ?> </td>
                <td><?= $user['nama_kelas'] ?></td>
                <td>
                <a href="" class="btn btn-sm btn-success">Edit</a>
                <a href="" class="btn btn-sm btn-danger">Delete</a>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    

<?= $this->endSection() ?>