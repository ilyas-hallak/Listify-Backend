<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 02.06.14
 * Time: 18:07
 * To change this template use File | Settings | File Templates.
 */

?>


<div class="row">
    <div class="col-md-1" id="listElementMenu">
        <ul class="nav nav-pills nav-stacked pull-left">
            <li class=""><a href="#">Erstellen</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal2">Einladen</a></li>
        </ul>
    </div>
    <div class="col-md-7">
        <div class="list-group">
            <?php foreach($data as $item): ?>
                <a href="#" class="list-group-item " data-toggle="tooltip" data-placement="left"  title="<?=$item->mail?>">
                    <?=$item->text?>
                    <span class="pull-right">
                        <div class="circle" style="background-color: #<?=$item->value?>;">&nbsp;</div>
                    </span>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <?=form_open('lists/create', array("id" => "createform", "class"=>"form-horizontal", "role"=>"form"))?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Neue Liste erstellen</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Mail</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mail" id="mail" placeholder="mail@example.com">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Einladen</button>
            </div>
            </form>
        </div>
    </div>
</div>
