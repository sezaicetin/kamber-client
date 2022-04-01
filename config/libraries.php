<? 
// Ortak kullanılan js ve css dosyalarını mutlaka varsa öncelikle kendi CDN sunucularından kullanmalıyız. 
// Kendi CDN sunucusu olmayan ve 3XCode özel ortak dosyalarını ise https://cdn.3xkod.com/??? dan kullanmalıyız ve bu alanı güncel tutmalıyız.
// Lokal sunucudaki HTTP/CDN klasörü bunun için kullanılıyor ve https://cdn.3xkod.com alanı vd GitLab ile senkron olmalı.

$libs_header =  [
	'kamber' => [
		'cdn' => [
			'css'   => [
				[
					'rel' => 'stylesheet',
					'href' => 'https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,900&display=swap',
					'crossorigin' => 'anonymous'
				],
			],
			'js'    => [
				'https://kit.fontawesome.com/f4446b240e.js',
				'https://cdn.3xkod.com/sendmail/1.0/sendmail.js', //contact form için 
			],
		],
		'assets' => [
			'css'   => [
				'/assets/css/default.css',
				'/assets/css/style.css',
				'/assets/css/mail.css', //contact form  
			],
			'js'    => [
				'/assets/js/main.js?v=38',
			],
		]
	]
];




$libs_footer =  [
	'kamber' => [
		'cdn' => [
			'js'    => [
				'https://cdn.3xkod.com/gdpr/js.js',
			],
        ],
        'assets' => [
            'js'    => [ ],   
        ]         
	],
];

?>