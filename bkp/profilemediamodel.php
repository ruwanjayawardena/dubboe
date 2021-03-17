<?php include './access_control/modeladmin_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
        <?php include './includes/head-block.php'; ?>
        <style>
            iframe{
                height: 1000px;
                border: none;
                overflow-y: hidden !important;
            }
            
             
        </style>
    </head>
    <body>
        <!--navbar-->
        <?php include 'includes/backend-navbar.php'; ?>        

        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">                
                <div class="row">
                    <div class="col-lg-6 col-sm-12 text-center">
                        <h2><i class="fas fa-lock-open"></i> Public Media</h2>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <h4 class="text-center mt-4"><i class="fa fa-lg fa-image"></i> Photos</h4>
                                <div class="well well-lg">
                                    <iframe  id="iframe_publicphotos" width="100%"></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <h4 class="text-center mt-4"><i class="fa fa-lg fa-camera"></i> Videos</h4>
                                <div class="well well-lg">
                                    <iframe  id="iframe_publicvideos" width="100%"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 text-center">
                        <h2><i class="fas fa-lock"></i> Private Media</h2>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <h4 class="text-center mt-4"><i class="fa fa-lg fa-image"></i> Photos</h4>
                                <div class="well well-lg">
                                    <iframe  id="iframe_privatephotos" width="100%"></iframe>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <h4 class="text-center mt-4"><i class="fa fa-lg fa-camera" ></i> Videos</h4>
                                <div class="well well-lg">
                                    <iframe  id="iframe_privatevideos" width="100%"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>  

                </div>

            </div>
        </div>
    </section>
    <?php
    include './includes/end-block.php';
    include './includes/commonJS.php';
    ?>  
    <script>

        function modelMediaUploadIFRAME() {
            $.post('controllers/modelController.php', {action: 'getModelProfileInfo'}, function (e) {
                $.each(e, function (index, qdt) {
                    $("#iframe_publicphotos").attr("src", "model_publicphotoupload.php?mo_id=" + qdt.mo_id);
                    $("#iframe_publicvideos").attr("src", "model_publicvideoupload.php?mo_id=" + qdt.mo_id);
                    $("#iframe_privatephotos").attr("src", "model_privatephotoupload.php?mo_id=" + qdt.mo_id);
                    $("#iframe_privatevideos").attr("src", "model_privatevideoupload.php?mo_id=" + qdt.mo_id);

                });




            }, "json");
        }

        $(document).ready(function () {
modelMediaUploadIFRAME();

        });
    </script>
</body>
</html>