<!--begin::Body-->
<?php
if (isset($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    if ($notification['end_time'] <= time()) {
        unset($_SESSION['notification']);
    } else {
?>
<div id="notification" class="alert alert-<?= $notification['type'] ?>"><?= $notification['message'] ?></div>
<script>
setTimeout(function() {
    document.getElementById('notification').style.display = 'none';
}, 3000);
</script>
<?php
    }
}
?>

<?php
if (isset($_SESSION['error'])) {
    $notification = $_SESSION['error'];
    if ($notification['end_time'] <= time()) {
        unset($_SESSION['error']);
    } else {
?>
<div id="notification" class="alert alert-<?= $notification['type'] ?>"><?= $notification['message'] ?></div>
<script>
setTimeout(function() {
    document.getElementById('notification').style.display = 'none';
}, 3000);
</script>
<?php
    }
}
?>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
                                class="bi bi-list"></i> </a> </li>

                    </li>
                    <li class="nav-item d-none d-md-block"> <a href="index.php?c=home" class="nav-link">Home</a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="index.php?c=redirect" class="nav-link">Redirect</a>
                    <li class="nav-item d-none d-md-block"> <a href="index.php?c=home" class="nav-link">Domain</a>
                    </li>
                    <li class="nav-item d-none d-md-block"> <a href="index.php?c=paypal" class="nav-link">Paypal</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button"> <i
                                class="bi bi-search"></i> </a> </li>
                    <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                                class="bi bi-chat-text"></i> <span class="navbar-badge badge text-bg-danger">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <a href="#"
                                class="dropdown-item">
                                <!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"> <img src="public/dist/assets/img/user1-128x128.jpg"
                                            alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-end fs-7 text-danger"><i
                                                    class="bi bi-star-fill"></i></span>
                                        </h3>

                                        <p class="fs-7">Call me whenever you can...</p>

                                        <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours
                                            Ago
                                        </p>
                                    </div>
                                </div>
                                <!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item">
                                <!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"> <img src="public/dist/assets/img/user8-128x128.jpg"
                                            alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-end fs-7 text-secondary"> <i class="bi bi-star-fill"></i>
                                            </span>
                                        </h3>
                                        <p class="fs-7">I got your message bro</p>
                                        <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours
                                            Ago
                                        </p>
                                    </div>
                                </div>
                                <!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item">
                                <!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"> <img src="public/dist/assets/img/user3-128x128.jpg"
                                            alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-end fs-7 text-warning"> <i class="bi bi-star-fill"></i>
                                            </span>
                                        </h3>
                                        <p class="fs-7">The subject goes here</p>
                                        <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours
                                            Ago
                                        </p>
                                    </div>
                                </div>
                                <!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">See
                                All Messages</a>
                        </div>
                    </li>

                    <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i
                                data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i
                                data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a>
                    </li>
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img
                                src="public/dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow"
                                alt="User Image"> <span class="d-none d-md-inline">
                                <?php
                                    if(isset($_SESSION['name'])){
                                        echo htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
                                    }
                                ?>
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary"> <img src="public/dist/assets/img/user2-160x160.jpg"
                                    class="rounded-circle shadow" alt="User Image">
                                <p>
                                    <?php
                                    if(isset($_SESSION['name'])){
                                        echo htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
                                    }
                                ?>
                                </p>
                            </li>
                            <!--end::Menu Body-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer"> <a href="index.php?c=account&a=changePass"
                                    class="btn btn-default btn-flat">Change password</a> <a
                                    href="index.php?c=login&a=logout" class="btn btn-default btn-flat float-end">Sign
                                    out</a> </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
                    <!--begin::Brand Image--> <img src="public/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow">
                    <!--end::Brand Image-->
                    <!--begin::Brand Text--> <span class="brand-text fw-light">AdminLTE 4</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open"> <a href="#" class="nav-link active"> <i
                                    class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Quản trị
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="index.php?c=home" class="nav-link active"> <i
                                            class="nav-icon bi bi-circle"></i>
                                        <p>Quản trị website</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./index2.html" class="nav-link"> <i
                                            class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v2</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="./index3.html" class="nav-link"> <i
                                            class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v3</p>
                                    </a> </li>
                            </ul>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>