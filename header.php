<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div class="header">
	<nav>
		<div>
			<a href="./me/">about</a> |
			<a href="./pics/">pics</a> |
			<a href="./projects/">projects</a> |
			<a href="./cgit">repos</a> |
			<a href="./calculators/">calculators</a> |
			<a href="./computers/">computers</a> |
            <a href="https://blog.diskfloppy.me/">blog</a>
		</div>
	</nav>
	<div class="pagetree">
			<div style="float: left;">Design based on <a href="https://finalrewind.org/">finalrewind.org</a></div>
			<span class="title">
				<?php
				$uri = $_SERVER['REQUEST_URI'];
				if ($uri === '/') {
					echo '~floppydisk';
				} else {
					$uri = substr(substr($uri, 1), 0, -1);
					if (strpos($uri, '/')) {
						$uriArr = explode('/', $uri);
						$link = "/";
						$links = '<a href="/">~floppydisk</a> / ';
						$currentDir = basename(getcwd());
						foreach($uriArr as $page) {
							if ($page !== $currentDir) {
								if ($link !== '/')
									$link = $link . '/' . $page;
								else
									$link = $link . $page;
								$links = $links . '<a href="' . $link . '">' . $page . '</a> / ';
							}
						}
						$links = substr($links, 0, -3) . ' / ' . $currentDir;
						echo $links;
					}
				}
				?>
				
			</span>
		<div style="float: right;"><a onclick="javascript:toggleTheme()">dark / light mode</a></div>
	</div>
</div> <!-- header -->