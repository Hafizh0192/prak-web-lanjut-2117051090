<?= $this->extend('layouts/app') ?>
<?=$this->section('content') ?>

  <div class="text-center">
  <div class="p-3 mb-2 bg-dark-subtle text-emphasis-dark">My Profile</div>
  <img src="<?=base_url("assets/image/fikri2.jpg")?>" class="rounded" alt="fikri2" width="200" height=255>
  <p class="fs-4">Nama  : <?= $nama?></p>
  <p class="fs-4">NPM   : <?= $npm?></p>
  <p class="fs-4">Kelas : <?= $id_kelas?></p>
  <div class="p-3 mb-2 bg-dark-subtle text-emphasis-dark">
    <img src="<?=base_url("assets/image/s.jpg")?>"alt=""width="200px">
        
  </div>
  
</div>

<?= $this->endSection() ?>