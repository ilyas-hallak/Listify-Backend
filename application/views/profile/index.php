<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ilyas
 * Date: 06.07.14
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */

?>

<h3>jojoo</h3>

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?=$mail?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Profilbild</label>
        <div class="col-sm-10">
            <input type="file" id="exampleInputFile">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>

</form>