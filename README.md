# Kamber MVC Framework Client

Private Framework for 3XCode. 
----------------------------------------



- Config refresh için csm->adminler`den ilgili admin kaydında config-refresh`i işaretlemek yeterlidir, cronda dakikada bir çalışan bot işaretlenmiş configleri refreshleyerek burdaki işaretide kaldıracaktır. Bu özellik sadece Live sunucular için geçerlidir. Lokal sunucuda çalışırken Config refresh için config dosyasından (config-file) manuel olarak tetiklenmelidir. Manuel tetiklenme Live sunucularda çalışmaz.

- Tüm configler gece 12 de herhangi bir talep olmaksızın cron da çalışan bot ile koşulsuz refreshlenir

- Config bilgileri $_SESSION['config'] şeklinde config oturum anahtarına eklenmiştir

- Status halleri (live, test, uc, onarım, askı) seçenekleri kamberde aktif hale getirildi ve bu özellikler sadece kendi hostunda geçerli lokalde sistem her daim Live olarak çalışır

- Ofis dışında çalışırken status hallerini manüpüle edebilmek için csm->admin config bilgilerinde `Geliştirici IP`leri bölümünde IP tanımlanmalıdır

- Controller da redirect($path, $responsecode=0); //$responsecode=301, 302, 404, default

- Footer da 3xlogosu eklemek için sign($p) fonksiyonu kullanılmalı, $p: 'w'=white, 'ow'=orange-white, ''=default  

- ftp upload 3dparty örnek kullanımı ;

	$ftp = new ftp();
	$ftp->go_folder('uploads/');
	//echo $ftp->where_i_am();
	$ftp->approved_extensions = array('jpg', 'png');
	$file_name = $ftp->upload($name,$tmp_name,$type);
	$ftp->closed();	


- Tüm render lerde ortak yüklenmesini istediğimiz dosyaları 3dparty dosyasından ekleyebiliyoruz, dosya/lar ise tools klasörüne eklenmeli

	'kambertool' => [
		'files'   => array('common', 'sctest'), 
		'status'   => true,
	], 	
	gibi 

- Bazı renderlarda extra php fonksiyonları içeren dosya yüklemek istediğimizde render işleminden önce $attr['toolfile'] = 'sctest.php'; şeklinde attr ekleyebiliyoruz ve tools klasöründe olmalı, extra ortak yada özelleştirilmiş fonsiyonlar yazabilmek için kullanılabilir

- Formdan post edilen verilerin name lerini table field name ler ile aynı yaptığmızda insert/update işlemlerinde kullanabilmek için ;

	$this->convert_data($post, array('modal_operation', 'operation_request') ); $post'tan sonra array ile gonderilen veriler postta haric tutulur, böylece insert yada update işlemi için veriler düzenlenir

- Virgülle ayrılmış çoklu selectlerin kendi tablosundan çekilebilmesini sağlamak için convert_select( $data = '',  $reagent='', $condition='' );
	
	$sql = $this->convert_select($concepts['sales_channels'], ',', 'OR'); //şeklinde çalışıyor geri dönen veride ayıraç ve OR/AND durumuna göre sql cümlesi gönüyor
	$result = $this->convert_data($post, array('modal_operation', 'operation_request') ); $post'tan sonra array ile gonderilen veriler postta haric tutulur
	
- Api web servis bağlantısı kurabilmek için webservices($postdata=array(), $url) (controller da çalışır)

	$postdata = array(
		'api_key' 		=> APIKEY,
		'profile_id'	=> 1,
		'lang' 			=> 'tr',
		'test'			=> 'test',
	);	
	$data 	= $this->webservices($postdata, "http://api.agentssystem.com/apitest");
	echo json_encode($data);		

- "d-m-Y" şeklindeki tarih formatını db işlemlerinde (insert/update/select vs.) kullanabilmek için ("Y-m-d" formatına dönüştürmek )

	convert_date($date,$time=false) fonksiyonu kullanılabilir.  .

- `;` ile ayrılmış text raw data`yı (örn: veri1:1;veri:3) array`a dönüştürüp return ederek içerisindeki parametreli verilere erişebilmek için raw_data( $text=null ) 

	$arrdata = $this->raw_data($rawtext);

