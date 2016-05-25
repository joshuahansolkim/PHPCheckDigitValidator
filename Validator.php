<html>
<head>
<title>Check Digit Validator</title>
</head>
<body>

<?php
    // Function for output when check digit is calculated
    function CorrectOutput($DigSeq, $CheckDig, $LastDig){
        // Tell user the number they entered in
        echo "<p>You entered " . $DigSeq . "</p>";
        // Tell user what the calculated check digit should be
        echo "<p>The check digit should be " . $CheckDig . ".</p>";
        // Check to see whether the check digits match
        if($CheckDig == $LastDig) {
            // If check digits match, tell user the check digit is correct
            echo "<p>According to the code you entered, the check digit is correct.</p>";
        }else{
            // If check digits don't match, tell user the check digit is incorrect
            echo "<p>According to the code you entered, the check digit is incorrect.</p>";
        }
        // Link back to first page
        echo "<a href='index.php'>Try another number?</a>";

    }


    // Check to see if user submitted the form
    if(isset($_POST[Validate])){
        // Check to make sure user specified which type of code it is
        if(isset($_POST['CheckDigType'])){

            // Check for code and put into variable
            if(isset($_POST['DigitSequence'])){
                $DigSequence = $_POST['DigitSequence'];
            }

            // Check code to make sure it's a numerical
            if(is_numeric($DigSequence)) {

                // If it's a UPC code, validate it
                if($_POST['CheckDigType'] == 'UPC'){
                    // Check to make sure the length of the code is right for a UPC
                    if(strlen($DigSequence) == 12) {

                        // Split the code into an array so we can do math on each part.
                        $DigArray = str_split($DigSequence);

                        // Do the math and store the number in a variable
                        $CheckDigit = (10-
                                       (((($DigArray[0]+$DigArray[2]+$DigArray[4]+$DigArray[6]+$DigArray[8]+$DigArray[10])*3)
                                         +$DigArray[1]+$DigArray[3]+$DigArray[5]+$DigArray[7]+$DigArray[9])%10));

                        if($CheckDigit == 10){
                            $CheckDigit = 0;
                        }

                        // Call function to output results
                        CorrectOutput($DigSequence, $CheckDigit, end($DigArray));
                    }else{
                        // If the length of the code was incorrect, tell user
                        echo "<p>The code you entered is not the correct length for a UPC code. Please <a href='index.php'> try again.</a></p>";
                    }

                // If it's an ISBN-10 number, validate it
                }else if($_POST['CheckDigType'] == 'ISBN10'){
                    // Check to make sure the length of the code is right for an ISBN-10
                    if(strlen($DigSequence) == 10) {

                        // Split the code into an array so we can do math on each part.
                        $DigArray = str_split($DigSequence);

                        // Do the math and store the number in a variable
                        $CheckDigit = (11-((($DigArray[0] * 10) + ($DigArray[1] * 9) + ($DigArray[2] * 8) + ($DigArray[3] * 7) + ($DigArray[4] * 6) + ($DigArray[5] * 5) + ($DigArray[6] * 4) + ($DigArray[7] * 3) + ($DigArray[8] * 2)) % 11)) % 11;

                        // Call function to output results
                        CorrectOutput($DigSequence, $CheckDigit, end($DigArray));
                    }else{
                        echo "<p>The code you entered is not the correct length for a ISBN-10 code. Please <a href='index.php'> try again.</a></p>";
                    }


                // If it's an ISBN-13 number, validate it
                }else if($_POST['CheckDigType'] == 'ISBN13'){
                    // Check to make sure the length of the code is right for an ISBN-13
                    if(strlen($DigSequence) == 13) {

                        // Split the code into an array so we can do math on each part.
                        $DigArray = str_split($DigSequence);

                        // Do the math and store the number in a variable
                        $CheckDigit = (10-
                                       (((3*($DigArray[1]+$DigArray[3]+$DigArray[5]+$DigArray[7]+$DigArray[9]+$DigArray[11]))+
                                         $DigArray[0]+$DigArray[2]+$DigArray[4]+$DigArray[6]+$DigArray[8]+$DigArray[10])%10));

                        if($CheckDigit == 10){
                            $CheckDigit = 0;
                        }

                        // Call function to output results
                        CorrectOutput($DigSequence, $CheckDigit, end($DigArray));
                    }else{
                        echo "<p>The code you entered is not the correct length for a ISBN-13 code. Please <a href='index.php'> try again.</a></p>";
                    }


                // If it's a bank routing number, validate it
                }else if($_POST['CheckDigType'] == 'RoutingNumber'){
                    // Check to make sure the length of the code is right for a bank routing number
                    if(strlen($DigSequence) == 9) {

                        // Split the code into an array so we can do math on each part.
                        $DigArray = str_split($DigSequence);

                        // Do the math and store the number in a variable


                        CorrectOutput($DigSequence, $CheckDigit, end($DigArray));
                    }else{
                        echo "<p>The code you entered is not the correct length for a bank routing number. Please <a href='index.php'> try again.</a></p>";
                    }

                // If it's a credit card number, validate it
                }else if($_POST['CheckDigType'] == 'CreditCard'){
                    // Check to make sure the length of the code is right for a bank routing number
                    if(strlen($DigSequence) == 16) {

                        // Split the code into an array so we can do math on each part.
                        $DigArray = str_split($DigSequence);

                        // In order to do the weird math thingy on even numbers,
                        // the numbers need to be broken apart and then summed up
                        $FirstDigit = $DigArray[0]*2;
                        if(strlen($FirstDigit) > 1){
                            $FirstDigit = array_sum(str_split($FirstDigit));
                        }
                        $SecondDigit = $DigArray[2]*2;
                        if(strlen($SecondDigit) > 1){
                            $SecondDigit = array_sum(str_split($SecondDigit));
                        }
                        $ThirdDigit = $DigArray[4]*2;
                        if(strlen($ThirdDigit) > 1){
                            $ThirdDigit = array_sum(str_split($ThirdDigit));
                        }
                        $FourthDigit = $DigArray[6]*2;
                        if(strlen($FourthDigit) > 1){
                            $FourthDigit = array_sum(str_split($FourthDigit));
                        }
                        $FifthDigit = $DigArray[8]*2;
                        if(strlen($FifthDigit) > 1){
                            $FifthDigit = array_sum(str_split($FifthDigit));
                        }
                        $SixthDigit = $DigArray[10]*2;
                        if(strlen($SixthDigit) > 1){
                            $SixthDigit = array_sum(str_split($SixthDigit));
                        }
                        $SeventhDigit = $DigArray[12]*2;
                        if(strlen($SeventhDigit) > 1){
                            $SeventhDigit = array_sum(str_split($SeventhDigit));
                        }
                        $EighthDigit = $DigArray[14]*2;
                        if(strlen($EighthDigit) > 1){
                            $EighthDigit = array_sum(str_split($EighthDigit));
                        }

                        // Do the math and store the number in a variable
                        $CheckDigit = ((10-($FirstDigit+$SecondDigit+$ThirdDigit+$FourthDigit+$FifthDigit+$SixthDigit+$SeventhDigit+$EighthDigit+$DigArray[1]+$DigArray[3]+$DigArray[5]+$DigArray[7]+$DigArray[9]+$DigArray[11]+$DigArray[13])%10)%10);

                        // Call function to output results
                        CorrectOutput($DigSequence, $CheckDigit, end($DigArray));
                    }else{
                        echo "<p>The code you entered is not the correct length for a bank routing number. Please <a href='index.php'> try again.</a></p>";
                    }
                }
            }else{
                // If it's an ISBN-10 number, validate it
                if($_POST['CheckDigType'] == 'ISBN10'){
                    // Check to make sure the length of the code is right for an ISBN-10
                    if(strlen($DigSequence) == 10) {

                        // Split the code into an array so we can do math on each part.
                        $DigArray = str_split($DigSequence);

                        // Do the math and store the number in a variable
                        $CheckDigit = (11-((($DigArray[0] * 10) + ($DigArray[1] * 9) + ($DigArray[2] * 8) + ($DigArray[3] * 7) + ($DigArray[4] * 6) + ($DigArray[5] * 5) + ($DigArray[6] * 4) + ($DigArray[7] * 3) + ($DigArray[8] * 2)) % 11)) % 11;

                        if($CheckDigit == 10){
                            $CheckDigit = X;
                        }

                        // Call function to output results
                        CorrectOutput($DigSequence, $CheckDigit, strtoupper(end($DigArray)));
                    }else{
                        echo "<p>The code you entered is not the correct length for a ISBN-10 code. Please <a href='index.php'> try again.</a></p>";
                    }

                }else{
                    // If the user didn't give a code, ask user to try again
                    echo "<p>You either forgot to enter a code to be validated or the code you entered did not meet the criteria. No check digit can be created from your input. Please <a href='index.php'>try again.</a></p>";
                }
            }
        }else{
            // If the user didn't specify which type of code they entered, let the user know
            echo "<p>You did not specify what type of code you would like to validate. Please <a href='index.php'>try again.</a></p>";
        }
    }
?>

</body>
</html>
