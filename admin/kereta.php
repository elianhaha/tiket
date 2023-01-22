<?php
$connect = mysqli_connect('localhost', 'root', '', 'pwd_uas');

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahkereta($data)
{
    global $connect;
    $nama_kereta = $data['nama_kereta'];
    $kelas = $data['kelas'];
    $berangkat = $data['berangkat'];
    $jam_berangkat = $data['jam_berangkat'];
    $tujuan = $data['tujuan'];
    $jam_tujuan = $data['jam_tujuan'];
    $harga = $data['harga'];

    mysqli_query($connect, "INSERT INTO kereta VALUES('','$nama_kereta','$kelas','$berangkat','$jam_berangkat','$tujuan','$jam_tujuan',$harga)");
    return mysqli_affected_rows($connect);
}

function search($keyword)
{
    $query = "SELECT * FROM kereta WHERE nama_kereta = '$keyword'";
    return query($query);
}
function delete($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM kereta WHERE id = '$id'");
    return mysqli_affected_rows($connect);
}

function ubahkereta($data)
{
    global $connect;
    $id = $data["id"];
    $nama_kereta = $data['nama_kereta'];
    $kelas = $data['kelas'];
    $berangkat = $data['berangkat'];
    $jam_berangkat = $data['jam_berangkat'];
    $tujuan = $data['tujuan'];
    $jam_tujuan = $data['jam_tujuan'];
    $harga = $data['harga'];

    mysqli_query($connect, "UPDATE kereta SET nama_kereta='$nama_kereta',kelas='$kelas',berangkat='$berangkat',jam_berangkat='$jam_berangkat',
    tujuan='$tujuan',jam_tujuan='$jam_tujuan',harga=$harga WHERE id=$id");
    return mysqli_affected_rows($connect);
}
