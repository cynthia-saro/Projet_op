<div class="card collapse" id="debuger">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        $_SESSION
                    </div>
                    <div class="card-body">
                        <?php var_dump($_SESSION);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        $_POST
                    </div>
                    <div class="card-body">
                        <?php var_dump($_POST);?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        $_GET
                    </div>
                    <div class="card-body">
                        <?php var_dump($_GET);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>