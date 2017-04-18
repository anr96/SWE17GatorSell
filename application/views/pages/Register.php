<div class="container-fluid">   
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center"><br>
       <div class="panel panel-default">
       <h2>REGISTER</h2>
       
       <form action='<?= site_url('register_confirmation');?>' method="POST">
            <div class="form-group">
                <label for="name">NAME</label><br>
                <input type="text" id="name" name="name" class="input-xlarge">
                <p></p>
            </div>
 
            <div class="form-group">
                <label for="email">EMAIL</label><br>
                <input type="email" id="email" name="email" class="input-xlarge">
                <p class="help-block">Please provide your SFSU email</p>
            </div>
 
            <div class="form-group">
                <label for="phone">PHONE NUMBER</label><br>
                <input type="text" id="phone" name="phone"class="input-xlarge">
                <p class="help-block">(555) 555-5555</p>
            </div>
            
            <div class="form-group">      
                <label for="password">PASSWORD</label><br>
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">At least 7 characters</p>
            </div>
 
            <div class="control-group">
            <!-- needs to check that they're the same password -->
                <label for="confirm_password">CONFIRM PASSWORD</label><br>
                <input type="password" id="password_confirm" name="confirm_password" placeholder="" class="input-xlarge">
                <p class="help-block">Please confirm password</p>
            </div>
    
            <div class="form-group">
               <p><input type="checkbox" name="terms" autocomplete="off">
                   I agree to the <a href="<?= site_url('terms');?>"> Terms & Conditions</a></p>
            </div>
           
            <div class="form-group">
                <a class="btn btn-danger" href="<?= site_url();?>">Cancel</a>
                <button class="btn btn-success"><a href="<?= site_url('register_confirmation');?>" style="color:white">Register</a></button>
            </div>
           
        </form> 
    </div>
    </div>
    <div class="col-md-3"></div>            
        
</div>

