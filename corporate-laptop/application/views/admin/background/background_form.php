<div class="row-fluid">
	<div class="span7">
		<table class="table">
			<thead>
				<tr>
					<th>Background</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if($bg){?>
					<?php foreach($bg as $r){?>
					<tr>
						<td><img src="<?php echo base_url('uploads/images/th.php?src='.base_url('assets/background/'.$r->background_name).'&w=200&h=100')?>" alt=""/></td>
						<td><a  onclick='return confirm("Are you sure to delete?");' href="<?php echo base_url('admin/delete_background/'.$r->background_id.'?r='.current_url())?>">Delete</a></td>
					</tr>
					<?php } ?>
				<?php }else{?>
					<tr>
						<td colspan=2><center>No Background</center></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<br/>
<br/>
<div class="row-fluid">
	<div class="span7">
		<?php echo form_open_multipart('');?>
			<fieldset>
				<legend>Upload Gambar</legend>
				<input type="file" name="userfile" size="20" />
				<br />
				<br />
				<button class="btn btn-primary" type="submit" value="simpan">Simpan</button>
			</fieldset>
		</form>
	</div>
</div>