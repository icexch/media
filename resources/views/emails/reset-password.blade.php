<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style type="text/css">
        .ReadMsgBody {width: 100%;}
        .ExternalClass {width: 100%;}
        body, p, span{
            font-family: Arial, Helvetica, sans-serif;
        }

    </style>
</head>
<div style="background:#fff;">
    <body style="padding:0; margin:0;" bgcolor="#fff">
    <table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%">
        <tr>
            <td align="center" valign="top" background="">
                <table style="margin:auto; width: 700px; padding:30px; font-size: 12px; font-family: &quot;Arial&quot;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table width="100%" style="vertical-align: top; margin-bottom: 35px" vertical-align="top">
                                <tr>
                                    <td valign="top"><a href="https://app.icex.ch" style="text-decoration: none"><img src="{{ env('APP_URL') }}/img/logo.png" alt="" style="width: 130px; display: block; margin: 0; margin-bottom: 10px"><span style="height: 7px; font-family: Arial; font-size: 14px; text-align: left; color: #021032;">The logic of grows!</span></a></td>
                                    <td valign="top" align="right">
                                        <table>
                                            <tr>
                                                <td><a href="facebook" style="text-decoration: none"><img src="{{ env('APP_URL') }}/img/fb.png" alt="" style="display: block; margin: 0; margin-bottom: 10px"></a></td>
                                                <td><a href="facebook" style="text-decoration: none"><img src="{{ env('APP_URL') }}/img/vk.png" alt="" style="display: block; margin: 0; margin-bottom: 10px"></a></td>
                                                <td><a href="facebook" style="text-decoration: none"><img src="{{ env('APP_URL') }}/img/in.png" alt="" style="display: block; margin: 0; margin-bottom: 10px"></a></td>
                                                <td><a href="facebook" style="text-decoration: none"><img src="{{ env('APP_URL') }}/img/tg.png" alt="" style="display: block; margin: 0; margin-bottom: 10px"></a></td>
                                                <td><a href="facebook" style="text-decoration: none"><img src="{{ env('APP_URL') }}/img/tw.png" alt="" style="display: block; margin: 0; margin-bottom: 10px"></a></td>
                                            </tr>
                                        </table>
                                        <p style="font-family: Arial; font-size: 12px; text-align: left; color: #667180; width: 160px; margin: 0;">Follow us on</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; font-family: 'Arial'">
                            <table style="border: 3px solid #44c8b6">
                                <tr>
                                    <td style="text-align: center; padding: 50px 80px 30px 80px">
                                        <p style="font-size: 26px; color: #021032; margin: 0; margin-bottom: 60px">You have successfully created an ICEX Media account. Please click on the link below to verify your email address and complete the registration.</p><a href="{{ url(config('app.url').route('password.reset', $token, false)) }}" style="font-size: 22px; color: #ffffff; background-color: #44c8b6; text-decoration: none; padding: 15px 30px; border-radius: 4px">Verify your email</a>
                                        <p style="font-size: 13px; color: #667180; line-height: 22px; margin: 0; margin-top: 40px;">or copy and paste this link into your browser:</p><a href="https://my.icex.ch/confirm/297405000" style="font-size: 13px; color: #44c8b6; line-height: 22px;">{{ url(config('app.url').route('password.reset', $token, false)) }}</a>
                                        <p style="font-size: 13px; color: #667180; line-height: 1.4; margin-top: 40px; margin-bottom: 0">Didn't create a ICEX Media account? It's likely someone just typed in your email address by accident. Feel free to ignore this email.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px; font-family: 'Arial'; text-align: center; padding: 20px"><span style="font-size: 12px; color: #021032; font-weight: bold;">© 2018 ICEX Media Inc.</span><br><span style="font-size: 12px; color: #667180;">icex.media / Terms & Privacy</span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </body>
</div>
</html>