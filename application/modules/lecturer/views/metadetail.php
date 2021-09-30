		<?php
			$querywi = $this->db->query("SELECT * FROM `".$this->db->dbprefix('webinfo'));
			$rowwi = $querywi->row();
			
			$query_detail= $this->db->query("SELECT * FROM `".$this->db->dbprefix('lecturer')."` WHERE idlecturer='".$idlecturer."'");
			$rowd = $query_detail->row();
		?>
		
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo strip_tags(($rowd->profile));?>">
        <meta name="keywords" content="<?php echo lang('lecturer');?> - <?php echo $rowd->fullname; ?>">
        <meta name="author" content="<?php echo $rowwi->author; ?>">

        <title><?php echo lang('lecturer');?> - <?php echo $rowd->fullname; ?></title>