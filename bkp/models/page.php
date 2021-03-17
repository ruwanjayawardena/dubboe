<?php

include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class Page extends ConnectDB {

	private $flag = false;
	private $pgs_id;
	private $pgs_heading;
	private $pgs_content;
	private $pgs_filter_one;
	private $pgs_filter_two;
	private $pgs_style;
	private $pgs_link_name;
	private $flh_id;
	private $fls_id;

	public function getPgs_link_name() {
		return $this->pgs_link_name;
	}

	public function setPgs_link_name($pgs_link_name) {
		$this->pgs_link_name = $pgs_link_name;
		return $this;
	}

	public function getFls_id() {
		return $this->fls_id;
	}

	public function setFls_id($fls_id) {
		$this->fls_id = $fls_id;
		return $this;
	}

	public function getFlh_id() {
		return $this->flh_id;
	}

	public function setFlh_id($flh_id) {
		$this->flh_id = $flh_id;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getPgs_id() {
		return $this->pgs_id;
	}

	public function getPgs_heading() {
		return $this->pgs_heading;
	}

	public function getPgs_content() {
		return $this->pgs_content;
	}

	public function getPgs_filter_one() {
		return $this->pgs_filter_one;
	}

	public function getPgs_filter_two() {
		return $this->pgs_filter_two;
	}

	public function getPgs_style() {
		return $this->pgs_style;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setPgs_id($pgs_id) {
		$this->pgs_id = $pgs_id;
		return $this;
	}

	public function setPgs_heading($pgs_heading) {
		$this->pgs_heading = $pgs_heading;
		return $this;
	}

	public function setPgs_content($pgs_content) {
		$this->pgs_content = $pgs_content;
		return $this;
	}

	public function setPgs_filter_one($pgs_filter_one) {
		$this->pgs_filter_one = $pgs_filter_one;
		return $this;
	}

	public function setPgs_filter_two($pgs_filter_two) {
		$this->pgs_filter_two = $pgs_filter_two;
		return $this;
	}

	public function setPgs_style($pgs_style) {
		$this->pgs_style = $pgs_style;
		return $this;
	}

	public function allPageSection() {
		$data = array();
		$sql = "SELECT
df_pagefilter_one.flh_name,
df_pagefilter_two.fls_name,
df_pages.pgs_style,
df_pages.pgs_filter_two,
df_pages.pgs_filter_one,
df_pagestyle.sty_name,
df_pagestyle.sty_class,
df_pages.pgs_content,
df_pages.pgs_heading,
df_pages.pgs_link_name,
df_pages.pgs_id
FROM
df_pages
INNER JOIN df_pagefilter_one ON df_pages.pgs_filter_one = df_pagefilter_one.flh_id
INNER JOIN df_pagefilter_two ON df_pagefilter_two.fls_head = df_pagefilter_one.flh_id AND df_pages.pgs_filter_two = df_pagefilter_two.fls_id
INNER JOIN df_pagestyle ON df_pages.pgs_style = df_pagestyle.sty_id
ORDER BY
df_pages.pgs_id ASC";
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
	
	public function getPageSectionByID() {
		$data = array();
		$sql = "SELECT
df_pagefilter_one.flh_name,
df_pagefilter_two.fls_name,
df_pages.pgs_style,
df_pages.pgs_filter_two,
df_pages.pgs_filter_one,
df_pagestyle.sty_name,
df_pagestyle.sty_class,
df_pages.pgs_content,
df_pages.pgs_heading,
df_pages.pgs_link_name,
df_pages.pgs_id
FROM
df_pages
INNER JOIN df_pagefilter_one ON df_pages.pgs_filter_one = df_pagefilter_one.flh_id
INNER JOIN df_pagefilter_two ON df_pagefilter_two.fls_head = df_pagefilter_one.flh_id AND df_pages.pgs_filter_two = df_pagefilter_two.fls_id
INNER JOIN df_pagestyle ON df_pages.pgs_style = df_pagestyle.sty_id
WHERE
df_pages.pgs_id = :pgs_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':pgs_id', $this->getPgs_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function getPageSectionByURLName() {
		$data = array();
		$sql = "SELECT
df_pagefilter_one.flh_name,
df_pagefilter_two.fls_name,
df_pages.pgs_style,
df_pages.pgs_filter_two,
df_pages.pgs_filter_one,
df_pagestyle.sty_name,
df_pagestyle.sty_class,
df_pages.pgs_content,
df_pages.pgs_heading,
df_pages.pgs_link_name,
df_pages.pgs_id
FROM
df_pages
INNER JOIN df_pagefilter_one ON df_pages.pgs_filter_one = df_pagefilter_one.flh_id
INNER JOIN df_pagefilter_two ON df_pagefilter_two.fls_head = df_pagefilter_one.flh_id AND df_pages.pgs_filter_two = df_pagefilter_two.fls_id
INNER JOIN df_pagestyle ON df_pages.pgs_style = df_pagestyle.sty_id
WHERE
df_pages.pgs_link_name = :pgs_link_name";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':pgs_link_name', $this->getPgs_link_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function cmbPagefilter1() {
		$data = array();
		$sql = "SELECT
df_pagefilter_one.flh_id,
df_pagefilter_one.flh_name
FROM
df_pagefilter_one
ORDER BY
df_pagefilter_one.flh_id ASC";
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

	public function cmbPageStyle() {
		$data = array();
		$sql = "SELECT
df_pagestyle.sty_id,
df_pagestyle.sty_name,
df_pagestyle.sty_class
FROM
df_pagestyle
ORDER BY
df_pagestyle.sty_id ASC";
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

	public function cmbPagefilter2() {
		$data = array();
		$sql = "SELECT
df_pagefilter_two.fls_id,
df_pagefilter_two.fls_head,
df_pagefilter_two.fls_name
FROM
df_pagefilter_two
WHERE
df_pagefilter_two.fls_head = :flh_id
ORDER BY
df_pagefilter_two.fls_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':flh_id', $this->getFlh_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function addPageSection() {
		$sql = "INSERT INTO `df_pages` (`pgs_link_name`, `pgs_heading`, `pgs_content`, `pgs_filter_one`, `pgs_filter_two`, `pgs_style`) VALUES (:pgs_link_name, :pgs_heading, :pgs_content, :pgs_filter_one, :pgs_filter_two, :pgs_style);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':pgs_link_name', $this->getPgs_link_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':pgs_heading', $this->getPgs_heading(), PDO::PARAM_STR);
			$createstmt->bindParam(':pgs_content', $this->getPgs_content(), PDO::PARAM_STR);
			$createstmt->bindParam(':pgs_filter_one', $this->getPgs_filter_one(), PDO::PARAM_INT);
			$createstmt->bindParam(':pgs_filter_two', $this->getPgs_filter_two(), PDO::PARAM_INT);
			$createstmt->bindParam(':pgs_style', $this->getPgs_style(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editPageSection() {
		$sql = "UPDATE `df_pages` SET `pgs_link_name`=:pgs_link_name, `pgs_heading`=:pgs_heading, `pgs_content`=:pgs_content, `pgs_filter_one`=:pgs_filter_one, `pgs_filter_two`=:pgs_filter_two, `pgs_style`=:pgs_style WHERE (`pgs_id` = :pgs_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':pgs_link_name', $this->getPgs_link_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':pgs_heading', $this->getPgs_heading(), PDO::PARAM_STR);
			$createstmt->bindParam(':pgs_content', $this->getPgs_content(), PDO::PARAM_STR);
			$createstmt->bindParam(':pgs_filter_one', $this->getPgs_filter_one(), PDO::PARAM_INT);
			$createstmt->bindParam(':pgs_filter_two', $this->getPgs_filter_two(), PDO::PARAM_INT);
			$createstmt->bindParam(':pgs_style', $this->getPgs_style(), PDO::PARAM_INT);
			$createstmt->bindParam(':pgs_id', $this->getPgs_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function removePageSection() {
		$sql = "DELETE FROM `df_pages` WHERE (`pgs_id` = :pgs_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':pgs_id', $this->getPgs_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
