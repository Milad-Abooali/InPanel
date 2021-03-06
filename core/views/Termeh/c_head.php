<!DOCTYPE html><html lang="fa"><head>
<!--- Main Meta -->
	<base href="<?= URL ?>" />
	<link rel="author" href="<?= URL ?>humans.txt" />
	<meta name="generator" content="Codebox Mahan 3.0" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!--- CODEBOX -->
    <meta name="codebox-st" content="<?= $_SESSION['TOKEN'] ?>" />
    <meta name="codebox-si" content="<?= $_SESSION['SID'] ?>" />
    <meta name="codebox-url" content="<?= URL ?>" />
    <meta name="codebox-cdn" content="<?= CDN ?>" />
    <meta name="codebox-img" content="<?= IMG ?>" />
    <meta name="codebox-js" content="<?= JS ?>" />

<!--- Prefetch -->
	<?= (CDN_STATUS['ALL']) ? "<link rel='dns-prefetch' href='".CDN."' />":NULL; ?>
<!--- Verification -->
    <meta name="yandex-verification" content="8180440969c4b9fe" />
    <meta name="p:domain_verify" content="0844a5db1e5d837d475aeea91975fa85" />
<!--- SEO -->
	<title><?= $PAGE['title']; ?> &bull; Codebox</title>
	<meta name="keywords" content="<?= $PAGE['keywords']; ?>" />
	<meta name="description" content="<?= $PAGE['description']; ?>" />
	<meta name="robots" content="<?= ($PAGE['robots'])?'noindex, nofollow':'index, follow'; ?>" />
<!--- Open Graph -->
	<meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="Codebox" />
    <meta property="og:image" content="<?= ($PAGE['image']) ? $PAGE['image'] : IMG.'brand/cover.png'; ?>" />
    <meta property="og:description" content="<?= $PAGE['description']; ?>" />
    <meta property="og:url" content="<?= URL ?><?= $PAGE['path']; ?>" />
    <meta property="og:title" content="<?= $PAGE['title']; ?> &bull; Codebox" />
    <meta property="article:publisher" content="https://www.facebook.com/codebox.ir/" />
<!--- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@codbox_ir" />
    <meta name="twitter:creator" content="@codbox_ir" />
    <meta name="twitter:image" content="<?= ($PAGE['image']) ? $PAGE['image'] : IMG.'brand/cover.png'; ?>" />
    <meta name="twitter:description" content="<?= $PAGE['description']; ?>" />
    <meta name="twitter:title" content="<?= $PAGE['title']; ?> &bull; Codebox" />
<!--- ICO -->
	<meta name="application-name" content="Codebox.ir" />
	<link rel="icon" type="image/ico" sizes="32x32" href="<?= ICO ?>favicon.ico" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?= ICO ?>favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= ICO ?>favicon-16x16.png" />
	<link rel="icon" type="image/png" sizes="96x96" href="<?= ICO ?>favicon-96x96.png" />
	<link rel="icon" type="image/png" sizes="192x192"  href="<?= ICO ?>android-icon-192x192.png" />
<!--- Microsoft -->
	<meta name="theme-color" content="#fff" />
	<link rel="manifest" href="<?= ICO ?>manifest.json" />
	<meta name="msapplication-TileColor" content="#ffffff" />
	<meta name="msapplication-TileImage" content="<?= ICO ?>ms-icon-144x144.png" />
<!--- Apple -->
	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?= ICO ?>apple-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="<?= ICO ?>apple-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?= ICO ?>apple-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= ICO ?>apple-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?= ICO ?>apple-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?= ICO ?>apple-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?= ICO ?>apple-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?= ICO ?>apple-icon-152x152.png" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?= ICO ?>apple-icon-180x180.png" />
<!--- Alternative -->
	<?= ($PAGE['canonical']) ? '<link rel="canonical" href="'.URL.$PAGE['canonical'].'" />':NULL; ?>
	<?= ($PAGE['amphtml']) ? "<link rel='amphtml' href='".URL."/amphtml/".$PAGE['path']."' />":NULL; ?>
	<?= ($PAGE['feed']) ? '<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="'.URL.$PAGE['feed'].'" />':NULL; ?>
<!--- CSS -->
	<link href="<?= CSS ?>style.css" rel="stylesheet" />
	<link href="<?= ASSET ?>vendors/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?= CSS ?>common.css" rel="stylesheet" />
	<link href="<?= CSS ?>animate.css" rel="stylesheet" />
	<link href="<?= CSS ?>/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= ASSET ?>vendors/fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet" />
	<link href="<?= ASSET ?>vendors/simple-line-icons/css/simple-line-icons.min.css" rel="stylesheet" />
<!--- Page Head -->
	<?= $PAGE['Chead'] ?>
</head>