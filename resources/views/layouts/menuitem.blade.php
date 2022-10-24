@if ((count($menu->children) == 0))
    {{-- Menu satu tingkat --}}
    <li class="nav-item">
        <a href="{{ url($menu->slug) }}" class="nav-link {{ request()->is($menu->route) ? 'active' : '' }}">
            <i class="nav-icon {{ $menu->icon }}"></i>
            <p>
                {{ $menu->menu_title }}
            </p>
        </a>
    </li>
@else
<li class="nav-item has-submenu">
    <a href="#" class="nav-link">
        <i class="nav-icon {{ $menu->icon }}"></i>
        <p>
            {{ $menu->menu_title }}
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right"></span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        @foreach($menu->children as $submenu)
            {{-- Menu tiga tingkat --}}
            @if ((count($submenu->children) > 0))
                <li class="nav-item has-submenu">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            {{ $submenu->menu_title }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach($submenu->children as $submenu2)
                            <li class="nav-item">
                                <a href="{{ url($submenu2->slug) }}" class="nav-link {{ request()->is($submenu2->route) ? 'active' : '' }}">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>{{ $submenu2->menu_title }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            {{-- Menu dua tingkat --}}
            @else
                <li class="nav-item">
                    <a href="{{ url($submenu->slug) }}" class="nav-link {{ request()->is($submenu->route) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $submenu->menu_title }}</p>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</li>   
@endif


{{-- 
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            Layout Options
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">6</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../layout/top-nav-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation + Sidebar</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-circle"></i>
        <p>
            Level 1
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
 --}}
