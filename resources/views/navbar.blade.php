
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>

            <li><a href="/movie"><i class="fa  fa-reorder"></i> <span>Film Liste</span></a></li>

            <li><a href="/movie/create"><i class="fa  fa-video-camera"></i> <span>Film hinzufügen</span></a></li>

            <li><a href="/user/{{auth()->user()->id}}"><i class="fa fa-folder-open"></i> <span>Mein Account</span></a></li>

            <li><a href="/archiv"><i class="fa   fa-archive"></i> <span>Film Archiv</span></a></li>



            @if(auth()->user()->admin == '1')
                <li><a href="/user/create"><i class="fa   fa-user-plus"></i> <span>User Erstellen</span></a></li>
                <li><a href="/user"><i class="fa   fa-users"></i> <span>Userlist</span></a></li>
            @endif

        </ul>





    </section>
    <!-- /.sidebar -->
</aside>
