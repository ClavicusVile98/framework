<?php

/** @var \Model\Entity\User[] $usersList */
$body = function () use ($usersList, $path) {
    ?>
    <table cellpadding="40" cellspacing="0" border="0">
        <tr><td colspan="6" align="center">Пользователи сайта</td></tr>
        <?php
        $position = 0;
    foreach ($usersList as $key => $user) {
        echo $position % 3 ? '' : '<tr>'; ?>
            <td  colspan="2" style="text-align: center">
                <a href="<?= $path('users_list', ['id' => $user->getId()]) ?>"><?= $user->getLogin() ?></a>
                <br /><br />
                <?= $user->getName() ?>
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
        'title' => 'Пользователи',
        'body' => $body,
    ]
);
