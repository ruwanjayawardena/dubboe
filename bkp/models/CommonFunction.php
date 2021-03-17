<?php

/**
 * Description of CommonFunction
 *
 */
class CommonFunction {	
	
	public function getSendGridAPIKEY() {
		$sys_sendgrid_apikey = 0;
		$sql = "SELECT
df_setting.sys_sendgrid_apikey
FROM
df_setting";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$sys_sendgrid_apikey = $row->sys_sendgrid_apikey;
		}
		return $sys_sendgrid_apikey;
	}

	public function getNextAutoIncrementID($table) {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE '" . $table . "'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		return $nextid;
	}

	public function delete_folder($folder) {
		$flag = false;
		$flag2 = false;
		if (!is_dir($folder)) {
			$flag = true;
		} else {
			$subFolder = $folder . "/" . "thumbnail";
			$subFolder2 = $folder . "/" . "medium";
			if (!is_dir($subFolder)) {
				$flag = true;
			} else {
				$files = glob($subFolder . '/*');
				foreach ($files as $file) {
					//Make sure that this is a file and not a directory.
					if (is_file($file)) {
						//Use the unlink function to delete the file.
						unlink($file);
					}
				}
				rmdir($subFolder);
				$flag = true;
			}
			if (!is_dir($subFolder2)) {
				$flag2 = true;
			} else {
				$files2 = glob($subFolder2 . '/*');
				foreach ($files2 as $file2) {
					//Make sure that this is a file and not a directory.
					if (is_file($file2)) {
						//Use the unlink function to delete the file.
						unlink($file2);
					}
				}
				rmdir($subFolder2);
				$flag2 = true;
			}
			if ($flag && $flag2) {
				$files2 = glob($folder . '/*');
				foreach ($files2 as $file) {
					//Make sure that this is a file and not a directory.
					if (is_file($file)) {
						//Use the unlink function to delete the file.
						unlink($file);
					}
				}
				rmdir($folder);
				$flag = true;
			}
		}
		return $flag;
	}

}
