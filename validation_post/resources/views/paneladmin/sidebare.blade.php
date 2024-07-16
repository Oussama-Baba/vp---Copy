 <!-- sidebar -->
 <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <div class="menu_title menu_dahsboard"></div>
        <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
        <!-- start -->
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class="bx bx-home-alt"></i>
            </span>
            <span class="navlink">Content 1</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>

          <ul class="menu_items submenu">
            <a href="{{ route('usercontent.index') }}" class="nav_link sublink">User</a>
            <a href="{{ route('postcontent.index') }}" class="nav_link sublink">post</a>
            <a href="#" class="nav_link sublink">Nav Sub Link</a>
            <a href="#" class="nav_link sublink">Nav Sub Link</a>
          </ul>
        </li>
        <!-- end -->

        <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
        <!-- start -->
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class="bx bx-grid-alt"></i>
            </span>
            <span class="navlink">content 2</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>

          <ul class="menu_items submenu">
            <a href="#" class="nav_link sublink">Nav Sub Link</a>
            <a href="#" class="nav_link sublink">Nav Sub Link</a>

          </ul>
        </li>
        <!-- end -->
      </ul>

      <ul class="menu_items">
        <div class="menu_title menu_editor"></div>
        <!-- duplicate these li tag if you want to add or remove navlink only -->
        <!-- Start -->
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bxs-magic-wand"></i>
            </span>
            <span class="navlink">Magic build</span>
          </a>
        </li>
        <!-- End -->

       </ul>


      <!-- Sidebar Open / Close -->
      <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span> Expand</span>
          <i class='bx bx-log-in' ></i>
        </div>
        <div class="bottom collapse_sidebar">
          <span> Collapse</span>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div>
  </nav>
