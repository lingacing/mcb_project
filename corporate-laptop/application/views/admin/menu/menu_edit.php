<div class="row-fluid">
	<div class="span5">
		<?php echo form_open('','')?>
		  <fieldset>
			<legend>Custom Menu</legend>
			<label>Menu Title</label>
			<input  name="menu_name" type="text" value="<?php echo $menu->menu_name; ?>">
			<label>Menu Link</label>
			<input  name="menu_link" type="text" value="<?php echo $menu->menu_link; ?>">
			<br/>
			<button type="submit" class="btn">Submit</button>
		  </fieldset>
		</form>
	</div>
</div>