<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @each('layouts.menuitem', $menuList, 'menu', 'empty')
    </ul>
</nav>
<!-- /.sidebar-menu --> 
