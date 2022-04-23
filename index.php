<?php
include_once 'header.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Hasil BMI</title>
    </head>
    <body>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kalkulator BMI</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                <li class="breadcrumb-item active">BMI</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                <div class="card-header">
                    

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
                <div class="card-body">
                <form action='index.php' method='POST'>
    <div class="form-group row">
        <label for="tanggal" class="col-4 col-form-label">Tanggal Periksa</label>
        <div class="col-8">
        <input id="tanggal" name="tanggal" type="date" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="kode" class="col-4 col-form-label">Kode Pasien</label> 
        <div class="col-8">
        <input id="kode" name="kode" placeholder="Masukkan kode pasien" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Nama Pasien</label> 
        <div class="col-8">
        <input id="text" name="nama" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4">Gender</label> 
        <div class="col-8">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value="Laki-laki"> 
            <label for="checkbox_0" class="custom-control-label">Laki-laki</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input name="checkbox" id="checkbox_1" type="checkbox" class="custom-control-input" value="Perempuan"> 
            <label for="checkbox_1" class="custom-control-label">Perempuan</label>
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="kg" class="col-4 col-form-label">Berat</label> 
        <div class="col-8">
        <input id="kg" name="kg" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="M" class="col-4 col-form-label">Tinggi</label> 
        <div class="col-8">
        <input id="M" name="M" type="text" class="form-control">
        </div>
    </div> 
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Hitung</button>
        </div>
    </div>
    </form>
<?php
require_once 'Pasien.php';
require_once 'BMI.php';
require_once 'BMIPasien.php';

$pas1 = new Pasien();
$pas1->kode = 'A001';
$pas1->nama = 'Rayhan Al Hafidz';
$pas1->gender = 'Laki-laki';

$pas2 = new Pasien();
$pas2->kode = 'A002';
$pas2->nama = 'Zidni Aulia';
$pas2->gender = 'Perempuan';

$pas3 = new Pasien();
$pas3->kode = 'A003';
$pas3->nama = 'Jefri Malik';
$pas3->gender = 'Laki-laki';

$pas4 = new Pasien();
$pas4->kode = $_POST['kode'];
$pas4->nama = $_POST['nama'];
$pas4->gender = $_POST['checkbox'];

$bmi1 = new BMI(83, 181);
$bmi2 = new BMI(52, 155);
$bmi3 = new BMI(78, 179);
$bmi4 = new BMI($_POST['kg'], $_POST['M']);

$bp1 = new BMIPasien($bmi1, '2022-04-03', $pas1);
$bp2 = new BMIPasien($bmi2, '2022-05-05', $pas2);
$bp3 = new BMIPasien($bmi3, '2022-06-11', $pas3);
$bp4 = new BMIPasien($bmi4, $_POST['tanggal'], $pas4);

$ar_bmi = [$bp1, $bp2, $bp3, $bp4];
?>

<table class="table table-bordered">
    <thead>
        <th>No</th>
        <th>Tanggal Periksa</th>
        <th>Kode Pasien</th>
        <th>Nama Pasien</th>
        <th>Gender</th>
        <th>Berat (kg)</th>
        <th>Tinggi (m)</th>
        <th>Nilai BMI</th>
        <th>Status BMI</th>
    </thead>
    <?php
    $nomor=1;
    foreach($ar_bmi as $hsl){  
    ?>
    <tbody>
        <tr>
            <td><?=$nomor?></td>
            <td><?=$hsl->tanggal?></td>
            <td><?=$hsl->pasien->kode?></td>
            <td><?=$hsl->pasien->nama?></td>
            <td><?=$hsl->pasien->gender?></td>
            <td><?=$hsl->bmi->berat?></td>
            <td><?=$hsl->bmi->tinggi?></td>
            <td><?=$hsl->bmi->nilaiBMI()?></td>
            <td><?=$hsl->bmi->statusBMI()?></td>
        </tr>
    </tbody>
    <?php
    $nomor++;
    }
    ?>
</table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
</html>

<?php
include_once 'footer.php';
?>