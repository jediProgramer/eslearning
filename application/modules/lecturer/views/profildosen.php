		<div class="row">
        <div class="col-12">
          
          <div class="card">
		  
			<?php
					$queryimg = $this->db->query("SELECT fullname, picture FROM `".$this->db->dbprefix('lecturer')."` WHERE idlecturer='".$idlecturer."'");
					$row = $queryimg->row();
					$fullname=$row->fullname;
					$picture=$row->picture;
					?>
					<table class="table">
						<tr>
							<th width="10%" ><img src="http://localhost/webdepilkomupi/assets/files/lecturer/<?php echo $picture;?>" width="150px" height="200px"></th>
							<td valign="center"><br/><br/><br/><h1><b><?php echo $fullname; ?></b></h1></td>
						</tr>
					</table>
					<div class="table-responsive">
                    <table class="table">
				<?php
					foreach($data as $d)
					{
			   ?>		
                      <tr>
                        <th style="width:30%">NIP</th>
                        <td><?php echo $d["nip"]; ?></td>
                      </tr>
                      <tr>
                        <th>NIDN</th>
                        <td><?php echo $d["nidn"]; ?></td>
                      </tr>
                      <tr>
                        <th>Golongan, Pangkat</th>
                        <td><?php echo $d["golongan"]; ?>, <?php echo $d["pangkat"]; ?></td>
                      </tr>
					  <tr>
                        <th>Jabatan Fungsional</th>
                        <td><?php echo $d["jafung"]; ?></td>
                      </tr>
					  <tr>
                        <th>Jabatan Struktural</th>
                        <td><?php if($d["jabatan"]=="Tidak Menjabat"){ echo "-"; }else{ echo $d["jabatan"];} ?></td>
                      </tr>
					   <tr>
                        <th>Program Studi</th>
                        <td><?php echo $d["programmes"]; ?></td>
                      </tr>
					   <tr>
                        <th>Bidang Keilmuan</th>
                        <td><?php echo $d["kbk"]; ?></td>
                      </tr>
					   <tr>
                        <th>No. Telepon</th>
                        <td><?php echo $d["phoneno"]; ?></td>
                      </tr>
					   <tr>
                        <th>Email</th>
                        <td><?php echo $d["email"]; ?></td>
                      </tr>
					   <tr>
                        <th>Website</th>
                        <td><?php echo $d["website"]; ?></td>
                      </tr>
					   <tr>
                        <th>Alamat Kantor</th>
                        <td><?php echo $d["address"]; ?></td>
                      </tr>
					   <tr>
                        <th>Profil</th>
                        <td><?php echo $d["profile"]; ?></td>
                      </tr>
					   <tr>
                        <th>Area Penelitian</th>
                        <td><?php echo $d["research_areas"]; ?></td>
                      </tr>
					   <tr>
                        <th>Minat Penelitian</th>
                        <td><?php echo $d["research_interests"]; ?></td>
                      </tr>
					   <tr>
                        <th>Sinta ID</th>
                        <td><?php echo $d["sinta_id"]; ?></td>
                      </tr>
					   <tr>
                        <th>Scopus ID</th>
                        <td><?php echo $d["scopus_id"]; ?></td>
                      </tr>
					   <tr>
                        <th>Google Scholar ID</th>
                        <td><?php echo $d["google_scholar_id"]; ?></td>
                      </tr>
				<?php
					}
			   ?>	
              
                    </table>
                  </div>
			
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  