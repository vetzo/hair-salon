<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

define("THEME_NAME", "Hair salon");

function sabaaf_main_options_info_html() {
$theme_name = THEME_NAME;
return <<<EOT
<h1>$theme_name</h1>
<h2 class="font-weight-bold pl-0">General</h2>
<ul>
	<li>Based on <a href="https://picostrap.com/" target="_blank">Picostrap theme</a>.</li>
	<li>Enriched with <a href="https://https://carbonfields.net//" target="_blank">Carbon fields</a>.</li>
	<li>And custom functions from <a href="https://https://carbonfields.net//" target="_blank">SABAAF DEV // Sometimes Antisocial But Always Anti-Fascist DEV</a>.</li>
	<li>Feel free to buy me a beer on: <a href="https://paypal.me/sabaafthemes" target="_blank">paypal</a> or ask any theme modification.</li>
</ul>
<h2 class="font-weight-bold pl-0">Goal</h2>
<ul>
	<li>Our goal is to make a simple small business orienteted themes done the RIGHT WAY.</li>
	<li>RIGHT WAY means no visual editors, simple to use for ordinary user, easylly upgradable by power users.</li>
</ul>
<h2 class="font-weight-bold pl-0">If anything offends you in this theme then please dont use it and take some time to think about your life, to quote the smarter people:</h2>
<blockquote class="blockquote">
  <p class="mb-0">How can I be a nationalist if I am a world champion? Many do not understand this. They were not champions, and often did not manage to win over themselves. The world has admired my results. Everyone accepted me as their own, and black and white. I met the world, and I can not be anything but cosmopolitan.</p>
  <footer class="blockquote-footer">Boxing world champion <cite title="Mate Parlov">Mate Parlov</cite></footer>
</blockquote>
<blockquote class="blockquote">
  <p class="mb-0">“Are you a communist?"<br />
"No I am an anti-fascist"<br />
"For a long time?"<br />
"Since I have understood fascism.”</p>
  <footer class="blockquote-footer">For Whom the Bell Tolls by <cite title="Ernest Hemingway">Ernest Hemingway</cite></footer>
</blockquote>
EOT;
}
