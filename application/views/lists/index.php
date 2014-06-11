<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 25.05.14
 * Time: 22:56
 * To change this template use File | Settings | File Templates.
 */

?>


<div class="row">
    <div class="col-md-2" id="listElementMenu">
        <ul class="nav nav-pills nav-stacked pull-left">
            <li class=""><a href="#" data-toggle="modal" data-target="#myModal">Neue Liste Erstellen</a></li>
        </ul>
    </div>
    <div class="col-md-7">
        <table class="table table-striped table-hover table-condensed">
            <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($contentData as $item): ?>
                    <tr>
                        <td><?=$item->name?></td>
                        <td>
                            <a href="<?=site_url('listelements/index/' . $item->id) ?>" title="Detail Ansicht"><span
                                    class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="#" title="Bearbeiten"><span class="glyphicon glyphicon-edit"></span></a>

                            <a href="#" data-toggle="modal" data-target="#ModalAlert" title="Alert legen"><span
                                    class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?=form_open('lists/create', array("id" => "createform", "class"=>"form-horizontal", "role"=>"form"))?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Neue Liste erstellen</h4>
                </div>
                <div class="modal-body">


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <?=form_open('alert/create', array("id" => "createform", "class"=>"form-horizontal", "role"=>"form"))?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Erinnerung anlegen</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Zeit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="zeit" id="zeit" placeholder="00:00">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Speichern</button>
            </div>
            </form>
        </div>
    </div>
</div>


