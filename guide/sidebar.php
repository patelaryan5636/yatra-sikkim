<?php
$currentURL = $_SERVER['PHP_SELF'];
$currentPage = basename($currentURL);
?>
<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li <?php if($currentPage == "index.php"){echo 'class="active"';}?>>
                            <a href="index"><img src="../assets/img/icons/dashboard.svg" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/visitor.svg" alt="img"><span>
                                    Visitors</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="visitorpendinglist" <?php if($currentPage == "visitorpendinglist.php" ){echo 'class="active"';}?>>Pending Visitors List</a></li>
                                <li><a href="visitorcompletelist" <?php if($currentPage == "visitorcompletelist.php"){echo 'class="active"';}?>>Complete Visitors List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/settings.svg" alt="img"><span>
                                    Setting</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="profile" <?php if($currentPage == "profile.php" ){echo 'class="active"';}?>>Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
</div>