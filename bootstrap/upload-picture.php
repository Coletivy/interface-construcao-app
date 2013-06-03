<?php
	$upload_dir = 'upload/'; // Directory for file storing
	$filename= '';
	$result = 'ERROR';
	$result_msg = '';
	$allowed_image = array ('image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg','image/png');
	define('PICTURE_SIZE_ALLOWED', 2242880); // bytes

	if (isset($_FILES['picture']))  { // file was send from browser
		if ($_FILES['picture']['error'] == UPLOAD_ERR_OK) { // no error
		
			if (in_array($_FILES['picture']['type'], $allowed_image)) {
				if(filesize($_FILES['picture']['tmp_name']) <= PICTURE_SIZE_ALLOWED) { // bytes
				
					$filename = $_FILES['picture']['name'];
					move_uploaded_file($_FILES['picture']['tmp_name'], $upload_dir.$filename);
					$result = 'OK';
				}
				else {
					$filesize = filesize($_FILES['picture']['tmp_name']);// or $_FILES['picture']['size']
					$filetype = $_FILES['picture']['type'];
					$result_msg = PICTURE_SIZE;
				}
			}
			else {
				$result_msg = SELECT_IMAGE;
			}
		}
		
		else if ($_FILES['picture']['error'] == UPLOAD_ERR_INI_SIZE)
			$result_msg = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
		
		else
			$result_msg = 'Unknown error';
	}

	// This is a PHP code outputing Javascript code.
	echo '<script language="JavaScript" type="text/javascript">'."\n";
	echo 'var parDoc = window.parent.document;';

	if($filename != '') {
		echo "parDoc.getElementById('boxImg').style.backgroundImage = 'url(\'$upload_dir$filename\')';";
		echo "parDoc.getElementById('boxImg').innerHTML = '';";
		echo "parDoc.getElementById('boxImg').innerHTML = '<form id = \'formUploadImg\' name = \'formUploadImg\' method=\'post\' autocomplete=\'off\' enctype=\'multipart/form-data\'> <div id = \'botaoUploadImg\'> <a class=\'file-input-wrapper btn undefined\'> Trocar Imagem <input type=\'file\' name=\'picture\' title=\'Trocar Imagem\' id=\'uploadImg\' onchange=\'return ajaxFileUpload(this);\'></a> </div> </form>';";

		// CORRIGINDO POSICAO DO BOTAO TROCAR IMAGEM PARA O CANTO INFERIOR DIREITO
		echo "parDoc.getElementById('botaoUploadImg').style.cssFloat = 'right';";
		echo "parDoc.getElementById('botaoUploadImg').style.width = '121px';";
		echo "parDoc.getElementById('botaoUploadImg').style.marginRight = '5px';";
		echo "parDoc.getElementById('botaoUploadImg').style.marginTop = '165px';";
	}

	echo "\n".'</script>';
	exit(); // do not go futher

?>