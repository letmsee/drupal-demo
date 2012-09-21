<?php 
$imageStore = array (
		array (
				"src" => "basin",
				"caption" => "Water basin"
		),
		array (
				"src" => "fountains",
				"caption" => "Fountains in central Tokyo")

);
$size = count($imageStore);
$selected = rand(0, $size - 1);
$imageSrc = "images/{$imageStore[$selected]["src"]}.jpg";
$caption = $imageStore[$selected]["caption"];

if (is_readable($imageSrc)) {
	$imageSize = getimagesize($imageSrc);
}
?>

<div id="pictureWrapper">
	<img src="<?php print $imageSrc?>" alt="Water basin at Ryoanji temple"
		width="350" height="237" class="picBorder" <?php $imageSize[3]?>>
<p id="caption"><?php print $caption?></p>
</div>

