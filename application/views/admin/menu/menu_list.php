<style type="text/css">
	form{
		margin:0;
	}
</style>

<div class="row-fluid">
	<div class="span5">
		<table class="table">
			<thead>
				<tr>
					<th colspan=2>Statik Page</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Home</td>
					<td style="width: 1%;">
						<?php echo form_open('','')?>
							<button type="submit" class="btn btn-small"><i class="icon-plus-sign"></i></button>
							<input type="hidden" name="menu_name" value="Home"/>
							<input type="hidden" name="menu_link" value="<?php echo base_url('home'); ?>"/>
						</form>
					</td>
				</tr>
				<tr>
					<td>Contact</td>
					<td>
						<?php echo form_open('','')?>
							<button type="submit" class="btn btn-small"><i class="icon-plus-sign"></i></button>
							<input type="hidden" name="menu_name" value="Contact"/>
							<input type="hidden" name="menu_link" value="<?php echo base_url('contact'); ?>"/>
							
						</form>
					</td>
				</tr>
				<tr>
					<th colspan=2>Page</th>
				</tr>
				<?php if($page){?>
				<?php foreach($page as $pag){?>
					<tr>
						<td><?php echo $pag->page_title; ?></td>
						<td>
							<?php echo form_open('','')?>
								<button type="submit" class="btn btn-small"><i class="icon-plus-sign"></i></button>
								<input type="hidden" name="menu_name" value="<?php echo $pag->page_title; ?>"/>
								<input type="hidden" name="menu_link" value="<?php echo base_url('page/'.$pag->page_slug); ?>"/>
								
							</form>
						</td>
					</tr>
				<?php } ?>
				<?php } ?>
				
			</tbody>
		</table><br/><br/>
		<?php echo form_open('','')?>
		  <fieldset>
			<legend>Custom Menu</legend>
			<label>Menu Title</label>
			<input  name="menu_name" type="text" value="">
			<label>Menu Link</label>
			<input  name="menu_link" type="text" value="">
			<br/>
			<button type="submit" class="btn">Submit</button>
		  </fieldset>
		</form>
	</div>
	<div class="span7">
		<?php echo form_open('admin/menu_order',''); ?>
		<table class="table">
			<thead>
				<tr>
					<th>Menu</th>
					<th style="width: 100px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if($menu){?>
					<?php foreach($menu_list as $ml){ ?>
						<tr>
							<td>
								<?php echo $ml['menu_name']?> <br/>
								link : <?php echo $ml['menu_link']?>
							</td>
							<td>
								<input type="hidden" name="menu_id[]" value="<?php echo $ml['menu_id']; ?>"/>
								<div class="input-append">
									<input type="text" name="menu_order[]" value="<?php echo $ml['menu_order']; ?>" style="width: 20px; border-radius: 5px 0px 0px 5px; text-align: center;"/>
									<a class="btn" href="<?php echo base_url('admin/menu_edit/'.$ml['menu_id'])?>" title="Edit"><i class="icon-pencil"></i></a> 
									<a class="btn" onclick='return confirm("Are you sure to delete?");' href="<?php echo base_url('admin/menu_delete/'.$ml['menu_id'])?>"  title="Delete"><i class="icon-remove"></i></a>
								</div>
							</td>
						</tr>
					<?php } ?>
				<?php }else{ ?>
					<tr>
						<td colspan=2><center>Not Found</center></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Save Order</button>
			  <button type="button" class="btn">Cancel</button>
			</div>
		</form>
	</div>
	<div class="clear"></div>
</div>