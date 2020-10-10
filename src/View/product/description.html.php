<?php

/** @var \Model\Entity\Product $description */
$body = function () use ($description, $path) {
    ?>
    <table cellpadding="40" cellspacing="0" border="0">
	<tr><td colspan="6" align="center">Наши курсы</td></tr>
	<tr>
	    <td colspan="3" align="left">Сортировать по:
		<a href="<?= $path('description') ?>?sort=price">Цене</a>
		<a href="<?= $path('description') ?>?sort=name">Названию</a>
	    </td>
	</tr>
<?php
        $position = 0;
    foreach ($description as $key => $desc) {
        echo $position % 3 ? '' : '<tr>'; ?>
		<td  colspan="2" style="text-align: center">
		    <a href="<?= $path('product_info', ['id' => $desc->getID()]) ?>"><?= $desc->getName() ?></a>
		    <br /><br />
		    <?= $desc->getDescription() ?>
		</td>
<?php
            echo($position + 1) % 3 ? '' : '</tr>';
        ++$position;
    }
    echo $position % 3 ? str_repeat('<td></td>', 3 - $position % 3) . '</tr>' : ''; ?>
	</table>
<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Описание',
    'body' => $body,
    ]
);
