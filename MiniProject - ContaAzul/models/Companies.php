<?php
class Companies extends model {

	private $companyInfo;

	public function __construct($id) {
		parent::__construct();

		$sql = $this->db->prepare("SELECT * FROM companies WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$this->companyInfo = $sql->fetch();
		}
	}

	public function getName() {
		if(isset($this->companyInfo['name'])) {
			return $this->companyInfo['name'];
		} else {
			return '';
		}
	}

}