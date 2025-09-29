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
                            <a href="javascript:void(0);"><img src="../assets/img/icons/guide.svg" alt="img"><span>
                                    Guide</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="guidelist" <?php if($currentPage == "guidelist.php" || $currentPage == "guidedetails.php" || $currentPage == "guideedit.php"){echo 'class="active"';}?>>Guide list</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/museum.svg" alt="img"><span>
                                    Museum</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="museumlist" <?php if($currentPage == "museumlist.php" || $currentPage == "museumdetails.php" || $currentPage == "museumadd.php"){echo 'class="active"';}?>>Museum list</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/hotel.svg" alt="img"><span>
                                    Hotels</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="hotellist" <?php if($currentPage == "hotellist.php" || $currentPage == "hoteldetails.php" || $currentPage == "hoteledit.php"){echo 'class="active"';}?>>Hotels list</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/store.svg" alt="img"><span>
                                    Stores</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="storelist" <?php if($currentPage == "storelist.php" || $currentPage == "storedetails.php"){echo 'class="active"';}?>>Stores list</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                        <a href="javascript:void(0);"><img src="../assets/img/icons/places.svg" alt="img"><span>
                                    Places</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="placelist" <?php if($currentPage == "placelist.php" || $currentPage == "placedetails.php" || $currentPage == "placeadd.php" || $currentPage == "placeedit.php"){echo 'class="active"';}?>>Place list</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/users1.svg" alt="img"><span>
                                    User</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="userlist" <?php if($currentPage == "userlist.php" || $currentPage == "userdetails.php"){echo 'class="active"';}?>>Users list</a></li>
                                <li><a href="userposts" <?php if($currentPage == "userposts.php" || $currentPage == "addpost.php" || $currentPage == "editpost.php"){echo 'class="active"';}?>>Posts</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/enable.svg" alt="img"><span>
                                    Approval</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="guiderequest" <?php if($currentPage == "guiderequest.php" || $currentPage == "guidereqdetails.php"){echo 'class="active"';}?>>Guide Requests</a></li>
                                <li><a href="hotelrequest" <?php if($currentPage == "hotelrequest.php" || $currentPage == "hotel_req_details.php"){echo 'class="active"';}?>>Hotel Requests</a></li>
                                <li><a href="storerequest" <?php if($currentPage == "storerequest.php" || $currentPage == "store_req_details.php"){echo 'class="active"';}?>>Store Requests</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
</div>