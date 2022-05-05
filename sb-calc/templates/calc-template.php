<?php
// @package sb_calc @version 1.0

if ( ! defined( 'WPINC' ) ) { die(); }

?>

<div id="calculator" style="text-align: center;">

	<form id="ajax-contact-form" action="#">
		<h4>Bitcoin Markets (bitstampUSD)</h4>
		<p>
			<input type="number" id="dollars" name="dollars" value="1000" placeholder=""> on <input type="date" id="date" value="2021-06-06" min="2011-09-13" max="2021-06-20">
		</p>
		<p>
			<input disabled="" type="text" id="dollars-result" name="dollars-result" value="" placeholder="$ USD">
			<input id="calc" type="submit" value="Calculate!" name="submit">
		</p>
	</form>

</div>
