<?php
if(isset($_POST['customerName'])) {
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'To: Bob <bob@triaquacleaning.co.uk>, Bright <bridark17@hotmail.com>' . "\r\n";
    $headers .= 'From:enquiries@tri-aquacleaning.co.uk'. "\r\n";

    $email_to = "bob@triaquacleaning.co.uk".",";
    $email_subject =$_POST['subject'];
    $first_name ='Name: '.$_POST['customerName']."\r\n"; // required
    $email_from = $_POST['customerEmail']."\r\n"; // required
    $customer_phone ='Phone: '.$_POST['customerPhone']."\r\n";
    $comments ='Quote for : '.$_POST['enquiry']."rooms \r\n";
    $comments .=$first_name;
    $comments .=$customer_phone;
    $comments .= "\r\n".$_POST['message']; // required
    $email_message = $comments;
    $email_message = '' . '
        <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquiries</title>
</head>
<body style="font-family: \'Roboto\', sans-serif; margin: 0">
<table width="800" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#f1f1f1">
    <tr>
        <td width="800" align="center">
            <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff">
                <tr>
                    <td width="600">
                        <img src="http://www.tri-aquacleaning.com/img/spacer.gif" width="600" height="20" border="0">
                    </td>
                </tr>
                <tr>
                    <td width="600" align="center">
                        <table>
                            <tr>
                                <td width="20" align="left">
                                    <img src="http://www.tri-aquacleaning.com/img/spacer.gif" width="20" height="20" border="0">
                                </td>
                                <td align="left" width="460">
                                    <img src="http://www.tri-aquacleaning.com/img/logo.gif" border="0">
                                </td>
                                <td width="20" align="left">
                                    <img src="http://www.tri-aquacleaning.com/img/spacer.gif" width="20" height="20" border="0">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="600" align="center">
                        <table width="600">
                            <tr>
                                <td width="20" align="left">
                                    <img src="http://www.tri-aquacleaning.com/img/spacer.gif" width="20" height="60" border="0">
                                </td>
                                <td align="left" width="580">
                                    <table>
                                        <tr>
                                            <td>'.$first_name.'</td>
                                        </tr>
                                        <tr>
                                            <td>'.$customer_phone.' </td>
                                        </tr>
                                        <tr>
                                            <td>Quote for :'.$_POST["enquiry"].' rooms carpet cleaning service</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="600" align="center">
                        <table width="600">
                            <tr>
                                <td width="20" align="left">
                                    <img src="http://www.tri-aquacleaning.com/img/spacer.gif" width="20" height="60" border="0">
                                </td>
                                <td align="left" width="580"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="600" align="center">
                        <table width="600">
                            <tr>
                                <td width="20" align="left">
                                    <img src="http://www.tri-aquacleaning.com/img/spacer.gif" width="20" height="60" border="0">
                                </td>
                                <td align="left" width="580">'.$_POST["message"].'
                                    body
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="600" align="center">
                        <table width="600">
                            <tr>
                                <td width="600" align="left">
                                    <img src="http://www.tri-aquacleaning.com/img/spacer.gif" width="600" height="60" border="0">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
    ';
$mail_sent = mail($email_to, $email_subject, $email_message, $headers);
if(!$mail_sent){
    echo 'false';
}else{
    echo 'true';
}
}else{
    echo "error";
}

