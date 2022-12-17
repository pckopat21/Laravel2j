
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets') }}/admin/images/logo-sm.png" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('assets') }}/admin/images/logo-dark.png" alt="" height="17">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin_home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets') }}/admin/images/logo-sm.png" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('assets') }}/admin/images/logo-light.png" alt="" height="17">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <center>
                    <li class="menu-title"><span data-key="t-hosgeldin">HOŞ GELDİNİZ</span></li>
                </center>
                <li class="nav-item"><a class="nav-link menu-link" href="{{route('admin_home') }}"><i class="mdi mdi-home"></i> <span data-key="t-index">Anasayfa</span></a></li>
                <li class="nav-item"><a class="nav-link menu-link" href="{{route('admin_personel') }}"><i class="mdi mdi-account-circle-outline"></i> <span data-key="t-personel">Personeller</span></a></li>
                <!--<li class="nav-item"><a class="nav-link menu-link" href="kullanici"><i class="mdi mdi-account-lock-open"></i> <span data-key="t-kullanici">Kullanıcılar</span></a></li>
                <li class="nav-item"><a class="nav-link menu-link" href="unvan"><i class="mdi mdi-account-cowboy-hat"></i> <span data-key="t-unvan">Ünvanlar</span></a></li>-->
                <li class="nav-item"><a class="nav-link menu-link" href="kaza"><i class="mdi mdi-car-cog"></i> <span data-key="t-kaza">Trafik Kazaları</span></a></li>
                <li class="nav-item"><a class="nav-link menu-link" href="izin"><i class="mdi mdi-printer-settings"></i> <span data-key="t-izin">İzin Yazdırma</span></a></li>
                <li class="nav-item"><a class="nav-link menu-link" href="izin-kullanim"><i class="mdi mdi-calendar-sync"></i> <span data-key="t-izin-kullanim">İzin Kullanım Durumları</span></a></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTanim" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTanim">
                        <i class="mdi mdi-sort-bool-descending-variant"></i> <span data-key="t-tanim">Tanımlama İşlemleri</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTanim">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="kullanici" class="nav-link" data-key="t-kullanici"> Kullanıcı Tanımlama </a>
                            </li>
                            <li class="nav-item">
                                <a href="unvan" class="nav-link" data-key="t-unvan"> Ünvan Tanımlama </a>
                            </li>
                            <li class="nav-item">
                                <a href="gorevyeri" class="nav-link" data-key="t-gorevyeri"> Görev Yeri Tanımlama </a>
                            </li>
                            <li class="nav-item">
                                <a href="arac" class="nav-link" data-key="t-arac"> Araç Tanımlama </a>
                            </li>
                            <li class="nav-item">
                                <a href="kkno" class="nav-link" data-key="t-arac"> KKNO Tanımlama </a>
                            </li>
                            <li class="nav-item">
                                <a href="ekip" class="nav-link" data-key="t-ekip"> Ekip Tanımlama </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-modul">Modül Ayarları</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="ayar" class="nav-link" data-key="t-ayar"> Genel Ayarlar </a>
                            </li>
                            <li class="nav-item">
                                <a href="iletisim" class="nav-link" data-key="t-iletisim"> İletişim Ayarları </a>
                            </li>
                            <li class="nav-item">
                                <a href="mail" class="nav-link" data-key="t-mail"> Mail Ayarları </a>
                            </li>
                            <li class="nav-item">
                                <a href="veritabani" class="nav-link" data-key="t-veritabani"> Veritabanı Yedekleme </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
