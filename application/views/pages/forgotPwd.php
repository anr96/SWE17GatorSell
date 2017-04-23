<div class="container-fluid">
    <div class="text-center">
        <h2>Forgot Password?</h2>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center"><br>

        <form>
            <div class="form-group">
                <label for="email">Enter your email here:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class ="text-right">
                    <a href="cancel_destination; ?>"<button type="cancel" class="btn btn-danger">Cancel</button> </a>

                    <a href="<?= site_url('forgotpwd_confirmation'); ?>"<button type="submit" class="btn btn-success">Submit</button> </a>
            </div>
        </form>


    </div>
    <div class="col-md-3"></div>   
</div>

