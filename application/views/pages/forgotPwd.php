<div class="container-fluid">
    <div class="text-center">
        <h2>Forgot Password?</h2>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center"><br>
        <?= validation_errors()?>
        <form method="post" action="<?= site_url('login/forgot_password')?>">
            <div class="form-group">
                <label for="email">Enter your email here:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= set_value('email')?>">
            </div>
            <div class ="text-right">
                    <a href="<?=$_SESSION['cancel_destination'] ?>" class="btn btn-danger">Cancel</a>

                    <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>


    </div>
    <div class="col-md-3"></div>   
</div>

