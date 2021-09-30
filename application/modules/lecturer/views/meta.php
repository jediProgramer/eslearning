		<?php
			$querywi = $this->db->query("SELECT * FROM `".$this->db->dbprefix('webinfo'));
			$rowwi = $querywi->row();
			
			$query_title = $this->db->query("SELECT subtitle FROM `".$this->db->dbprefix('bannerweb')."` WHERE title='".$title."'");
			$rowt = $query_title->row();
		?>
		
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $rowt->subtitle;?>">
        <meta name="keywords" content="<?php echo lang('lecturer');?> - <?php echo $rowwi->keyword; ?>">
        <meta name="author" content="<?php echo $rowwi->author; ?>">

        <title><?php echo lang('lecturer');?> - <?php echo $rowwi->websitename; ?></title>