<aside class="main-sidebar sidebar-dark-primary elevation-4" >
   <a href="{{url('/admin')}}" class="brand-link bbg-light">
      <i lass="nav-icon fas fa-school"></i>
      <span class="brand-text font-weight-light text-center pl-2">Victory Loves Preparation</span>
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item as-treeview">
               <a href="{{ route('left') }}" class="nav-link {{ (request()->routeIs('left*'))  ? 'active' : '' }}">
                  <i class="nav-icon far fa-hand-point-left"></i>
                  <p>Left Side</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('home') }}" class="nav-link {{ (request()->routeIs('home*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Home</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('about') }}" class="nav-link {{ (request()->routeIs('about*'))  ? 'active' : '' }}">
                  <i class="nav-icon far fa-address-card"></i>
                  <p>About</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('services') }}" class="nav-link {{ (request()->routeIs('services*'))  ? 'active' : '' }}">
                  <i class="nav-icon fa fa-wrench"></i>
                  <p>Services</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('skills') }}" class="nav-link {{ (request()->routeIs('skills*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Skills</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('education') }}" class="nav-link {{ (request()->routeIs('education*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>Education</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('experience') }}" class="nav-link {{ (request()->routeIs('experience*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-flask"></i>
                  <p>Experience</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('work') }}" class="nav-link {{ (request()->routeIs('work*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>work</p>
               </a>
            </li>

            <li class="nav-item as-treeview">
               <a href="{{ route('contact') }}" class="nav-link {{ (request()->routeIs('contact*'))  ? 'active' : '' }}">
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>Contact</p>
               </a>
            </li>
            
         </ul>
      </nav>
   </div>
</aside>
