<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
                class="nav-link {{ (request()->is('/dashboard')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
         <!-- Admision Management -->
         {{-- @if(in_array('ADMISSION MANAGEMENT', $RolePass)) --}}
         <li
            class="nav-item {{ (request()->is('admin/admission*')) ? 'menu-open' : '' }}">
            <a href=""
                class="nav-link {{ (request()->is('admin/admission*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Admission Management <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                {{-- @if(in_array('admission_application', $RolePass)) --}}
                    <li class="nav-item">
                        <a href="{{ route('admission.index') }}"
                            class="nav-link {{ (request()->is('admin/admission/applications*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Applications</p>
                        </a>
                    </li>
                {{-- @endif --}}
            </ul>
        </li>
         {{-- @endif  --}}
        <!-- Carrer Management -->
        {{-- @if(in_array('CAREER MANAGEMENT', $RolePass)) --}}
        <li
            class="nav-item {{ (request()->is('admin/career*')) ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ (request()->is('admin/career*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Career Management <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                {{-- @if(in_array('Posts', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('career.index')}}"
                        class="nav-link {{ (request()->is('admin/career/posts*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Posts</p>
                    </a>
                </li>
                {{-- @endif    --}}
                {{-- @if(in_array('Units', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('unit.index')}}"
                        class="nav-link {{ (request()->is('admin/career/unit*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Units</p>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if(in_array('Subjetcs', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('subject.index')}}"
                        class="nav-link {{ (request()->is('admin/career/subject*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subjects</p>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if(in_array('Job Categories', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('jobct.index')}}"
                        class="nav-link {{ (request()->is('admin/career/job-category*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Job Categories</p>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if(in_array('Job Vacancies', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('jobvc.index')}}"
                        class="nav-link {{ (request()->is('admin/career/job-vacancy*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Job Vacancies</p>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if(in_array('Applications', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('job_application.index')}}"
                        class="nav-link {{ (request()->is('admin/career/applications*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Job Applications</p>
                    </a>
                </li>
                {{-- @endif --}}

                <!--<li class="nav-item">-->
                {{-- <!--    <a href="{{ route('admin.admission.application.list') }}"--> --}}
                <!--        class="nav-link {{ (request()->is('admin/career/admission/applications*')) ? 'active active_nav_link' : '' }}">-->
                <!--        <i class="far fa-circle nav-icon"></i>-->
                <!--        <p>Admission Applications</p>-->
                <!--    </a>-->
                <!--</li>-->
            </ul>
        </li>
        {{-- @endif --}}
        <!-- Master Module Management -->
        {{-- @if(in_array('MASTER MODULES', $RolePass)) --}}
        <li class="nav-item {{ (request()->is('admin/master-module*')) ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ (request()->is('admin/master-module*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Master Modules <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                {{-- @if(in_array('classes', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('class.index')}}"
                        class="nav-link {{ (request()->is('admin/master-module/class*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Classes</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Facilities', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('facilities.index')}}"
                        class="nav-link {{ (request()->is('admin/master-module/facility*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facilities</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Extra Curricular', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('extraCurricular.index')}}"
                        class="nav-link {{ (request()->is('admin/master-module/extra-curricular*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Extra Curricular</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Teaching Process', $RolePass)) --}}
                <li class="nav-item">
                    <a href="{{route('teaching_process.index')}}"
                        class="nav-link {{ (request()->is('admin/master-module/teaching-process*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Teaching Process</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Why Choose Us', $RolePass)) --}}
                <li class="nav-item">
                    <a href=""
                        class="nav-link {{ (request()->is('admin/master-module/why-choose-us*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Why Choose Us</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Blogs', $RolePass)) --}}
                <li class="nav-item">
                    <a href=""
                        class="nav-link {{ (request()->is('admin/master-module/blog*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Events', $RolePass)) --}}
                <li class="nav-item">
                    <a href=""
                        class="nav-link {{ (request()->is('admin/master-module/event*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Events</p>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.department.list.all') }}"
                        class="nav-link {{ (request()->is('admin/master-module/department*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Departments</p>
                    </a>
                </li> --}}
                {{-- @if(in_array('Faculties', $RolePass)) --}}
                <li class="nav-item">
                    <a href=""
                        class="nav-link {{ (request()->is('admin/master-module/faculty*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Faculties</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Testimonials', $RolePass)) --}}
                    <li class="nav-item">
                        <a href=""
                            class="nav-link {{ (request()->is('admin/master-module/testimonial*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Testimonial</p>
                        </a>
                    </li>
                {{-- @endif
                @if(in_array('Gallery', $RolePass)) --}}
                    <li class="nav-item">
                        <a href=""
                            class="nav-link {{ (request()->is('admin/master-module/gallery*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Gallery</p>
                        </a>
                    </li>
                {{-- @endif
                @if(in_array('social_Media', $RolePass)) --}}
                <li class="nav-item">
                    <a href=""
                        class="nav-link {{ (request()->is('admin/master-module/social-media*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Social Media</p>
                    </a>
                </li>
                {{-- @endif --}}
            </ul>
        </li>
        {{-- @endif --}}
        <!-- Content Management -->
        {{-- @if(in_array('CONTENT MANAGEMENT', $RolePass)) --}}
        <li class="nav-item {{ (request()->is('admin/content*')) ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ (request()->is('admin/content*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Content Management <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                {{-- @if(in_array('Page content', $RolePass)) --}}
                <li class="nav-item">
                    <a href=""
                        class="nav-link {{ (request()->is('admin/content/page-content*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Page Content</p>
                    </a>
                </li>
                {{-- @endif
                @if(in_array('Leads', $RolePass)) --}}
                    <li class="nav-item">
                        <a href=""
                            class="nav-link {{ (request()->is('admin/content/lead*')) ? 'active active_nav_link' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Leads</p>
                        </a>
                    </li>
                {{-- @endif
                @if(in_array('Class Wise Routine', $RolePass)) --}}
                <li class="nav-item">
                    <a href=""
                        class="nav-link {{ (request()->is('admin/content/schedule-content*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Class Wise Routine</p>
                    </a>
                </li>
                {{-- @endif --}}
            </ul>
        </li>
        {{-- @endif
        @if(in_array('SEO MANAGEMENT', $RolePass)) --}}
        <li class="nav-item {{ (request()->is('admin/seo*')) ? 'menu-open' : '' }}">
            <a href=""
                class="nav-link {{ (request()->is('admin/seo*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>SEO Management <i class="right fas fa-angle-left"></i></p>
            </a>
        </li>
        {{-- @endif
        @if(in_array('WEBSITE SETTINGS', $RolePass)) --}}
        <li class="nav-item {{ (request()->is('admin/settings*')) ? 'menu-open' : '' }}">
            <a href=""
                class="nav-link {{ (request()->is('admin/settings*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Website Settings <i class="right fas fa-angle-left"></i></p>
            </a>
        </li>
        {{-- @endif --}}
        {{-- @if(Auth::users()->type==1) --}}
        <li class="nav-item {{ (request()->is('admin/admin-management*')) ? 'menu-open' : '' }}">
            <a href=""
                class="nav-link {{ (request()->is('admin/admin-management*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Admin Management <i class="right fas fa-angle-left"></i></p>
            </a>
        </li>
        {{-- @endif --}}
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)"
                onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                Logout
            </a>
        </li>
    </ul>
</nav>
