<?php if(count($brandList)):?>
    <?php foreach($brandList as $kk=>$brand):?>
        <tr>      	
            <td><?php echo $brand['brand_logo_img']?></td>
            <td><?php echo $brand['brand_name']?></td>
            <td><?php echo $brand['brand_english_name']?></td>
            <td><?php echo $brand['brand_home_url']?></td>
        
            <td class="action-href">
            <a href="<?php echo $this->createUrl('brand/edit', array('id'=>$brand['brand_id']))?>">编辑</a>
            <a href="<?php echo $this->createUrl('brand/delete', array('id'=>$brand['brand_id']))?>">删除</a>
            </td>
        </tr>
     <?php endForeach?>
     <input type="hidden" id="count" value="<?php echo $count?>">
<?php endIf?>
        
		   