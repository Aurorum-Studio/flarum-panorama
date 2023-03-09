<?php

/*
 * This file is part of Aurorum-Studio/flarum-better-iframe.
 *
 * Copyright © 2022 Aurorum.co.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace AurorumStudio\Iframe;

use Flarum\Extend;
use s9e\TextFormatter\Configurator;

return [ 
  (new Extend\Frontend('forum'))
  ->css(__DIR__.'/less/forum.less'),
    (new Extend\Formatter)
    ->configure(function (Configurator $config) {
         $config->BBCodes->addCustom(
           '[pan="{URL}"]',
           '<html>

	<head>
		<meta charset="utf-8" />
		<title>Photo Sphere Viewer</title>
		<meta name="viewport" content="initial-scale=1.0" />
		<script src="../three.min.js"></script>
		<script src="../photo-sphere-viewer.min.js"></script>
		<style>
			html, body {
				margin: 0;
				width: 100%;
				height: 100%;
				overflow: hidden;
			}

			#container {
				width: 100%;
				height: 100%;
			}
		</style>
	</head>

	<body>
		<div id="container"></div>

		<script>
			var div = document.getElementById('container');
			var PSV = new PhotoSphereViewer({
					panorama: '{URL}',
					container: div,
					time_anim: 3000,
					navbar: true,
					navbar_style: {
						backgroundColor: 'rgba(58, 67, 77, 0.7)'
					},
				});
		</script>
	</body>

</html>
'
        );
    })
];
