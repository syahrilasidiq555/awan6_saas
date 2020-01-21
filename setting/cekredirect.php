<?php  

function cekRedirect(){
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {
            echo "<script>window.location = 'home.php'</script>";
        } else if ($_SESSION['role'] != "admin") {
            include "conn.php";
            if ($db->has("jabatan",["role" => $_SESSION['role']])) {
                echo "<script>window.location = 'home.php'</script>";
            } else {
            echo "<script> alert('gagal login role tidak ada'); window.location = 'logout.php</script>";
            }
        } 
    }
}

function cekRole($a){
    $sess = $_SESSION['role'];
    if ($a == "admin") {
        if ($sess == "admin") {
            
        }else {
            echo "<script>window.location = 'error.php'</script>";
        }
    }
    if ($a == "admin&kadis") {
        if ($sess == "admin" OR $sess == "Kepala Dinas") {
            
        }else {
            echo "<script>window.location = 'error.php'</script>";
        }
    }
    if ($a == "mix") {
        include "conn.php";
        if ($db->has("jabatan",["role" => $sess])) {

        }
        else{
            echo "<script>window.location = 'error.php'</script>";
        }
    }
}


?>