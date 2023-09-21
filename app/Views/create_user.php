<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url("assets/css/style.css")?>">
    <title>Data User</title>
</head>
<body>
    <div class= "wrapper">

        <form action="<?=base_url('/user/store') ?>" method="POST">

        <h1> Data User</h1>

        <br><div class="input-box">
            <input type="text" name= nama placeholder="Masukan nama" required><br>
        </div> 

        <br><div class="input-box">
            <input type="text" name = kelas placeholder="Masukan kelas" required><br>
        </div>

         <br><div class="input-box">
            <input type="text" name = npm placeholder="Masukan npm" required><br>
        </div>

        <br><button type="submit" class="btn">Submit</button>
    
         </form> 
</div>

</body>
</html>