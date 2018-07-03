<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$form->getTitle()?></title>
	<?=$form->getScript()?>
	<?=$form->getSuccessScript()?>
</head>
<body>
<script>
	(function () {
		var create = <?=$form->formScript()?>
        create();
    })();
</script>
</body>
</html>