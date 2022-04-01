<body data-firma="3XCode.com - Kamber Client Company">
    <header>
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?=controller::url('')?>"><img src="<?=_DIR_?>/assets/img/logo.png" class="logo" alt="Kamber Client"/></a>

            <div class="d-flex align-items-end" style="flex-direction:column">
                <div class="upMenu">
                    <a href="tel:+90 (242) 321 70 68">+90 (242) 321 70 68</a>
                    <a href="#" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    <ul class="d-flex">
                        <li><a href="#">Demo 1</a></li>
                        <li><a href="#">Demo 2</a></li>
                    </ul>
                </div>
                <div class="menu">
                    <ul>
                        <li class="active"><a href="<?=controller::url('')?>">Anasayfa</a></li>
                        <li><a href="<?=controller::url($_SESSION['lang'], 'testpage')?>">Test Page</a></li>
                        <li>
                            <a href="#">Ürünler</a>
                            <ul>
                                <li><a href="<?=controller::url($_SESSION['lang'], 'testpage', 1, 'Test Ürün 1')?>">Ürün 1</a></li>                           
                                <li><a href="<?=controller::url($_SESSION['lang'], 'testpage', 2, 'Test Ürün 2')?>">Ürün 1</a></li>                           
                            </ul>
                        </li>
                        <li><a href="<?=controller::url($_SESSION['lang'], 'contact')?>">İletişim</a></li>
                    </ul>
                </div>
            </div>
            <i class="fas fa-bars menuOpen" onclick="menuToggle()"></i>
        </div>
        <div class="bg" onclick="menuToggle('close')"></div>
    </header>