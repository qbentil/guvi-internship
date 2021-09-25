<?php
    require_once 'includes/snippets.php';
    $snippets = new Snippets();

    // HEADER
    echo $snippets->head();
?>

        <div class="row">
            <!-- // Photo -->
            <?php echo $snippets->user_photo(); ?>
            <div class="col-sm-8 col-md-8">
                <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <li> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a></li>
                    <li ><a class="nav-item nav-link " id="nav-security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="nav-home" aria-selected="true">Security</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php echo $snippets->profile_form(); ?>
                    </div>
                    <div class="tab-pane fade show " class = "needs-validation" id="security" role="tabpanel" aria-labelledby="nav-security-tab">
                        <?php echo $snippets->security_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
    require_once 'includes/scripts.php';
?>