- Url`de kullanılmak üzere bir texti uygunsuz karakterlerden temizlemek ve tr karakterleri dönüştürmek için  convert_to_url( $string, $separator = '-' ) 

- Fiziksel olarak dosya oluşturmaya gerek kalmadan controller da render ederken sayfa oluşturabilmek için $this->render('kamber_page', $data, $attr) 

	$page = '<hr><br>';			
	$page .= '<h3>test sayfasıdır</h3>';
	$page .= '<p>mıdır mıdır mıdır</p>';

	$data['h1'] = 'Web Services Page';
	$data['p3'] = $page;
	$this->render('kamber_page', $data, $attr);

- Ziyaretçinin kullandığı platformu geri döndüren fonksiyon common da tanımlı.

	$platform = common::platform() ;
	$platform dönen değere göre :
		1- iphone
		2- iPad
		3- Android
		5- webos
		6- macOS
		7- iPod

- Dil seçeneklerinde duplike sayfaların önüne geçebilmek için önceden hreflang için tanımlan linkleri kullanabilmek adına controller`a _links() fonksiyonu eklendi.

	$hreflang['tr']			= '/tr/hakkimizda';
	$hreflang['en']			= '/en/corporate';
	$hreflang['x-default']	= '/tr/hakkimizda';

	$data['links'] 			= $this->_links($hreflang);

	böylece headers.php de örneğin ;

	switch ($_SESSION['lang'])
	{
		case 'en':
			echo ' <a href="'.controller::url($data['links']['tr']).'">TR</a>';
			break;
		default:
		echo ' <a href="'.controller::url($data['links']['en']).'">EN</a>';    
		break;
	}

	şeklinde kullanabiliyoruz.
	
- common da client browser dilini geri döndüren browser_lang() fonksiyonu eklendi.

	$client_lang = common::browser_lang(); //tr, en ...

- common da client browser tipini geri döndüren browser_type() fonksiyonu eklendi.

	$browser = common::browser_type(); //safari, firefox, chrome, other

	eğer fonksiyona daha önceden alınmış $_SERVER["HTTP_USER_AGENT"] bilgileri gönderilirse o agent verisine göre browser tipini döndürür. Örneğin ;
	
	$agent = $_SERVER["HTTP_USER_AGENT"];
	.
	.
	.
	$browser = common::browser_type($agent);

- common da client işletim sistemini geri döndüren client_os() fonksiyonu eklendi.

	$os = common::client_os(); //win_XXX , mac, linux

	eğer fonksiyona daha önceden alınmış $_SERVER["HTTP_USER_AGENT"] bilgileri gönderilirse o agent verisine göre işletim sistemini döndürür. Örneğin ;
	
	$agent = $_SERVER["HTTP_USER_AGENT"];
	.
	.
	.
	$os = common::client_os($agent);

- common da client platform bilgisini geri döndüren platform_type() fonksiyonu eklendi.

	$platform_type = common::platform_type(); //iphone, ipad, ipod, mac, android, win, other

	eğer fonksiyona daha önceden alınmış $_SERVER["HTTP_USER_AGENT"] bilgileri gönderilirse o agent verisine göre döndürür. Örneğin ;
	
	$agent = $_SERVER["HTTP_USER_AGENT"];
	.
	.
	.
	$platform_type = common::platform_type($agent);

- common da client tarayıcı bilgisinin version numarasını geri döndüren browser_version() fonksiyonu eklendi.

	$browser_version = common::browser_version(); 

	eğer fonksiyona daha önceden alınmış $_SERVER["HTTP_USER_AGENT"] bilgileri gönderilirse o agent verisine göre döndürür. Örneğin ;
	
	$agent = $_SERVER["HTTP_USER_AGENT"];
	.
	.
	.
	$browser_version = common::browser_version($agent);

- common da client bilgilerini toplu olarak bir dizide geri döndüren client_full() fonksiyonu eklendi.

	$client_full = common::client_full(); 
	
	/* return  -> Array ( [os] => mac [platform_no] => 6 [platform_type] => mac [browser_lang] => tr [browser_type] => firefox [browser_version] => 79.0 ) */

	eğer fonksiyona daha önceden alınmış $_SERVER["HTTP_USER_AGENT"] bilgileri gönderilirse o agent verisine göre döndürür. Örneğin ;
	
	$agent = $_SERVER["HTTP_USER_AGENT"];
	.
	.
	.
	$client_full = common::client_full($agent);

