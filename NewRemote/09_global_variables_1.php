<html>
<body>
<?php
$separator=';';
?>
<select>
<option value=";" <?php if ($separator==';') echo "selected"; ?>>Semi-Colon</option>
<option value="\t" <?php if ($separator=="\\t") echo "selected"; ?>>Tab</option>
<option value="," <?php if ($separator==",") echo "selected"; ?>>Comma</option>
</select>
</body>
</html> 