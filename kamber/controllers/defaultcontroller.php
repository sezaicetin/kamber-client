<?
class defaultcontroller extends controller
{
	public function home()
	{
		$page = '<hr><br>';			
		$page .= '<h3>Hello Cosmos!</h3>';
		$page .= '<p>Welcome to Kamber Client Page.</p>';
		$page .= '<p><br><br><br><br><br></p>';
		$page .= '<p>Test Page <a href="'.controller::url($_SESSION['lang'], 'testpage').'">Link</a>.</p>';
		$page .= '<p>Contact Page <a href="'.controller::url($_SESSION['lang'], 'contact').'">Link</a>.</p>';

		$data['h1'] = 'Hello Cosmos!';
		$data['p3'] = $page;
		$this->render('kamber_page', $data, $attr);
	}

	public function testpage()
	{
		//$model	= $this->model('defaultmodel');
		//$data['testpage']	= $model->testpage();

		$hreflang['tr']			= '';
		$hreflang['en']			= '';
		$hreflang['x-default']	= '';

		$data['links'] = $this->_links($hreflang);

		$attr['return-type']	= 'object'; //value, array, object, json, xml
		$attr['title'] 			= 'Test Page';
		$attr['description'] 	= 'Test Page Description.';
		$attr['keywords'] 		= 'keys1, keys2';
		$attr['header'] 		= 'header.php';
		$attr['footer'] 		= 'footer.php';	
		$attr['hreflang'] 		= $hreflang;	
		//$attr['toolfile'] 		= 'sctest.php'; //tools klasöründe arıyor bu dosyayı, extra ortak yada özelleştirilmiş fonsiyonlar için
		$this->render('testpage', $data, $attr);
	}	

	public function contact()
	{
		$data['text'] = 'Test';

		$hreflang['tr']			= '';
		$hreflang['en']			= '';
		$hreflang['x-default']	= '';

		$data['links'] = $this->_links($hreflang);

		$attr['return-type']	= 'array'; //value, array, object, json, xml
		$attr['title'] 			= 'İletişim';
		$attr['description'] 	= 'Desc';
		$attr['keywords'] 		= 'keys1, keys2';
		$attr['header'] 		= 'header.php';
		$attr['footer'] 		= 'footer.php';	
		$attr['hreflang'] 		= $hreflang;	
		//$attr['toolfile'] 		= 'sctest.php'; //tools klasöründe arıyor bu dosyayı, extra ortak yada özelleştirilmiş fonsiyonlar için
		$this->render('contact', $data, $attr);
	}	

	public function about()
	{
		$data['text'] = 'Test';

		$hreflang['tr']			= '';
		$hreflang['en']			= '';
		$hreflang['x-default']	= '';

		$data['links'] = $this->_links($hreflang);
		
		$attr['return-type']	= 'array'; //value, array, object, json, xml
		$attr['title'] 			= 'Hakkimizda';
		$attr['description'] 	= 'Desc';
		$attr['keywords'] 		= 'keys1, keys2';
		$attr['header'] 		= 'header.php';
		$attr['footer'] 		= 'footer.php';	
		$attr['hreflang'] 		= $hreflang;	
		//$attr['toolfile'] 		= 'sctest.php'; //tools klasöründe arıyor bu dosyayı, extra ortak yada özelleştirilmiş fonsiyonlar için
		$this->render('about', $data, $attr);
	}	

	public function sendmail()
	{
		$mail = new PHPMailer;
		
		if (time() - $_POST['3xsec'] > 10 and $_POST['3xsec'] > 0) 
		{
			if ($_SESSION['kamber-captcha-code'] != $_POST['3xcaptchakod'] or empty($_POST['3xcaptchakod'])) 
			{
				echo "ucx-mail-codeerror";
			} 
			else 
			{
				try 
				{
					$mail->Subject  = "Iletisim Formu";

					if (count($_SESSION['config']['mail_address']) > 0) 
					{
						foreach ($_SESSION['config']['mail_address'] as $email) 
						{
							if(trim($email)) $mail->addAddress(trim($email));
						}
						// if(_3XMAIL)         { $mail->AddBCC(_3XMAIL); } 
						$mail->msgHTML($_POST);
						if ($mail->send() === true) 
						{
							echo "ucx-mail-success";
						} 
						else 
						{
							echo "ucx-mail-senderror";
						}						
					} 
					else 
					{
						echo "ucx-mail-addresserror";
					}
				} 
				catch (Exception $e) 
				{
					echo "ucx-mail-error";
				}
			}
		} 
		else 
		{
			echo "ucx-mail-secerror";
		}
	}	

}
?>