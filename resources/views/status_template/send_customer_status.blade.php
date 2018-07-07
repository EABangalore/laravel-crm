<!DOCTYPE>

  <html>

    <head><title>Welcome</title></head>    

  <body>

    <div class="mail-template">
        <table width="100%" cellpadding="0" cellspacing="0" >
            <tr>
                <td valign="top" align="center">
                    <table width="600" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="right">
                               <a href="https://www.ebsprints.com/"><img width="50px;" height="50px;" src="https://www.ebsprints.com/images/logoebs.png"></img></a>
                            </td>
                        </tr>
                    </table>
                    <table width="600" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                        <tr>
                            <td bgcolor="#FFFFFF" valign="" width="400" colspan="2">
                                <p>
                                    Hello <strong>{{$data->contact_name}}</strong> By Engima Brand Solution Team,<br/>
                                <p>Greetings,</p>

                                <p> Please find the below customer order details.</p>  

                                <p>As per Our Record your status is : <strong>{{$data->status}}</strong></p> 

                                <p><strong>Regards,</strong></p>
                                <p><strong><strong></p>/
                                <div class="watermark">
                                    <center> <p style="color: #a8a8a8">(This is a computer generated Email and do not reply).</p></center>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#039BE5;" valign="top" colspan="2">
                                <span style="font-size:10px;line-height:100%;font-family:verdana;color:#fff;">
                                    <br />
                                    Copyright (C) <?php echo date('Y'); ?>  Enigma Brand Solution. All rights reserved.<br />
                                    <br />
                                </span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div> 

 </body>

</html> 