<div id="breadCrumb">
	<?php 
	foreach($this->crumb as $crumb)
	{
		if(isset($crumb['url']))
		{
			echo CHtml::link($crumb['name'], $crumb['url']);
		}else{
			echo $crumb['name'];
		}
		if(next($this->crumbs))
		{
			echo $this->delimiter;
		}
	}
	
	?>
</div>
