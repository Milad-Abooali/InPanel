<?php
	$PAGE['Cfoot'] .="
	<script>
favicon.animate([
'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAADAFBMVEX///+ViW76tx4+gsZvf5HLokR3e4Z/f39kgJ2+nE5NgbeAgICij2TcqjbvsidGgb5/gH9/gIBVgK3mri6KhHZcgaaCf3yzl1Z7fYI3gc74tiCtlFvVpjz/uxdCgcLtsSmfjmZggaG2mFSBgH6SiHBZgKlKgblqgJZye4rCnkvZqDmZimulkGG6mlHjrDHYpzmRh3H0tCSJg3g8gsj9uRxRgbIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAAAAAAB1RkxFqHUAdXUAAAAAAADy1AAAABkAAAAAAADz+ADrABl3y0wAAAAIAAADAAB3y00AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgAAB3ylAAAAAAAAACAAAAAAAAAAAAAAAAAAAAAACnPkAAAAg4AAADhowAAAAAZACZAAB3y7QAABj0aAA4ABkAGfQAAAAAAAC1AACzLMJp/z30sHVbABl1af8AALcAAAAAAADAAABp/4QAYHUAAAAAAAAAAAAABQCAAADAEAAABnwAgAAAAAAAAAAAAAMAAABMAAAATgCGj3gAAAMAAAAAAACGj3gAAAMpAAAAAACjDWwAAAgYAAAAAAAAAAD0RABAABkAAAAAAAD0oAAAABkAAAAAAAAAAAAAAAAAAAAAAAJmZwBmZmZmZmZmABAADGYCAAAAAAAAAQE2VgDk8vEAGfRp/A4AAHUCAAAAAAAZ9MgAAAAYAAAAAAAAAIAAAAAAAAAAAAAAAAAAAAAwm3BgAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAALiMAAC4jAXilP3YAAAEDSURBVHjafZNND8IgDIYJzS5LlESzg0TZaUvcQdNQ//9f05WPFRnrqeV9eKElKJWiB7eFUXWA8zlgh/DODDkuzptKh1nWzv/rzhXA7Cv9CGD9AAg6NAEfey8Ak4E+zcZfJDDdcj/OzByfsq8+AzBUQ0NaxERqAPFMcmT/QEc40ngAsD+1gXvYjE3gEX1awD0qFhsARgD1PvBOAiLuAhbzEbrbAZYMYLIoAULUYcz6l70r4LXus8kgXKcAiNcJryFhM/lYbIB2SQ5sJh3CvuuW29PqMJUGogtuRPxDHQ7uRMEEmGkYpnxCaP9ltwIcrP9VqVNa7J4jCljN/C3Wl4yrRJv+BZ4AOac9XHKSAAAAAElFTkSuQmCC',
'data:image/png;base64,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'
], 13);
</script>";
?>

<?php include(THEME."c_head.php"); ?>
<body class="app flex-row align-items-center">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
		    <h1 class="text-center"><img src="<?= IMG ?>/brand/codeboxLogo.png" class="img-fluid" alt="CODEBOX" /></h1>
			<div class="clearfix cb-rtl text-right">
				<h1 class="float-left display-3 mr-4">503</h1>
				<h4 class="pt-3 cb-f">خارج از سرویس !</h4>
				<p class="text-muted cb-f">این قسمت از (یا تمام) سایت در حال حاضر در دسترس نمی باشد.</p>
			</div>
			<hr>
			<p class="text-muted cb-f">تا در دسترس قرار گرفتن سایت چه کار کنید؟</p>
			<ul class="cb-f cb-rtl text-right">
			  <li>کمی ورزش کنید.</li>
			  <li>یک سیب میل کنید.</li>
			  <li>تلفنی با یکی از عزیزان خود حال و احوال کنید.</li>
			  <li>موجودی حساب های بانکی خودتان را چک کنید.</li>
			  <li>مصرف اینترنت ماه گذشته خود را بررسی کنید.</li>
			  <li>یوگا کار کنید.</li>
			  <li>کمد  خود را مرتب کنید.</li>
			  <li>ناخن های خود را کوتاه و مرتب کنید.</li>
			  <li>مسواک بزنید.</li>
			  <li>یک دوش آب سرد بگیرید.</li>
			  <li>نرم افزارهای خود  را  آپدیت کنید.</li>
			</ul>
			<p class="h2 cb-f cb-rtl text-center text-secondary">ما هم سایت را درست می کنیم <i class="far fa-smile"></i></p>
			</div>
 		</div>
	</div>
</div>
<?php include(THEME."c_foot.php"); ?>