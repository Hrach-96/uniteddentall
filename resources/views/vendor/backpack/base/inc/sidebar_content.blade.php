<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href='{{ backpack_url('page') }}'><i class='fa fa-file-o'></i> <span>Pages</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>News & Blog</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('article') }}"><i class="fa fa-newspaper-o"></i> <span>Articles</span></a></li>
        <li><a href="{{ backpack_url('category') }}"><i class="fa fa-list"></i> <span>Categories</span></a></li>
        <li><a href="{{ backpack_url('tag') }}"><i class="fa fa-tag"></i> <span>Tags</span></a></li>
    </ul>
</li>
<li><a href="{{ backpack_url('doctor') }}"><i class="fa fa-user-md"></i> <span>Doctor</span></a></li>
<li><a href="{{ backpack_url('operation-instruction') }}"><i class="fa fa-file-text"></i> <span>Operation Instructions</span></a></li>
<li><a href="{{ backpack_url('office-photos') }}"><i class="fa fa-photo"></i> <span>Office Photos</span></a></li>
<li><a href="{{ backpack_url('patient-photos') }}"><i class="fa fa-photo"></i> <span>Patient Photos</span></a></li>
<li><a href="{{ backpack_url('testimonials') }}"><i class="fa fa-comments"></i> <span>Testimonials</span></a></li>
<li><a href="{{ backpack_url('insurances') }}"><i class="fa fa-institution"></i> <span>Insurances</span></a></li>
<li><a href="{{ backpack_url('sliders') }}"><i class="fa fa-photo"></i> <span>Sliders</span></a></li>
<li><a href='{{ backpack_url('setting') }}'><i class='fa fa-cog'></i> <span>Settings</span></a></li>
<li><a href="{{ backpack_url("elfinder") }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
