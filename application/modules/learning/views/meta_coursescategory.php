		<?php
			$querywi = $this->db->query("SELECT * FROM ".$this->db->dbprefix('webinfo')." WHERE idlanguage='".$idlanguage."'");
			$rowwi = $querywi->row();
			
			$querycategory = $this->db->query("SELECT * FROM ".$this->db->dbprefix('category')." WHERE idcategory ='".$idcategory."'");
			$rowcategory = $querycategory->row();
		?>
		
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $menutitle; ?> - <?php echo $rowwi->description; ?>">
        <meta name="keywords" content="<?php echo $menutitle; ?> - <?php echo $rowwi->keyword; ?>">
        <meta name="author" content="<?php echo $rowwi->author; ?>">

        <title><?php echo lang('category') ?> <?php echo $rowcategory->title; ?> - <?php echo $rowwi->websitename; ?></title>