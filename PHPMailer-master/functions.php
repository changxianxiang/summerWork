<?php
/**
 * Created by PhpStorm.
 * User: ljl
 * Date: 2018/6/5
 * Time: 16:28
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require "SMTP.php";
$mail = new PHPMailer(true);                              // 通过`true`启用例外
try {
    //服务器设置
    $mail->SMTPDebug = 2;                                 // 启用详细的调试输出
    $mail->isSMTP();                                      // 设置邮件使用SMTP
    $mail->Host = 'smtp.qq.com';                         // 指定主要和备份SMTP服务器
    $mail->SMTPAuth = true;                               // 启用SMTP验证
    $mail->Username = '1834669416@qq.com';                 // SMTP用户名
    $mail->Password = 'fddaxxclpbkncdie';                           // SMTP密码
    $mail->SMTPSecure = 'tls';                            // 启用TLS加密，`ssl`也接受
    $mail->Port = 587;                                    // TCP端口连接

    //收件人
    $mail->setFrom('1834669416@qq.com', '是龙哥啊');// 设置发送人信息(参数1：发送人邮箱，参数2：发送人名称)
    $mail->addAddress('1834669416@qq.com', '龙哥');     // 添加收件人
    /*   $mail->addAddress('124565356@qq.com');      */         // 名称是可选的

    //附件
   // $mail->addAttachment('a1.zip');         // 添加附件

    //Content
    $mail->isHTML(true);                                  // 将电子邮件格式设置为HTML
    $mail->Subject = '我很帅啊';                       // 邮件主题，即标题
    $mail->Body    = '66666是真的帅哈哈哈哈哈哈';    //邮件内容
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';     // 邮件附件信息，可以省略

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}