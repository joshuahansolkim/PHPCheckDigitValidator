<html>
<head>
<title>Check Digit Validator</title>
</head>
<body>
    <p>This app was for a group project for MATH 355 Discrete Math at Andrews University. The assignment was to do a group presentation with classmates on a topic related to discrete math. Our group picked check digits (actually I picked check digits and the others didn't disagree). After reading about check digits I thought it would be fun to create an app that could take digit sequences and calculate the check digit and compare it with the check digit in the sequence, hence this project.</p>
    <p>For those of you who don't know what a check digit is you should read the <a title="Check digit - Wikipedia" href="https://en.wikipedia.org/wiki/Check_digit">Wikipedia</a> article on check digits. They can do a much better job of explaining it than I can.</p>
    <hr>
    <FORM name="CheckDigitValidator" method="post" action="Validator.php">
    ID Number <input type="text" name="DigitSequence"><br><br>
    <input type ='radio' name='CheckDigType' value='UPC'>UPC
    <input type ='radio' name='CheckDigType' value='ISBN10'>ISBN-10
    <input type ='radio' name='CheckDigType' value='ISBN13'>ISBN-13
    <input type ='radio' name='CheckDigType' value='RoutingNumber'>Bank Routing Number
    <!--<input type ='radio' name='CheckDigType' value='CreditCard'>Credit Card TODO: this needs to be fixed in the validator page.-->
    <p><input type='Submit' name='Validate' value='Validate'></form>
</body>
</html>
