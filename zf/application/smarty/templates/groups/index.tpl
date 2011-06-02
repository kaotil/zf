<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Simple</title>
<link type="text/css" rel="Stylesheet" href="css/jquery.validity.css" />
<script type="text/javascript" src="js/jquery.js"> </script>
<script type="text/javascript" src="js/jquery.validity.js"> </script>
<script type="text/javascript">
$(function() {
    $("form").validity("input:text, select");
});
</script>
</head>
<body>

action: {$name}<br>
今日は{$smarty.now|date_format:"%Y年 %m月 %d日"}<br>

<form method="post" action="/zf/public/groups/result">
    <label for="PetName">Name of Pet:</label>
    <input type="text" id="PetName" name="PetName" title="name" />
    <br /><br />

    <label for="PetType">Type of Pet:</label>
    <select id="PetType" name="PetType" title="type">
        <option selected="selected"></option>
        <option>Dog</option>
        <option>Cat</option>
        <option>Bird</option>
        <option>Lizard</option>
        <option>Panda</option>
    </select>
    <br /><br />

    <label for="Petfoodbrand">Brand of Petfood:</label>
    <input type="text" id="Petfoodbrand" name="Petfoodbrand" title="brand" />
    <br /><br />

    <input type="submit" value="Submit" />
</form>

</body>
</html>

