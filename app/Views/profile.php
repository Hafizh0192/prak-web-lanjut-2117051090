<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel ="stylesheet"href="<?base_yrl("assets/css/style.css")?>">
  </head>
  <body>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>