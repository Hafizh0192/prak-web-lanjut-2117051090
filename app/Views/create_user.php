<?= $this->extend('layouts/app') ?>
<?=$this->section('content') ?>

    <div class= "wrapper">

        <form action="<?=base_url('/user/store') ?>" method="POST">

        <h1> Data User</h1>

        <br><div class="input-box">
            <input type="text" name= nama placeholder="Masukan nama" required><br>
        </div> 

        <select name="kelas" id="kelas">
                
                
                <?php
                foreach ($kelas as $item){
                    ?> 
                        <option value="<?= $item['id'] ?>">
                            <?= $item['nama_kelas'] ?>
                </option>
                

                <?php
                }

                ?>
         </select>

         <br><div class="input-box">
            <input type="text" name = npm placeholder="Masukan npm" class="form-control 
            <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" id="npm" autofocus>
            <div class="invalid-feedback">
            <?= $validation->getError('npm') ?>
  </div><br>
        </div>

        <br><button type="submit" class="btn">Submit</button>
    
         </form> 
</div>

<?= $this->endSection() ?>