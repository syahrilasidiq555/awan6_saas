<!DOCTYPE html>
<html>
<head>
	<?php 
		include "setting/head.php";    
        include "setting/cekredirect.php";
	    require "vendor/autoload.php";
	    cekRedirect();

        $message = "";
		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			// cek username dan password dari database
			$check = $db->has("user_pengguna",[
				"AND" => ["username" => $username, "password" => $password]
				]);
			if ($check) {
				// echo "username : ".$username.", password : ".$password;
				$user_role = $db->get("user_pengguna","role",["username" =>$username]);
				$_SESSION['username'] = $username;
				$_SESSION['role'] = (string)$user_role;
				echo "<script>window.location = window.location.href</script>";
        		cekRedirect();
			} else {
				// tampilan username / password salah
                $message =  "<tr>
                        <td style='background-color: #ffebee;'>
                            <center style='color:#F44336;'>
                                Login Gagal, Username atau Password salah!
                            </center>
                        </td>
                      </tr>";
			}
		}
	?>

    <!-- Global style START -->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.css">
    <style type="text/css">
        #frame5 {
            width:348px;
            /*height:385px;*/
            background:#FFF;
            border:1px solid #e6e6e6;
            margin-top:35px;
        }
        .styleblock {
            display: inline-block;
        }
        .styleblock input{
            width: 285px;
        }
    </style>
    <!-- Global style END -->
</head>

<!-- Body START -->
<body class="blue-grey">
<center>
    <div id="frame5" align="center">
        <table width="80%">
            <tr>
               <center>
                    <br>
                    <img src="img/pemkot.png"  height="120" alt="Logo Pemkot Kota Cimahi">
               </center>
            </tr>
            <form method="post" action="">
                <tr>
                    <td>
                        <div class="styleblock">
                            <i class="material-icons prefix md-prefix">account_circle</i>
                        </div>
                        <div class="styleblock">
                            <input id="username" placeholder="Username" type="text" name="username" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="styleblock">
                             <i class="material-icons prefix md-prefix">lock</i>     
                        </div>
                        <div class="styleblock">
                            <input id="password" placeholder="Password" type="password" name="password" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>Belum punya akun? <a href="daftar.php">Daftar disini</a></center>
                    </td>
                </tr>
                <tr>
                    <td align="center"><button type="submit" class="btn-large waves-effect waves-light blue-grey col s12" name="login">LOGIN</button></td>
                </tr>
                <?php echo $message; ?>
            </form>
        </table>
    </div>
</center>
</body>
<!-- Body END -->

</html>

