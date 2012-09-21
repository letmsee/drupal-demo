<div id="footer">
    <p>&copy; 
    <?php
    $startYear = 2006;
    $currentYear = date("Y");
    if ($startYear == $currentYear) {
    	print $startYear;
    } 
    else {
    	print "$startYear - $currentYear";
    }
    ?>
    David Powers</p>
    
</div>
