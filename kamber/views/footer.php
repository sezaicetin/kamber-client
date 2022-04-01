<footer>
    <div class="container d-flex align-items-center">
        <div class="f-1">
            <div class="social d-flex">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="f-auto">
            <a href="tel:#" class="btn btn-lg btn-tel">
                <i class="fas fa-phone mr-3"></i> 
                <div class="d-flex direction-column"><b>+90 (242) 321 70 68</b><p>Bize Ulaşabilirsiniz!</p></div>
            </a>
        </div>
    </div>
    <div class="container mt-3 mb-3 d-block"><hr></div>
    <div class="container d-flex align-items-center">
        <div class="f-1">
            <b>HİZMETLERİMİZ</b>
            <ul>
                <li><a href="<?=controller::url($_SESSION['lang'], 'testpage', 1, 'Test Ürün 1')?>">Ürün 1</a></li>                           
                <li><a href="<?=controller::url($_SESSION['lang'], 'testpage', 2, 'Test Ürün 2')?>">Ürün 1</a></li>                           
            </ul>
        </div>
        <div class="f-1">
            <b>BLOG</b>

        </div>
    </div>
</footer>
<div class="altFooter2">
    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="<?=_DIR_?>/assets/img/logo.png" alt="Kamber Client" />
        </div>
    </div>
</div>
<div class="altFooter">
    <div class="container">
        <p>Powered by</p>
        <?common::sign('o')?>    
    </div>
</div>
