<?php
echo <<<END
 <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Browse</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact FoxFix</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Marist College 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Helper file -->
    <script src="js/helpers.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--Toasting code-->
    <script src="js/toastr.min.js"></script>

    <script type="text/javascript">
    // Toasts user when certain actions performed:

        $(document).ready(function() {
        var status = getUrlParameter('status');
        if(status == "signup"){
            toastr.success('Signup completed successfully!', 'Success!');
        } else if(status == "additem"){
            toastr.success('Item added successfully!', 'Success!');
        } else if (status == "notLoggedIn"){
            toastr.error('You must be logged in.', 'Please Log In', {timeOut:700});
        } else if (status == "invalidSignup"){
            toastr.error('Invalid signup. Please check your credentials.', 'Invalid', {timeOut:700});
        }
    });
    </script>
END;
?>