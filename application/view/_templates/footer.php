<footer class="footer" id="my-footer">
        <div class="container-fluid"> 
            <div class="row" id="footer-content">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="img-responsive">
                    <img id="footer-logo" src="<?php echo URL?>img/icon.png">
                </div>
            </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <ul class="footer-list" style="list-style: none;">
                    <li>
                        <h4 style="color: white">SFSU Software Engineering Project, Fall 2016. For Demonstration Only</h4>
                    </li>
                    <li>
                        <h4 style="color: white;"><a src="http://sfsuswe.com/~f16g03/mini/">&copy; 2016 Gatorspace </a></h4>
                    </li>
                </ul>
            </div>
        </div> 
        </div>   
</footer>

<!-- Register Modal -->
<form action="<?php echo URL; ?>user/register" method="POST" data-toggle="validator" role="form">
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="register-modal-header" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center gator-text" id="myModalLabel">Sign Up</h4>
                    <p class="text-center">Please sign up enjoy all the benefits.</p>
                </div>
            <div id="register-modal" class="modal-body">
                <div class="form-group">
                    <label for="inputName" class="control-label">Name</label>
                        <input type="text" pattern="^[_A-z]{2,}$" data-match-error="Name must 2 or more letters." class="register-modal-input form-control" name='firstName' placeholder="First Name" aria-describedby="sizing-addon2" required>
                        <div class="help-block"></div>
                    </div>
                <div class="form-group">
                    <label for="inputLastName" class="control-label">Last Name</label>
                        <input type="text" pattern="^[_A-z]{2,}$" data-match-error="Last name must be 2 or letters." class="register-modal-input form-control" name='lastName' placeholder="Last Name" aria-describedby="sizing-addon2" required>
                        <div class="help-block"></div>
                    </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label">Email</label>
                        <input type="email" pattern="^[_A-z]{2,}@sfsu.edu$" class="register-modal-input form-control" name='email' placeholder="Email Address" aria-describedby="sizing-addon2" required>
                        <div class="help-block">Email must have @sfsu.edu extension</div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label">Password</label>
                    <div class="form-inline row">
                        <div class="form-group col-sm-6">
                                <input type="password" pattern="^[_A-z0-9]{6,}$" id="inputPassword" class="register-modal-input form-control" name='password' placeholder="Password" aria-describedby="sizing-addon2" required data-minlength="6">
                                <div class="help-block">Minimum of 6 characters.</div>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="password" pattern="^[_A-z0-9]{6,}$" data-match="#inputPassword" id="inputPasswordConfirm" class="register-modal-input form-control" placeholder="Confirm Password" aria-describedby="sizing-addon2" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <input type="checkbox" name="terms_conditions" value="terms" required> I agree to the <a href="#"><u>terms and conditions</u></a><br>
                </div>
                <div id="register-modal-footer" class="modal-footer">
                    <div class="form-group">
                        <input type="submit" value="Cancel" class="btn btn-default" data-dismiss="modal"/>
                        <input type="submit" name="submit_user" id="btn-yellow" class="btn btn-default"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="text-center"> Already a member please <a href="#" data-toggle="modal" data-target="#signin-modal" data-dismiss="modal"class="gator-text"><u>Sign In</u></a></p>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Sign in Modal -->
<form action="<?php echo URL; ?>user/login" method="POST">
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="signin-modal-header" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center gator-text" id="myModalLabel">Sign In</h4>
                <!--  <p class="text-center">Please sign in enjoy all the benefits.</p> -->
                </div>
                <div id="register-modal" class="modal-body">
                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Email</label>
                            <input type="text" name="email" class="register-modal-input form-control" placeholder="Email Address" aria-describedby="sizing-addon2">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label">Password</label>
                            <input type="password" name="password" class="register-modal-input form-control" placeholder="Password" aria-describedby="sizing-addon2">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div id="register-modal-footer" class="modal-footer">
                    <input type="submit" value="Cancel" class="btn btn-default" data-dismiss="modal"/>
                    <input type="submit" name="submit_user" id="btn-yellow" class="btn btn-default"/>
                </div>
                <div class="modal-footer">
                    <p class="text-center"> Don't have an account? Please <a href="#" data-toggle="modal" data-target="#register-modal" data-dismiss="modal"class="gator-text"><u>Sign Up</u></a> </p>
                </div>
            </div>
        </div>
    </div>
</form>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="<?php echo URL; ?>js/dropzone.js"></script>
    <script src="<?php echo URL; ?>js/cookies.js"type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCglBXNPHjpHG4XUzT84K2I4zy-4nGCvw&libraries=places">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="<?php echo URL; ?>js/chat.js"type="text/javascript"></script>
</body>
</html>
