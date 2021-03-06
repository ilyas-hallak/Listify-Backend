<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 02.06.14
 * Time: 18:07
 * To change this template use File | Settings | File Templates.
 */
?>

<link rel="stylesheet" href="<?=base_url()?>css/bootstrap/bootstrap-tagsinput.css"/>
<script type="text/javascript" src="<?=base_url()?>/js/bootstrap-tagsinput.min.js"></script>

<div class="row">
    <div class="col-md-1" id="listElementMenu">
        <ul class="nav nav-pills nav-stacked pull-left">
            <li><a href="#" data-toggle="modal" data-target="#myModal2">Einladen</a></li>
        </ul>
    </div>
    <div class="col-md-7">
        <div class="list-group">
            <input id="createItemInput" autofocus type="text" style="width: 653px;" class="input list-group-item" placeholder="Neues Item" />
            <?php foreach($data as $item): ?>
                <a href="#" class="list-group-item" >
                    <span class="circle" style="background-color: #<?=$item->value?>;" data-toggle="tooltip" data-placement="left"  title="<?=$item->mail?>">&nbsp;</span>
                    <span><?=$item->text?></span>
                    <span class="pull-right">
                        <button type="button" data-toggle="tooltip" data-placement="right" data-id="<?=$item->id?>" title="Löschen" class="close" aria-hidden="true">&times;</button>
                    </span>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <?=form_open('Listelements/invite', array("id" => "createform", "class"=>"form-horizontal", "role"=>"form"))?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Neue Liste erstellen</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Mail</label>
                    <div class="col-sm-10">
                        <input type="text" data-role="tagsinput" class="form-control" name="mails" id="mails" placeholder="mail@example.com">
                        <input type="hidden" name="list_id" id="list_id" value="<?=$list_id?>">

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

<script type="text/javascript">
    LIST_ID = <?=$list_id?>;
    $(function() {

        $('#createItemInput').bind("enterKey",function(e){
            $this = $(this);
            var text = $this.val();

            $.post("http://localhost:8888/listify-backend/index.php/listelements/create", { "text": text, "amount": 1, "list_id": LIST_ID})
            .done(function( data ) {
                    var item = createNewItem(data.mail, text, data.color);
                    $('input#createItemInput').after(item);
                    $this.val('');
            });
        });
        $('#createItemInput').keyup(function(e){
            if(e.keyCode == 13)
            {
                $(this).trigger("enterKey");
            }
        });

        $("body").on("click", "button.close", function(e){
            var id = $(this).data('id');
            $.post("http://localhost:8888/listify-backend/index.php/listelements/delete", {"id": id})
            .done(function( data ) {
                // TODO NACHRICHT ANZEIGEN!!
            });
            $this = $(this).parent().parent();
            $this.css("background-color", "#e74c3c");
            $this.fadeOut();
        });
    });

    var createNewItem = function (mail, text, color) {
        return html = '<a href="#" class="list-group-item" ><span class="circle" style="background-color: #'+color+'" data-toggle="tooltip" data-placement="left"  title="__">&nbsp;</span><span> '+text+'</span><span class="pull-right"><button type="button" data-toggle="tooltip" data-placement="right"  title="Löschen" class="close" aria-hidden="true">&times;</button></span> </a>';
    };
</script>