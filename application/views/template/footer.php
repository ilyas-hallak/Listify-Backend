</div><!-- /.container -->

<div class="footer">
    <p style="text-align: center;">© HYN Inc. 2014</p>
</div>

<div class="top-right notifications" style="top: 74px;"></div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../../js/bootstrap.min.js"></script>
<script src="<?= base_url();?>js/bootstrap-notify.js"></script>

<audio id="alertSound" src="<?= base_url();?>sounds/alert.wav">
    <p>Your browser does not support the audio element </p>
</audio>

<script>
    var USER_ID = <?=$this->session->userdata('logged_in')["id"]?>;
    var URL_TO_REMINDER = "<?=site_url("Alert/reminderAjax");?>";
    $(document).ready(function() {
        $("[data-toggle='tooltip']").tooltip({
        });

        setInterval(function(){
            $.post(URL_TO_REMINDER, {"user_id": USER_ID})
            .done(function( data ) {
                if(data) {
                    try {
                        if(!$('.top-right').text().length) {
                            $('.top-right').notify({
                                message: { text: 'Erinnerung an die Liste: ' + data[0].name },
                                fadeOut: { enabled: true, delay: 50000 }
                            }).show(); // for the ones that aren't closable and don't fade out there is a .hide() function.
                            var v = document.getElementsByTagName("audio")[0];
                            v.play();
                        }
                    } catch(e) { console.log(e);}
                }
            });
        }, 5000);


    });
</script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>
