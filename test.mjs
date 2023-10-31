import { PhpNode } from './js-assets/PhpNode.mjs';

const run2 = new Promise(accept => {

	const php = new PhpNode();

	// Listen to STDOUT
	php.addEventListener('output', event => {
		console.log(event.detail.join("\n"));
	});

	// Listen to STDERR
	php.addEventListener('error', event => {
		console.log(event.detail.join("\n"));
	});

	php.addEventListener('ready', () => {
		php.run('<?php include "/preload/php-assets/hello-world.php";').then(retVal => {
			accept(retVal);
		});
	});
});
