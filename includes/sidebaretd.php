<?php
// if ($_SESSION['auth'] == true)
if (isset($_SESSION['auth'])) {
    $message = $_SESSION['message'];
    $user_role = $_SESSION['auth_role'];



    $location = "dashboardetud.php";

?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $location ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?php echo $message; ?> </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo $location ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>





        <!-- Divider -->
        <hr class="sidebar-divider">




        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="list_exam_encour.php">
                <i class="fas fa-fw fa-table"></i>
                <span>liste des examen en cours</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
<?php
} else {
    header("Location: index.php");
    exit(0);
}
?>