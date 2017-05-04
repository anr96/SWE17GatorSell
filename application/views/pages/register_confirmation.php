
<div class="container-fluid">
    <div class="text-center">
        <h1>Thank you for signing up with GatorSell!</h1> 
        <p>Please check your email for a confirmation code to activate your account.</p>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center"><br>
        <?=validation_errors()?>
        <form method="post" action="<?= site_url('register/activate')?>">
            <div class="form-group">
                <label for="code">Enter your confirmation code:</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="confimation code">
            </div>
            <div class ="text-right">
                <a href="<?= $_SESSION['cancel_destination'] ?>" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>

    </div>
    <div class="col-md-3"></div>   
</div>

