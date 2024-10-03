 <!-- Left Panel -->

 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            @if (session()->get('role')=='approval')
            <ul class="nav navbar-nav">
                <li>
                    {{-- <a href="/gajipegawai"> <i class="menu-icon fa fa-dashboard"></i>Gaji Pegawai </a> --}}
                    {{-- <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya operational proyek</a>
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya pribadi</a>
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya lain-lain</a> --}}
                    {{-- <a href="/pencatatanrekening"> <i class="menu-icon fa fa-dashboard"></i>Pencatatan rekening</a> --}}
                    {{-- <a href="/pencatatanmasadepan"> <i class="menu-icon fa fa-dashboard"></i>Pencatatan masa depan</a> --}}
                    {{-- <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya operational non budgeting</a> --}}
               

                    
                </li>
                {{-- <h3 class="menu-title">Biaya</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>biaya</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="/biayaoperationalproyek">Biaya operational proyek</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/biayapribadi">Biaya pribadi</a></li>
                        <li><i class="fa fa-bars"></i><a href="biayalainlain">Biaya lain-lain</a></li>
                        <li><i class="fa fa-share-square-o"></i><a href="/biayaoperationalnonbudgeting">Biaya operational non budgeting</a></li> --}}
                        {{-- <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li> --}}
                    </ul>
                </li>
                
                

                <h3 class="menu-title">Report</h3><!-- /.menu-title -->

                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Report</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report operational</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report operational proyek</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report biaya pribadi</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Report biaya lain-lain</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Report keseluruhan</a></li>
                

                    </ul> --}}
                </li>

                <h3 class="menu-title">Approval</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>approval</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/approvalbiayaproyek">Approval biaya proyek</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/approvalbiayapribadi">Approval biaya pribadi</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Project budgeting</a></li>
            
                

                    </ul>
                </li>

                {{-- <h3 class="menu-title">Admin Only</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>admin</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/pegawai">Register</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/manajemenperusahaan">Manajemen Perusahaan</a></li>
                         --}}
            
                

                    </ul>
                </li>

                
               
                

              
               
            </ul>
            @elseif (session()->get('role')=='pencatattransaksi')
            <ul class="nav navbar-nav">
                <li>
                    <a href="/gajipegawai"> <i class="menu-icon fa fa-dashboard"></i>Gaji Pegawai </a>
                    {{-- <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya operational proyek</a>
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya pribadi</a>
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya lain-lain</a> --}}
                    <a href="/pencatatanrekening"> <i class="menu-icon fa fa-dashboard"></i>Pencatatan rekening</a>
                    <a href="/pencatatanmasadepan"> <i class="menu-icon fa fa-dashboard"></i>Pencatatan masa depan</a>
                    {{-- <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya operational non budgeting</a> --}}
               

                    
                </li>
                <h3 class="menu-title">Biaya</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>biaya</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="/biayaoperationalproyeka">Biaya operational proyek</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/biayapribadi">Biaya pribadi</a></li>
                        <li><i class="fa fa-bars"></i><a href="biayalainlain">Biaya lain-lain</a></li>
                        <li><i class="fa fa-share-square-o"></i><a href="/biayaoperationalnonbudgeting">Biaya operational non budgeting</a></li>
                        {{-- <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li> --}}
                    </ul>
                </li>
                
                

                <h3 class="menu-title">Report</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Report</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report operational</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report operational proyek</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report biaya pribadi</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Report biaya lain-lain</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Report keseluruhan</a></li>
                

                    </ul>
                </li>

                {{-- <h3 class="menu-title">Approval</h3><!-- /.menu-title --> --}}

                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>approval</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/approvalbiayaproyek">Approval biaya proyek</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/approvalbiayapribadi">Approval biaya pribadi</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Project budgeting</a></li>
            
                

                    </ul>
                </li>

                <h3 class="menu-title">Admin Only</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>admin</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/pegawai">Register</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/manajemenperusahaan">Manajemen Perusahaan</a></li>
                        
            
                

                    </ul>
                </li>

                
               
                

              
                --}}
            </ul>
            @elseif (session()->get('role')=='admin')
            <ul class="nav navbar-nav">
                <li>
                    <a href="/gajipegawai"> <i class="menu-icon fa fa-dashboard"></i>Gaji Pegawai </a>
                    {{-- <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya operational proyek</a>
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya pribadi</a>
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya lain-lain</a> --}}
                    <a href="/pencatatanrekening"> <i class="menu-icon fa fa-dashboard"></i>Pencatatan rekening</a>
                    <a href="/pencatatanmasadepan"> <i class="menu-icon fa fa-dashboard"></i>Pencatatan masa depan</a>
                    {{-- <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Biaya operational non budgeting</a> --}}
               

                    
                </li>
                <h3 class="menu-title">Biaya</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>biaya</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="/biayaoperationalproyeka">Biaya operational proyek</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/biayapribadi">Biaya pribadi</a></li>
                        <li><i class="fa fa-bars"></i><a href="biayalainlain">Biaya lain-lain</a></li>
                        <li><i class="fa fa-share-square-o"></i><a href="/biayaoperationalnonbudgeting">Biaya operational non budgeting</a></li>
                        {{-- <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li> --}}
                    </ul>
                </li>
                
                

                <h3 class="menu-title">Report</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Report</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report operational</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report operational proyek</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Report biaya pribadi</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Report biaya lain-lain</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Report keseluruhan</a></li>
                

                    </ul>
                </li>

                <h3 class="menu-title">Approval</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>approval</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/approvalbiayaproyek">Approval biaya proyek</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/approvalbiayapribadi">Approval biaya pribadi</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/biayaoperationalproyek">Project budgeting</a></li>
            
                

                    </ul>
                </li>

                <h3 class="menu-title">Admin Only</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>admin</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/pegawai">Register</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/manajemenperusahaan">Manajemen Perusahaan</a></li>
                        
            
                

                    </ul>
                </li>

                
               
                

              
               
            </ul>
            @endif
           
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

