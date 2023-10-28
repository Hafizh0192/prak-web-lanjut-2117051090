<?= $this->extend('layouts/app') ?>
<?=$this->section('content') ?>

  <div class="text-center">
  <div class="p-3 mb-2 bg-dark-subtle text-emphasis-dark">My Profile</div>

  <img src="<?= $user['foto'] ?? '<default-foto>' ?>" alt="" width="50%" height="50%">

  <p class="fs-4">Nama  : <?= $user ['nama']?></p>
  <p class="fs-4">NPM   : <?= $user ['npm']?></p>
  <p class="fs-4">Kelas : <?= $user ['nama_kelas']?></p>
  <div class="p-3 mb-2 bg-dark-subtle text-emphasis-dark"></div>
  
</div>


<?= $this->endSection() ?>