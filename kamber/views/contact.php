<section class="banner" style="background-image: url(<?=_DIR_?>/tools/img_header_bg.php?d=banner.jpg);">
	<div class="overlay"></div>
	<h1>İletişim</h1>
</section>
<section class="page">
    <div class="container mb-4">
		<ul class="breadcrumb d-flex">
			<li><a href="<?=controller::url('')?>">Anasayfa</a></li>
			<li class="active">İletişim</li>
		</ul>
    </div>
    <div class="container pageText d-flex">
		<div class="f-1 mr-4">
			<div class="contact_form">
				<h3>Bilgilerimiz</h3>
				<span><a href=""><i class="fa fa-map-marker-alt"></i> Portakal Çiçeği Bulv. Murat Kuzu Apt.No:12 K:2 D:3 MURATPAŞA | ANTALYA</a></span>
				<span><a href="tel:+90 (242) 321 70 68"><i class="fa fa-phone"></i> +90 (242) 321 70 68</a></span>
				<span><a href="mailto:<?=$data['email']?>"><i class="fa fa-envelope"></i> info@3xcode.com</a></span>
			</div>
			<?=$data['site']['maps']?>
		</div>
		<div class="f-1 wow fadeInRight contact_form">
			<h3>Bize Ulaşın</h3>
			<form id="ucxContactForm" class="form1" method="post" 
				ucx-action="<?=controller::url($_SESSION['lang'],'sendmail')?>"
				ucx-loading="Yükleniyor" 
				ucx-success="Mesaj Gönderildi" 
				ucx-codeerror="Kod Hatalı"
				ucx-addresserror="E-mail Adres Hatalı"
				ucx-error="Mesaj Gönderilemedi" >
				<input id="3xsec" type="hidden" name="3xsec" value="<?=time()?>">
				<input type="hidden" name="Form" value="İletişim Formu">
				<label>Ad Soyad *</label><input id="fullname" type="text" name="Full_Name" required>
				<label>Email *</label><input id="email" type="email" name="Email" required>
				<label>Telefon</label><input id="phone" type="text" name="Phone">
				<label>Konu *</label><input id="konu" type="text" name="Subject" required>
				<label>Mesaj</label><textarea name="Message" id="Message" cols="30" rows="4"></textarea>
				<div id="ucx-mail-loading" class="w-100">
					<div class="circle-loader"><div class="checkmark draw"></div><div class="errormark draw"></div></div>
					<div id="ucx-mail-secerror" class="errorhtml"></div>
				</div>
				<div class="">
					<div class="ucx-captcha">
						<p>Kodu Giriniz</p>
						<div style="flex:1"><input name="3xcaptchakod" id="3xcaptchakod" type="text" required/></div>
						<img src="<?=_DIR_?>/tools/captcha.php" id='captchaimg' />
						<a href='javascript:refreshCaptcha();'>Kodu Yenile</a>
						<script> function refreshCaptcha() { document.getElementById('captchaimg').src = "<?=_DIR_?>/tools/captcha.php?r=" + new Date(); } </script>
					</div>
				</div>
				<button type="submit" name="submit" class="btn">Gönder</button>
			</form>
		</div>
    </div>
</section>