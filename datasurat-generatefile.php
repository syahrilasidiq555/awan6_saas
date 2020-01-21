<?php 
	include 'setting/conn.php';

	$user_role = $_GET['user_role'];
	// delete all temporary file before download
	// file to delete
	$folder = 'file/tmp-files';
	//Get a list of all of the file names in the folder.
	$files = glob($folder . '/*');
	//Loop through the file list.
	foreach($files as $file){
	    //Make sure that this is a file and not a directory.
	    if(is_file($file)){
	        unlink($file);
	    }
	}
	// directory file
	$dir_file = 'file/surat-masuk';
	$zipname = "";
	if (ISSET($_GET['pagename'])) {
		$pagename = $_GET['pagename'];
		$username_pengguna = $_GET['username_pengguna'];
		if ($pagename == 'surat-masuk') {
			// CODE HERE FOR GET ALL FILE 
			$zipname = 'All_File.zip';
			$zip = new ZipArchive;
		    if ($zip->open($zipname, ZipArchive::CREATE) === TRUE){
		        // add file to zip
		    	$db_getfile=$db->select("surat","*",["username_pengguna" => $username_pengguna, "hapus" => 0]) or die("<script>alert('File PDF tidak tersedia, gagal download!'); window.location = 'agenda-surat.php'</script>");
		    	foreach ($db_getfile as $table) {
		    		if ($table['foto_lampiran'] != "") {
		    			$zip->addFile($dir_file.'/' . $table['foto_lampiran']);
		    		}
		    	}
		    	$zip->addFile($dir_file.'/' .'readme.txt');
		        $zip->close();
		    }
		} else if ($pagename == 'agenda-keluar') {
			$dari_tgl = $_GET['dari_tgl'];
			$sampai_tgl = $_GET['sampai_tgl'];
			// create file zip
			$zipname = 'Filesurat_tgl_'.$dari_tgl.'_sampai-tgl_'.$sampai_tgl.'.zip';
		    // if(file_exists($zipname)){
		    //     unlink($zipname);
		    // }
		    $zip = new ZipArchive;
		    if ($zip->open($zipname, ZipArchive::CREATE) === TRUE){
	    		$db_getfile=$db->select("surat","*",["username_pengguna" => $username_pengguna, "hapus" => 0,"tgl_diterima[<>]"=>[$dari_tgl,$sampai_tgl]]) or die("<script>alert('File PDF tidak tersedia, gagal download!'); window.location = 'agenda-surat.php'</script>");
		    	foreach ($db_getfile as $table) {
		    		if ($table['foto_lampiran'] != "") {
		    			$zip->addFile($dir_file.'/' . $table['foto_lampiran']);
		    		}
		    	}

		    	$zip->addFile($dir_file.'/' .'readme.txt');
		        $zip->close();
		    }
		}
	    $new_zipname = 'file/tmp-files/'.$zipname;
	    rename($zipname, $new_zipname);


		if(file_exists($new_zipname)){
	        //Set Headers:
	        header('Content-Type: application/zip');
	        header("Content-Disposition: attachment; filename=$new_zipname");
	        header('Content-Length: ' . filesize($new_zipname));
	        header("Location: $new_zipname");
	        readfile($new_zipname);
	        exit();
	    }
	} else {
		echo "wakwawww";
	}

?>