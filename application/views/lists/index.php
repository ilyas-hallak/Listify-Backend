<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 25.05.14
 * Time: 22:56
 * To change this template use File | Settings | File Templates.
 */

?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contentData as $item):?>
            <tr>
                <td><?=$item->name?></td>
                <td>
                    <a href="<?=site_url('listelements/index/' + $item->id)?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="#"><span class="glyphicon glyphicon-edit"></span></a>

                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

