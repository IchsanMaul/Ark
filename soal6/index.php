<?php
// Create database connection using config file
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM programmer ORDER BY id ASC");

if (!empty($_GET['aksi'])) {
    if ($_GET['aksi'] == "tambah") {
        mysqli_query($mysqli, "INSERT INTO programmer VALUES('', '" . $_POST['programmer'] . "')");
        header("location:index.php");
    } elseif ($_GET['aksi'] == "tambah_skill") {
        mysqli_query($mysqli, "INSERT INTO skill VALUES('', '" . $_POST['id_programmer'] . "', '" . $_POST['nama_skill'] . "')");
        header("location:index.php");
    }
}

function whereProgrammer($id, $mysqli)
{
    $result_skill = mysqli_query($mysqli, "SELECT * FROM skill WHERE id_programmer = '" . $id . "' ORDER BY nama_skill ASC");
    $skill = [];
    foreach ($result_skill as $rs) {
        $skill[] = $rs["nama_skill"];
    }
    for ($i = 0; $i < count($skill); $i++) {
        if ($i == (count($skill) - 1)) {
            echo $skill[$i];
        } else if (count($skill) != 1) {
            echo $skill[$i] . ", ";
        } else {
            echo $skill[$i];
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Ichsan Maulana</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container-fluid row">
        <div class="col-sm-12">
            <form action="index.php?aksi=tambah" method="POST" align="right">
                <input type="text" name="programmer">
                <button type="submit">Tambah Programmer</button>
            </form>
            <br>
        </div>
        <div class="col-sm-12 justify-content-md-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama & Skill</th>
                        <th scope="col">Tambah Skill</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $user) { ?>
                        <tr>
                            <td><?php echo $user["nama_programmer"] ?></td>
                            <td rowspan="2">
                                <br>
                                <form action="index.php?aksi=tambah_skill" method="POST">
                                    <input type="text" name="nama_skill">
                                    <input type="hidden" name="id_programmer" value="<?php echo $user["id"]; ?>">
                                    <button type="submit">Tambah Skill</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo whereProgrammer($user["id"], $mysqli) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>