- kamber`in 301 yönlendirmelerini toplu olarak tanımlayarak kullanabilmek için /config/301.php dosyasına eski_url => yeni_url şeklinde tanımlıyoruz ve aktif etmek için ise config.php de 301 parametresini true yapıyoruz

- controller da ki webservices e $headdata ve $decode parametresi eklendi $decode parametresinin default değeri true dur ve json decode eder, veriyi decode etmesini istemiyorsak false değeri göndermeliyiz, örneğin ;

	$headdata = array 	(
							0=>'UCX-PROFILE-ID: test123', 
							1=>'UCX-TOKEN: testtok357'
						);
	$data 	= $this->webservices('', "api_test_url", $headdata, false);
	echo json_encode($data);	

- common a kambere özel kendi asimetrik çift taraflı şifreleme algoritması eklendi encrypt(); eklendi. 3 parametre alıyor;
		1. şifrelenmesi istenen text,
        2. keygen, ( saas projeler de kullanılan profile id ye göre ayrı ayrı kriptolayabilmek için eklendi yani boş bırakılırsa profile id ye göre kriptolanır, boş değilse keygene göre kriptolama yapar. keygen min 4 max 10 haneli bir integer sayı olmalıdır. )
        3. format ( default sc-1, şu an için tek format mevcut ilerleyen zamanlarda format ve algoritmasını geliştirmek icap ederse diye eklenmiştir ) 

		Örneğin ;

		$text = "Merhaba Cosmos";
		$crypttext = common::encrypt($text, '0000', 'sc-1');

- common a kambere özel kendi asimetrik çift taraflı şifreleme algoritması için eklendi decrypt(); eklendi. 3 parametre alıyor;
		1. çözülmesi istenen text,
        2. keygen, ( saas projeler de kullanılan profile id ye göre ayrı ayrı kriptolanmış verileri çözebilmek için eklendi yani boş bırakılırsa profile id ye göre çözülme gerçekleşir, boş değilse keygene göre çözme yapar yapar. keygen min 4 max 10 haneli bir integer sayı olmalıdır. )
        3. format ( default sc-1, şu an için tek format mevcut ilerleyen zamanlarda format ve algoritmasını geliştirmek icap ederse diye eklenmiştir ) 

		Örneğin ;

		$text = common::decrypt($crypttext, '0000', 'sc-1');
		
- şifreleme algoritmasına sc-1 den daha güçlü olan sc-2 eklendi, kullanımı sc-1 ile birebir aynı, şifrelenmiş veri ise artık sadece numeric değil aynı zamanda alphanumeric;

		Örneğin ;
		$text = "Merhaba Cosmos";
		$crypttext = common::encrypt($text, '0000', 'sc-2');

		$text = common::decrypt($crypttext, '0000', 'sc-2');

- şifreleme işlemlerine güvenliği arttırmak amaçlı şifre kontrol validation eklendi. Decrypt edilen veri öncelikle şifre kontrolden gçiyor şifre doğru değil ise dönüştürme yapılmıyor

- şifreleme işlemleri commondan alınarak ayrı bir 3dparty modül haline getirildi.

    'sccrypt' => [
        'version'   => '1.0',
        'status'   => true,
    ],  

		Örneğin ;
		$text = "Merhaba Cosmos";
		$crypttext = sccrypt::encrypt($text, '0000', 'sc-2'); 

		$text = sccrypt::decrypt($crypttext, '0000', 'sc-2');
		

--- end ---

Kullanılmaması gereken değişken isimleri ;
----------------------------------------
- $membership
- $categorization




Benimsenen kodlama standardı PSR-2 (hibrit) Ekolüdür.
----------------------------------------
- Autoloading yapısı üzerine kurulu bir mimariye sahiptir.
- Proje adında, sınıf isimlerinde sadece küçük harf kullanılmalıdır.
- PHP dosyaları <? ile başlamalı.
- Dosyalar UTF-8 ve BOM’suz olmalıdır.
- Sınıf isimleri küçük harf kelimeler arası alt çizgi ve 80 karakteri geçmeyecek şekilde kısaltma kullanmadan ingilizce kelime olmalıdır.
- Sınıf sabitleri küçük harf kelimeler arası alt çizgi ve 80 karakteri geçmeyecek şekilde kısaltma kullanmadan ingilizce kelime olmalıdır.
- Metot isimleri küçük harf kelimeler arası alt çizgi ve 80 karakteri geçmeyecek şekilde kısaltma kullanmadan ingilizce kelime olmalıdır.
- Değişken isimlerinde küçük harf kelimeler arası alt çizgi ve 80 karakteri geçmeyecek şekilde kısaltma kullanmadan ingilizce kelime olmalıdır.
- Her satırda önerilen 80 karakter, max 120 karakter olmalıdır.
- Satırlarda tab 4 boşluk kullanılmalıdır. (whitespace).
- Namespace, class ismi, methot isminden sonra 1 boşluk bırakılmalı.
- Metot, sınıf oluşturulduğunda açılan süslü parantezler “{” ismin bitişinde değil bir alt satırda açılmalı.
- Operatörler ile değişkenler arasında bir karakter boşluk bırakılmalı.
- true,false,null küçük kullanılmalı.

