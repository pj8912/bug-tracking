<?php session_start(); ?>
<?php

require_once  'vendor/autoload.php';

use BugTracking\Config\Config;
use BugTracking\Templates\Template;

$template = new Template();


error_reporting(E_ALL);
ini_set('display_errors', 'On');




//header
$template->main_header('Home');

if (isset($_SESSION['u_id'])) {
    $template->main_navbar(true);
} else {

    $template->main_navbar(false);
}
?>

<?php if (isset($_SESSION['u_id'])) : ?>
    <div class="container">
        <div class="card card-body bg-light mt-5 w-50 m-auto">
            <a href="admin/admin.php" class="text-center h4" style="text-decoration: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug" viewBox="0 0 16 16">
                    <path d="M4.355.522a.5.5 0 0 1 .623.333l.291.956A4.979 4.979 0 0 1 8 1c1.007 0 1.946.298 2.731.811l.29-.956a.5.5 0 1 1 .957.29l-.41 1.352A4.985 4.985 0 0 1 13 6h.5a.5.5 0 0 0 .5-.5V5a.5.5 0 0 1 1 0v.5A1.5 1.5 0 0 1 13.5 7H13v1h1.5a.5.5 0 0 1 0 1H13v1h.5a1.5 1.5 0 0 1 1.5 1.5v.5a.5.5 0 1 1-1 0v-.5a.5.5 0 0 0-.5-.5H13a5 5 0 0 1-10 0h-.5a.5.5 0 0 0-.5.5v.5a.5.5 0 1 1-1 0v-.5A1.5 1.5 0 0 1 2.5 10H3V9H1.5a.5.5 0 0 1 0-1H3V7h-.5A1.5 1.5 0 0 1 1 5.5V5a.5.5 0 0 1 1 0v.5a.5.5 0 0 0 .5.5H3c0-1.364.547-2.601 1.432-3.503l-.41-1.352a.5.5 0 0 1 .333-.623zM4 7v4a4 4 0 0 0 3.5 3.97V7H4zm4.5 0v7.97A4 4 0 0 0 12 11V7H8.5zM12 6a3.989 3.989 0 0 0-1.334-2.982A3.983 3.983 0 0 0 8 2a3.983 3.983 0 0 0-2.667 1.018A3.989 3.989 0 0 0 4 6h8z" />
                </svg>
                Bug Tracking
            </a>
            <div style="display:flex;flex-direction:row; margin: 0 auto;margin-top:30px;text-decoration:none">
                <a style="padding:10px; border:1px solid #eee;margin:2px;background:white;color:black;text-decoration:none; font-size:25px;border-radius:25px;" 
                href="<?php echo Config::$home?>/project/projects.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-postcard m-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z" />
                    </svg>
                    <span style="text-decoration:none"> Projects </span> </a>
                <a style="padding:10px; border:1px solid #eee;margin:2px;background:white;color:black;text-decoration:none; font-size:25px;border-radius:25px;" 
                href="<?php echo Config::$home?>/ticket/tickets.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-perforated m-1" viewBox="0 0 16 16">
                        <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z" />
                        <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z" />
                    </svg>
                    <span style="text-decoration:none"> Tickets </span> </a>
            </div>
        </div>

    </div>
<?php endif; ?>


<?php if (!isset($_SESSION['u_id'])) : ?>

    <!-- login -->
    <div class="container">
        <div class="bg-white mt-5 card card-body col-md-6 m-auto login-form">
            <p align="center" class="h1 p-1">BugTracking</p><br>

            <h4 class="mt-4">Login</h3>
                <form action="user/login.php" method="post">

                    <div class="mb-2">
                        <input type="email" name="email" class='form-control' placeholder="Email">
                    </div>
                    <div class="mb-2">
                        <input type="password" name="pwd" class='form-control' placeholder="Password">
                    </div>
                    <div class="d-grid gap-2" align="center">
                        <button name="lbtn" type="submit" class="btn btn-primary ">
                            login
                        </button>
                    </div>

                </form>
                <p align="Center" class="mt-5"> Don't Have and account <a href="user/signup.php">Sign Up</a> </p>
        </div>
    <?php endif; ?>

    </div>

    <?php

    $template->main_footer();

    ?>