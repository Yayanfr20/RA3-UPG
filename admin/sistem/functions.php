<?php

require 'config.php';

// function query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function kirimPesan($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $pesan = htmlspecialchars($data['pesan']);

    $query = "INSERT INTO pesan VALUES ('', '$nama', '$email', '$pesan' )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delPesan($id)
{
    global $conn;

    $query = "DELETE FROM pesan WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delImages($id)
{
    global $conn;

    $query = "DELETE FROM gallery WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}


function uploadGallery()
{
    global $conn;
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO gallery VALUES ('', '$gambar')");

    return mysqli_affected_rows($conn);
}


// posting informasi

function PostInformasi($data)
{
    global $conn;
    $judul = htmlspecialchars($data["Judul"]);
    $tanggal = htmlspecialchars($data["Tanggal"]);
    $author = htmlspecialchars($data["Author"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $text = $data['Text'];

    $query = "INSERT INTO informasi VALUES ('', '$judul', '$tanggal', '$author', '$gambar', '$text')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// create absensi
function CreateAbsensi($data)
{
    global $conn;
    $mk = htmlspecialchars($data["mk"]);
    $date = htmlspecialchars($data["date"]);
    $code = uniqid();

    mysqli_query($conn, "INSERT INTO absensi VALUES ('', '$mk', '$date', '$code')");

    return mysqli_affected_rows($conn);
}

function delAbsenMK($id)
{
    global $conn;
    $datamk = query("SELECT * FROM absensi WHERE id = $id")[0];
    $code = $datamk['code'];

    mysqli_query($conn, "DELETE FROM absensi_mk WHERE code = '$code'");
    mysqli_query($conn, "DELETE FROM absensi WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function absenMHS($data)
{
    global $conn;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $kehadiran = htmlspecialchars($data['kehadiran']);
    $kode = htmlspecialchars($data['kode']);
    $mk = htmlspecialchars($data['mk']);
    $date = htmlspecialchars($data['tanggal']);
    $kelas = htmlentities($data["kelas"]);

    $cekKode = query("SELECT * FROM absensi WHERE id = $id")[0];

    $kodeAccess = $cekKode['code'];

    if ($kode == $kodeAccess) {
        $cekNim = query("SELECT * FROM absensi_mk WHERE nim = '$nim'");

        if ($cekNim) {
            echo "
            <script>
            alert('Anda Sudah Mengirimkan Absen!');
            document.location.href = 'index.php';
            </script>
            ";
            return false;
        } else {
            $query = "INSERT INTO absensi_mk VALUES ('', '$nama', '$nim', '$mk', '$kehadiran', '$date', '$kode', '$kelas')";

            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
        }
    } else {
        return false;
    }
}


function delNews($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM informasi WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// buat list
function CreateList($data)
{
    global $conn;
    $id = $_SESSION['user'];
    $user = query("SELECT * FROM user WHERE id = $id")[0];
    $author = $user["username"];
    $judul = htmlspecialchars($data["judul"]);
    $code = uniqid();
    $tanggal = htmlspecialchars($data["tanggal"]);

    mysqli_query($conn, "INSERT INTO list VALUES(NULL,'$judul','$code','$tanggal','$author')");

    return mysqli_affected_rows($conn);
}

// delete list
function delList($id)
{
    global $conn;

    $cek = query("SELECT * FROM list WHERE id = $id")[0];
    $code = $cek['code'];
    mysqli_query($conn, "DELETE FROM src_list WHERE code = '$code'");

    mysqli_query($conn, "DELETE FROM list WHERE id = $id");

    return mysqli_affected_rows($conn);
}


// add list
function ListMHS($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $code = htmlspecialchars($data["code"]);
    $id = htmlspecialchars($data["id"]);

    $cek = query("SELECT * FROM list WHERE id = $id")[0];

    if ($cek) {
        if ($code === $cek['code']) {
            $cek2 = query("SELECT * FROM src_list WHERE nim = '$nim'");
            if ($cek2) {
                echo "
                <script>
                alert('Anda Sudah Add List!');
                document.location.href = 'index.php';
                </script>
                ";
                exit;
            } else {
                $query = "INSERT INTO src_list VALUES(NULL,'$nama','$nim','$code')";

                mysqli_query($conn, $query);

                return mysqli_affected_rows($conn);
            }
        } else {
            return false;
        }
    } else {
        echo "
        <script>
        alert('Ngapain dek! wkwkwkw');
        document.location.href = 'yanz.epizy.com';
        </script>
        ";
        exit;
    }
}

// create tugas

function createTugas($data)
{
    global $conn;
    $mk =htmlspecialchars($data["mk"]);
    $date = htmlspecialchars($data["tanggal"]);
    $code = uniqid();
    $author = htmlspecialchars($data["author"]);
    $judul = htmlspecialchars($data["judul"]);


    $query = "INSERT INTO tugas_mk VALUES(NULL,'$mk','$date','$code','$author','$judul')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

// delete tugas
function delTugas($id)
{
    global $conn;

    $cek = query("SELECT * FROM tugas_mk WHERE id = $id")[0];
    $code = $cek['code'];
    mysqli_query($conn, "DELETE FROM tugas WHERE code = '$code'");

    mysqli_query($conn, "DELETE FROM tugas_mk WHERE id = $id");

    return mysqli_affected_rows($conn);
}


// function upload tugas
function uploadTugas($nama,$kelas){
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];
    
    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
				alert('pilih file terlebih dahulu!');
			  </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['pdf'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
				alert('yang anda upload bukan pdf!');
			  </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = $nama . "-" . $kelas;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'admin/file/' . $namaFileBaru);

    return $namaFileBaru;
}


function inputTugas($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $code = htmlspecialchars($data["code"]);
    $mk = htmlspecialchars($data["mk"]);
    $id = htmlspecialchars($data["id"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $file = uploadTugas($nama,$kelas);
    $judul = htmlspecialchars($data["judul"]);
    if(!$file){
        return false;
    }

    // cek kesamaan code
    $result = query("SELECT * FROM tugas_mk WHERE id = $id")[0];

    if($code === $result["code"])
    {
        //cek apakah sudah pernah mengirimkan tugas
        $cekNim = query("SELECT * FROM tugas WHERE nim = '$nim'");
        
        if($cekNim){
            echo "
            <script>
            alert('Anda sudah mengirimkan tugas!');
            document.location.href = 'index.php';
            </script>
            ";
        }else{
            // lulus pengecekan
            $query = "INSERT INTO tugas VALUES(NULL,'$nama','$nim','$file','$mk','$code','$judul')";
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
        }
    }else{
        return false;
    }
    

}