<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en-us" />

<style type="text/css">

* .location a:hover address, * .location a:hover span{
    color:blue !important;
    text-decoration:underline;
}
* .file a:hover .file-name{
    color:green !important;
}
.rtl .info .var{
    float:left;
    padding:0 10px 0 0;
    margin:0 10px 12px 0;
}
.rtl .info h2{
    clear:none;
}
.rtl .createTD{
    padding:0 0 0 12px !important;
}
.rtl .updateTD{
    padding:0 12px 0 0 !important;
}
.rtl #entryInfo *{
    text-align:center !important;
}
.rtl table .h2{
    padding:0 0 7px 10px !important;
}
.rtl table .var{
    padding:0 10px 0 0 !important;
}
.rtl .mapicon{
    float:right !important;
}
.rtl .adr{
    padding:2px 25px 2px 0 !important;
}
</style>
</head>

<body title="339666">
<div style="font-size: 16px; font-weight: normal;">
<p><?php echo $name;?> 様</p>
<p>ジョインタネットへお問い合わせありがとうございます。程なくこちらからご連絡させて頂きます。</p>
<br/>
<p>Hi <?php echo $name;?></p>
<p>Thank you for your inquiry. We will get back to you soon!</p>
<p>--<br>Jointanet</p>
</div>
<div style="font-family:'Lucida Grande','Lucida Sans Unicode', Tahoma, sans-serif; margin-top: 60px">
<h4>Your inquiry details / お問い合わせ内容</h4>
<table class="readonly" cellspacing="0" cellpadding="0" style="width:100%;border-bottom:1px solid #eee;font-size:12px;line-height:135%;font-family:'Lucida Grande','Lucida Sans Unicode', Tahoma, sans-serif">
    <tr style="background-color:#FFFFFF" >
        <th style="vertical-align:top;color:#222;text-align:left;padding:7px 9px 7px 9px;border-top:1px solid #eee;">
            Name / お名前
            <span class="req" style="color:red">*</span>        </th>
        <td id="roField232" style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee;">
            <div><?php echo $name;?></div>
        </td>
    </tr>
    <tr style="background-color:#F5F5F5">
        <th style="vertical-align:top;color:#222;text-align:left;padding:7px 9px 7px 9px;border-top:1px solid #eee;">
            Email address / Eメールアドレス
            <span class="req" style="color:red;">*</span>       </th>
        <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee;">
        <a class="email" href="mailto:noboruthedragon@gmail.com"><?php echo $email;?></a>
        </td>
    </tr>
    <tr style="background-color:#FFFFFF">
        <th style="vertical-align:top;color:#222;text-align:left;padding:7px 9px 7px 9px;border-top:1px solid #eee;">
            Website address / ウェブサイトアドレス
                    </th>
        <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee;">
        <a href="<?php echo $url;?>" target="_blank" class="url" rel="no-follow"><?php echo $url;?></a>
        </td>
    </tr>
    <tr style="background-color:#F5F5F5">
        <th style="vertical-align:top;color:#222;text-align:left;padding:7px 9px 7px 9px;border-top:1px solid #eee;">
            inquiry　/ お問い合わせ内容
            <span class="req" style="color:red">*</span>        </th>
                        </th>
        <td style="vertical-align:top;color:#333;width:60%;padding:7px 9px 7px 0;border-top:1px solid #eee;">
            <div><?php echo $message;?></div>
        </td>
    </tr>
</table>
</div>
</body>
</html>
