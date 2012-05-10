<?php defined('IN_CMS') or die('No direct access allowed.');
$title = "You're Lost.";
$url = "";
ob_start();
?>
<div class="sad_face">
	&#9785;
</div>
<div class="speech">
	Would you like to go <a href="<?php echo base_url(); ?>">Home</a>?
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'includes/template.php';