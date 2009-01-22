<?php foreach ($options['model'] as $key => $model): ?>

<?php if (!$key || ($key > 0 && $options['rank'][$key] != $options['rank'][$key - 1])): ?>
<div class="dparts rankingResultList <?php ($options['rank'][$key] == 1) ? print('rank_top') : print('') ?>"><div class="ranking_parts">
<?php if ($options['rank'][$key] == 1): ?>
<div class="partsHeading">
<h3><?php echo $options['title'] ?></h3>
</div>
<?php else: ?>
<div class="ditem">
<?php endif; ?>
<div class="item">
<table>
<tbody>
<?php endif; ?>

<tr>
<td rowspan="<?php echo count($options['list'][$key]) + 1 ?>" class="photo">
<?php echo link_to(image_tag_sf_image($model->getImageFilename(), array('size' => '76x76')), sprintf($options['link_to_detail'], $model->getId())); ?>
</td>
</tr>

<?php foreach ($options['list'][$key] as $caption => $item) : ?>
<tr>
<th><?php echo $caption ?></th>
<td><?php echo $item ?></td>
</tr>
<?php endforeach; ?>

<?php if ($key == count($options['rank']) - 1 || $options['rank'][$key] != $options['rank'][$key + 1]): ?>
</tbody>
</table>
</div>
<?php if ($options['rank'][$key] != 1): ?>
</div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>

<?php endforeach; ?>
