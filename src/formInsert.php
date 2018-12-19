<html>
<head>
	<title> Form Insert </title>
</head>
<body>
<form name="add" method="post" action="Database/save.php" enctype="multipart/form-data">
	<table width="600" border="1">
    	<tr>
        	<th width="600"><div align="center"> Insert </div></th>
        </tr>
    </table>	
	<table width="600" border="1">
        <tr>
        	<th width="100"> Name </th>
            <td width="100"><input type="text" name="pname" /></td>
        </tr>
        <tr>
        	<th width="100"> Price </th>
            <td width="100"><input type="text" name="price" /></td>
        </tr>
        <tr>
        	<th width="100"> Brand </th>
            <td width="100">
                <select name="brand" id="brand">
                    <option value="Asus"> Asus </option>
                    <option value="Lenovo"> Lenovo </option>
                </select>
            </td>
        </tr>
        <tr>
        	<th width="100"> Year </th>
            <td width="100">
                <input name="year" type="radio" value="1" checked="checked" /> 1
                <input name="year" type="radio" value="2" /> 2
                <input name="year" type="radio" value="3" /> 3
            </td>
        </tr>
        <tr>
        	<th width="100"> Pic </th>
            <td width="100">
                <input type="file" name="pic" id="pic" />
            </td>
        </tr>
         <tr>
        	<th width="100"> tid </th>
            <td width="100">
                <select name="tid" id="tid">
                    <option value="1"> Computer </option>
                    <option value="2"> moblie </option>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Submit" name="submit" />
</form>

<form name="Add" action="index.php" method="post">
	<input type="submit" value="Homepage" />
</form>
</body>
</html>