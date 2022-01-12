    <!-- header menu section start -->
    <div class="section header_menu_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="ch_logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/church_logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="nav_toggle" id="nav_toggle">
                        <i></i>
                        <i></i>
                        <i></i>
                    </div>
                    <div class="header_right_menu" id="header_right_menu">
                        <ul class="menu">

                            <li><a href="#">Oznamy</a></li>
                            <li><a href="{{ route('articles.index') }}">Články</a></li>

                            <li>
                                <a href="#">O nás</a>
                                <ul class="sub-menu">
                                    <li><a href="#">História</a></li>
                                    <!-- Významné osobnosti  -->
                                    <!-- Duchovné povolania  -->
                                    <!-- Kňazi pochovaní v Detve  -->
                                    <!-- Kňazi pôsobiaci v Detve  -->
                                    <!-- Štatistiky od roku 2010  -->
                                    <li><a href="{{ url('o-nas/patron-farnosti') }}">Patrón farnosti</a></li>
                                    <li><a href="#">Sakrálne objekty</a></li>
                                    <!-- Kostoly  -->
                                    <!-- Kaplnky  -->
                                    <!-- Detvianske kríže  -->
                                    <!-- Prícestné sochy  -->
                                    <li><a href="#">Pastorácia</a></li>
                                    <!-- Kňazi  -->
                                    <!-- Farská rada  -->
                                    <!-- Liturgické služby  -->
                                    <!-- (Akolyti, lektori, miništranti, kostolníci, organisti, detský spevokol, mládežnícky spevokol, dychovka)  -->
                                    <!-- Vyučovanie náboženstva  -->
                                </ul>
                            </li>

                            <li><a href="#">Spoločenstvá</a></li>
                                <!-- Bosé karmelitánky  -->
                                <!-- Tretí rád OCD  -->
                                <!-- Tretí rád OFM  -->
                                <!-- Ružencové bratstvo  -->
                                <!-- Faustínum  -->
                                <!-- Modlitby za kňazov  -->
                                <!-- Deti a mládež  -->

                            <li>
                                <a href="#">Duchovný život</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Sviatosti</a></li>
                                    <!-- Krst  -->
                                    <!-- Birmovanie  -->
                                    <!-- Eucharistia  -->
                                    <!-- Svätá spoveď  -->
                                    <!-- Posvätný stav  -->
                                    <!-- Manželstvo  -->
                                    <li><a href="#">Sväteniny</a></li>
                                    <!-- Pobožnosti  -->
                                    <!-- Požehnania  -->
                                    <!-- Procesie, púte  -->
                                    <!-- Tradície  -->
                                    <!-- Pohreb  -->
                                    <li><a href="#">Život viery</a></li>
                                    <!-- Viera v Boha  -->
                                    <!-- Sväté písmo  -->
                                    <!-- Božie prikázania  -->
                                    <!-- Cirkevné prikázania  -->
                                    <!-- Modlitba  -->
                                </ul>
                            </li>

                            <li><a href="{{ route('contact') }}">Kontakty</a></li>
                            <li class="search_icon">
                                <!-- Button trigger modal -->
                                <span data-bs-toggle="modal" data-bs-target="#modalSearch"><i class="fas fa-search"></i></span>
                            </li>
                            @auth
                                <li><a class="text-template text-muted ms-5" href="{{ route('admin.dashboard') }}"><small>Admin</small></a></li>
                            @else
                                <li><a class="text-template text-muted ms-5" href="{{ route('login') }}"><small>Login</small></a></li>
                                {{-- @if (Route::has('register'))
                                <li><a class="text-template" href="{{ route('register') }}">Registrovať</a></li>
                                @endif --}}
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header menu section end -->
