<table class="table">
	<thead>
		<tr>
			<th>Page</th>
			<th>Management</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Home</td>
			<td><a href="<?php echo base_url('admin/add_background/home')?>">Add Background</a></td>
		</tr>
		<tr>
			<td>News & Publication</td>
			<td><a href="<?php echo base_url('admin/add_background/news')?>">Add Background</a></td>
		</tr>
		<?php if($page){?>
		<?php foreach($page as $r){?>
			<tr>
				<td><?php echo $r->page_title?></td>
				<td><a href="<?php echo base_url('admin/add_background/'.$r->page_slug)?>">Add Background</a></td>
			</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
	<thead>
		<tr>
			<th colspan=2>Our People</th>
		</tr>
	</thead>
	<tbody>
		<?php if($page_our_people){?>
		<?php foreach($page_our_people as $pop){?>
			<tr>
				<td><?php echo $pop->page_title?></td>
				<td><a href="<?php echo base_url('admin/add_background/'.$pop->page_slug)?>">Add Background</a></td>
			</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
	<thead>
		<tr>
			<th colspan=2>Associates</th>
		</tr>
	</thead>
	<tbody>
		<?php if($associates_lis){?>
		<?php foreach($associates_lis as $ass){?>
			<tr>
				<td><?php echo $ass->page_title?></td>
				<td><a href="<?php echo base_url('admin/add_background/'.$ass->page_slug)?>">Add Background</a></td>
			</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
	<thead>
		<tr>
			<th colspan=2>Consultants</th>
		</tr>
	</thead>
	<tbody>
		<?php if($consultants_lis){?>
		<?php foreach($consultants_lis as $csl){?>
			<tr>
				<td><?php echo $csl->page_title?></td>
				<td><a href="<?php echo base_url('admin/add_background/'.$csl->page_slug)?>">Add Background</a></td>
			</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
	
	<thead>
		<tr>
			<th colspan=2>Areas of Expertise</th>
		</tr>
	</thead>
	<tbody>
		<?php if($page_areas_of_expertise){?>
		<?php foreach($page_areas_of_expertise as $paoe){?>
			<tr>
				<td><?php echo $paoe->page_title?></td>
				<td><a href="<?php echo base_url('admin/add_background/'.$paoe->page_slug)?>">Add Background</a></td>
			</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
</table>