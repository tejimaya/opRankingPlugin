<?php foreach ($option['model'] as $key => $model): ?>

<?php if (!$key || ($key > 0 && $option['rank'][$key] != $option['rank'][$key - 1])): ?>
<div class="dparts rankingResultList"><div class="ranking_parts">
<?php if ($option['rank'][$key] == 1): ?>
<div class="partsHeading">
<h3><?php echo $option['title'] ?></h3>
</div>
<?php else: ?>
<div class="ditem">
<?php endif; ?>
<div class="item">
<table>
<tbody>
<?php endif; ?>

<tr>
<td rowspan="<?php echo count($option['list'][$key]) + 1 ?>" class="photo">
<?php echo link_to(image_tag_sf_image($model->getImageFilename(), array('size' => '76x76')), sprintf($option['link_to_detail'], $model->getId())); ?>
</td>
</tr>

<?php foreach ($option['list'][$key] as $caption => $item) : ?>
<tr>
<th><?php echo $caption ?></th>
<td><?php echo $item ?></td>
</tr>
<?php endforeach; ?>

<?php if ($key == count($option['rank']) - 1 || $option['rank'][$key] != $option['rank'][$key + 1]): ?>
</tbody>
</table>
</div>
<?php if ($option['rank'][$key] != 1): ?>
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>

<?php endforeach; ?>
