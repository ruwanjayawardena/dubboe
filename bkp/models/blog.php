<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class Blog extends ConnectDB {

	const TBL_BLOG = 'df_blog';

	private $flag = false;
	private $blg_id;
	private $blg_year;
	private $blg_month;
	private $blg_date;
	private $blg_title;
	private $blg_body;
	private $blg_maincat;
	private $blg_subcat;
	private $blg_usr;
	//ts_glossary_terms
	private $gl_id;
	private $gl_heading;
	private $gl_short_desc;
	private $gl_long_desc;
	
	public function getBlg_usr() {
		return $this->blg_usr;
	}

	public function setBlg_usr($blg_usr) {
		$this->blg_usr = $blg_usr;
		return $this;
	}
	
	public function getFlag() {
		return $this->flag;
	}

	public function getBlg_id() {
		return $this->blg_id;
	}

	public function getBlg_year() {
		$this->blg_year = date("Y");
		return $this->blg_year;
	}

	public function getBlg_month() {
		$this->blg_month = date("m");
		return $this->blg_month;
	}

	public function getBlg_date() {
		$this->blg_date = date("Y-m-d");
		return $this->blg_date;
	}

	public function getBlg_title() {
		return $this->blg_title;
	}

	public function getBlg_body() {
		return $this->blg_body;
	}

	public function getBlg_maincat() {
		return $this->blg_maincat;
	}

	public function getBlg_subcat() {
		return $this->blg_subcat;
	}

	public function getGl_id() {
		return $this->gl_id;
	}

	public function getGl_heading() {
		return $this->gl_heading;
	}

	public function getGl_short_desc() {
		return $this->gl_short_desc;
	}

	public function getGl_long_desc() {
		return $this->gl_long_desc;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setBlg_id($blg_id) {
		$this->blg_id = $blg_id;
		return $this;
	}

	public function setBlg_year($blg_year) {
		$this->blg_year = $blg_year;
		return $this;
	}

	public function setBlg_month($blg_month) {
		$this->blg_month = $blg_month;
		return $this;
	}

	public function setBlg_date($blg_date) {
		$this->blg_date = $blg_date;
		return $this;
	}

	public function setBlg_title($blg_title) {
		$this->blg_title = $blg_title;
		return $this;
	}

	public function setBlg_body($blg_body) {
		$this->blg_body = $blg_body;
		return $this;
	}

	public function setBlg_maincat($blg_maincat) {
		$this->blg_maincat = $blg_maincat;
		return $this;
	}

	public function setBlg_subcat($blg_subcat) {
		$this->blg_subcat = $blg_subcat;
		return $this;
	}

	public function setGl_id($gl_id) {
		$this->gl_id = $gl_id;
		return $this;
	}

	public function setGl_heading($gl_heading) {
		$this->gl_heading = $gl_heading;
		return $this;
	}

	public function setGl_short_desc($gl_short_desc) {
		$this->gl_short_desc = $gl_short_desc;
		return $this;
	}

	public function setGl_long_desc($gl_long_desc) {
		$this->gl_long_desc = $gl_long_desc;
		return $this;
	}

	public function getAllBlog() {
		$data = array();
		$sql = "SELECT
df_blog.blg_id,
df_blog.blg_year,
df_blog.blg_month,
df_blog.blg_date,
df_blog.blg_title,
df_blog.blg_body,
df_blog.blg_maincat,
df_blog.blg_subcat,
df_blog.blg_usr,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_blog.blg_maincat) AS blg_maincat_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = df_blog.blg_subcat) AS blg_subcat_name,
df_user.usr_first_name,
df_user.usr_last_name
FROM
df_blog
INNER JOIN df_user ON df_blog.blg_usr = df_user.usr_id
ORDER BY
df_blog.blg_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/blog/" . $row['blg_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['blg_img'] = "#";
				} else {
					$data[$i]['blg_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function getAllBlogByLoggedUser() {
		$data = array();
		$sql = "SELECT
df_blog.blg_id,
df_blog.blg_year,
df_blog.blg_month,
df_blog.blg_date,
df_blog.blg_title,
df_blog.blg_body,
df_blog.blg_maincat,
df_blog.blg_subcat,
df_blog.blg_usr,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_blog.blg_maincat) AS blg_maincat_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = df_blog.blg_subcat) AS blg_subcat_name,
df_user.usr_first_name,
df_user.usr_last_name
FROM
df_blog
INNER JOIN df_user ON df_blog.blg_usr = df_user.usr_id
WHERE
df_blog.blg_usr = :blg_usr
ORDER BY
df_blog.blg_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':blg_usr', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/blog/" . $row['blg_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['blg_img'] = "#";
				} else {
					$data[$i]['blg_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

//	public function getAllGLTerms() {
//		$data = array();
//		$sql = "SELECT
//ts_glossary_terms.gl_id,
//ts_glossary_terms.gl_heading,
//ts_glossary_terms.gl_short_desc,
//ts_glossary_terms.gl_long_desc
//FROM
//ts_glossary_terms
//ORDER BY
//ts_glossary_terms.gl_id DESC";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->execute();
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[] = $row;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}
//	public function getAllGLTermsFront() {
//		$data = array();
//		$sql = "SELECT
//ts_glossary_terms.gl_id,
//ts_glossary_terms.gl_heading,
//ts_glossary_terms.gl_short_desc,
//ts_glossary_terms.gl_long_desc
//FROM
//ts_glossary_terms
//ORDER BY
//ts_glossary_terms.gl_id DESC";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->execute();
//			$i = 0;
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[$i] = $row;
//				$directory = "../../asset_imageuploader/glterm/" . $row['gl_id'] . "/";
//				$files = scandir($directory);
//				$files = array_diff($files, ['.', '..', 'thumbnail']);
//				$files = array_values(array_filter($files));
//				if ($files[0] == NULL) {
//					$data[$i]['gl_img'] = "#";
//				} else {
//					$data[$i]['gl_img'] = $files[0];
//				}
//				$i++;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}

	public function getAllBlogYearMonths() {
		$data = array();
		$sql = "SELECT
df_blog.blg_year,
df_blog.blg_month,
MONTHNAME(STR_TO_DATE(df_blog.blg_month, '%m')) AS monthstr,
DATE_FORMAT(df_blog.blg_date, '%d')AS date
FROM
df_blog
GROUP BY
df_blog.blg_month,
df_blog.blg_year,
df_blog.blg_date
ORDER BY
df_blog.blg_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllBlogYear() {
		$data = array();
		$sql = "SELECT
df_blog.blg_year
FROM
df_blog
GROUP BY
df_blog.blg_year";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllBlogMonth() {
		$data = array();
		$sql = "SELECT
df_blog.blg_year,
df_blog.blg_month,
MONTHNAME(STR_TO_DATE(df_blog.blg_month, '%m')) AS monthstr
FROM
df_blog
GROUP BY
df_blog.blg_month,
df_blog.blg_year
ORDER BY
df_blog.blg_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllBlogDate() {
		$data = array();
		$sql = "SELECT
df_blog.blg_year,
df_blog.blg_month,
df_blog.blg_date AS originaldate,
DATE_FORMAT(df_blog.blg_date, '%d')AS date,
DATE_FORMAT(df_blog.blg_date, '%W')AS datename
FROM
df_blog
GROUP BY
df_blog.blg_month,
df_blog.blg_year,
df_blog.blg_date
ORDER BY
df_blog.blg_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getBlogByID() {
		$data = array();
		$sql = "SELECT
df_blog.blg_id,
df_blog.blg_year,
df_blog.blg_month,
df_blog.blg_date,
df_blog.blg_title,
df_blog.blg_body,
df_blog.blg_maincat,
df_blog.blg_subcat,
df_blog.blg_usr,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_blog.blg_maincat) AS blg_maincat_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = df_blog.blg_subcat) AS blg_subcat_name,
df_user.usr_first_name,
df_user.usr_last_name
FROM
df_blog
INNER JOIN df_user ON df_blog.blg_usr = df_user.usr_id
WHERE
df_blog.blg_id = :blg_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':blg_id', $this->getBlg_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/blog/" . $row['blg_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['blg_img'] = "#";
				} else {
					$data[$i]['blg_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

//	public function getGLTermsByID() {
//		$data = array();
//		$sql = "SELECT
//ts_glossary_terms.gl_id,
//ts_glossary_terms.gl_heading,
//ts_glossary_terms.gl_short_desc,
//ts_glossary_terms.gl_long_desc
//FROM
//ts_glossary_terms
//WHERE
//ts_glossary_terms.gl_id = :gl_id";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->bindParam(':gl_id', $this->getGl_id(), PDO::PARAM_INT);
//			$readstmt->execute();
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[] = $row;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}
//	public function getGLTermsByIDFront() {
//		$data = array();
//		$sql = "SELECT
//ts_glossary_terms.gl_id,
//ts_glossary_terms.gl_heading,
//ts_glossary_terms.gl_short_desc,
//ts_glossary_terms.gl_long_desc
//FROM
//ts_glossary_terms
//WHERE
//ts_glossary_terms.gl_id = :gl_id";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->bindParam(':gl_id', $this->getGl_id(), PDO::PARAM_INT);
//			$readstmt->execute();
//			$i = 0;
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[$i] = $row;
//				$directory = "../../asset_imageuploader/glterm/" . $row['gl_id'] . "/";
//				$files = scandir($directory);
//				$files = array_diff($files, ['.', '..', 'thumbnail']);
//				$files = array_values(array_filter($files));
//				if ($files[0] == NULL) {
//					$data[$i]['gl_img'] = "#";
//				} else {
//					$data[$i]['gl_img'] = $files[0];
//				}
//				$i++;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}

	public function getAllBlogByDate($blg_date) {
		$data = array();
		$sql = "SELECT
df_blog.blg_id,
df_blog.blg_year,
df_blog.blg_month,
df_blog.blg_date,
df_blog.blg_title,
df_blog.blg_body
FROM
df_blog
WHERE
df_blog.blg_date = :blg_date";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':blg_date', $blg_date, PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllBlogByToday() {
		$data = array();
		$sql = "SELECT
df_blog.blg_id,
df_blog.blg_year,
df_blog.blg_month,
df_blog.blg_date,
df_blog.blg_title,
df_blog.blg_body
FROM
df_blog
WHERE
df_blog.blg_date = :blg_date";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':blg_date', $this->getBlg_date(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function saveBlog() {
		$sql = "INSERT INTO `df_blog` (`blg_year`, `blg_month`, `blg_date`, `blg_title`, `blg_body`,`blg_maincat`,`blg_subcat`) VALUES (:blg_year, :blg_month, :blg_date, :blg_title, :blg_body,:blg_maincat,:blg_subcat);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':blg_year', $this->getBlg_year(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_month', $this->getBlg_month(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_date', $this->getBlg_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_title', $this->getBlg_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_body', $this->getBlg_body(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_maincat', $this->getBlg_maincat(), PDO::PARAM_INT);
			$createstmt->bindParam(':blg_subcat', $this->getBlg_subcat(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry save failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}
	
	public function saveBlogByLoggedUser() {
		$sql = "INSERT INTO `df_blog` (`blg_year`, `blg_month`, `blg_date`, `blg_title`, `blg_body`,`blg_maincat`,`blg_subcat`,`blg_usr`) VALUES (:blg_year, :blg_month, :blg_date, :blg_title, :blg_body,:blg_maincat,:blg_subcat,:blg_usr);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':blg_year', $this->getBlg_year(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_month', $this->getBlg_month(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_date', $this->getBlg_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_title', $this->getBlg_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_body', $this->getBlg_body(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_maincat', $this->getBlg_maincat(), PDO::PARAM_INT);
			$createstmt->bindParam(':blg_subcat', $this->getBlg_subcat(), PDO::PARAM_INT);
			$createstmt->bindParam(':blg_usr', $_SESSION['usr_id'], PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry save failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//	public function saveGLTerms() {
//		$sql = "INSERT INTO `ts_glossary_terms` (`gl_heading`, `gl_short_desc`, `gl_long_desc`) VALUES (:gl_heading, :gl_short_desc, :gl_long_desc);";
//		try {
//			$createstmt = $this->con->prepare($sql);
//			$createstmt->bindParam(':gl_heading', $this->getGl_heading(), PDO::PARAM_STR);
//			$createstmt->bindParam(':gl_short_desc', $this->getGl_short_desc(), PDO::PARAM_STR);
//			$createstmt->bindParam(':gl_long_desc', $this->getGl_long_desc(), PDO::PARAM_STR);
//			if ($createstmt->execute()) {
//				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
//			} else {
//				echo json_encode(array("msgType" => 2, "msg" => "Sorry save failed"));
//			}
//		} catch (Exception $exc) {
//			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
//		}
//	}

	public function deleteBlog() {
		$sql = "DELETE FROM `df_blog` WHERE (`blg_id`=:blg_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':blg_id', $this->getBlg_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! delete failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//	public function deleteGLTerms() {
//		$sql = "DELETE FROM `ts_glossary_terms` WHERE (`gl_id`=:gl_id);";
//		try {
//			$createstmt = $this->con->prepare($sql);
//			$createstmt->bindParam(':gl_id', $this->getGl_id(), PDO::PARAM_INT);
//			if ($createstmt->execute()) {
//				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
//			} else {
//				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! delete failed"));
//			}
//		} catch (Exception $exc) {
//			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
//		}
//	}

	public function editBlog() {
		$sql = "UPDATE `df_blog` SET `blg_id`=:blg_id, `blg_title`=:blg_title, `blg_body`=:blg_body, `blg_maincat`=:blg_maincat, `blg_subcat`=:blg_subcat WHERE (`blg_id` = :blg_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':blg_id', $this->getBlg_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':blg_title', $this->getBlg_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_body', $this->getBlg_body(), PDO::PARAM_STR);
			$createstmt->bindParam(':blg_maincat', $this->getBlg_maincat(), PDO::PARAM_INT);
			$createstmt->bindParam(':blg_subcat', $this->getBlg_subcat(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//	public function editGLTerms() {
//		$sql = "UPDATE `ts_glossary_terms` SET `gl_heading`=:gl_heading, `gl_short_desc`=:gl_short_desc, `gl_long_desc`=:gl_long_desc WHERE (`gl_id` = :gl_id);";
//		try {
//			$createstmt = $this->con->prepare($sql);
//			$createstmt->bindParam(':gl_id', $this->getGl_id(), PDO::PARAM_INT);
//			$createstmt->bindParam(':gl_heading', $this->getGl_heading(), PDO::PARAM_STR);
//			$createstmt->bindParam(':gl_short_desc', $this->getGl_short_desc(), PDO::PARAM_STR);
//			$createstmt->bindParam(':gl_long_desc', $this->getGl_long_desc(), PDO::PARAM_STR);
//			if ($createstmt->execute()) {
//				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
//			} else {
//				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! update failed"));
//			}
//		} catch (Exception $exc) {
//			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
//		}
//	}
}
