<?php
function add_taikhoan($username,$email,$password){
    $sql = "INSERT INTO duan1.user(username,email,pass) values('$username','$email','$password')";
    pdo_execute($sql);
   
}
function check_register($email){
    $sql = "SELECT * FROM duan1.user WHERE 1";
    // Add conditions based on provided parameters
    // if ($username != '') {
    //     $sql .= " AND username = '$username'";
    // }
    if ($email != '') {
        $sql .= " AND email = '$email'";
    }
    $check_register = pdo_query_one($sql);
    return $check_register;
}

function check_login($email,$password){
    $sql = "SELECT * FROM duan1.user WHERE 1";
    if($email!=''){
        $sql.=" AND email = '$email'";
    }
    if($password!=''){
        $sql.=" AND pass = '$password'";
    }
    $check_login = pdo_query_one($sql);
    return $check_login;
}
function load_all_taikhoan(){
    $sql = "SELECT * FROM duan1.user order by id";
    $load_all_taikhoan = pdo_query($sql);
    return $load_all_taikhoan;
}
function check_pass($password_old){
    $sql = "SELECT * FROM duan1.user where pass = '$password_old'";
    $check_pass = pdo_query_one($sql);
    return $check_pass;
}
function check_isset_tk($email,$phone){
    $sql = "SELECT * FROM duan1.user WHERE 1";
    // if ($username != '') {
    //     $sql .= " AND username = '$username'";
    // }
    if ($email != '') {
        $sql .= " AND email = '$email'";
    }
    if ($phone != '') {
        $sql .= " AND phone = '$phone'";
    }
    // die($sql);
    $check_isset_tk = pdo_query_one($sql);
    return $check_isset_tk;
}
function check_isset1_tk($id,$email,$phone)
{
    $sql = "SELECT * FROM duan1.user WHERE 1 ";    // if ($username != '') {
    //     $sql .= " AND username = '$username'";
    // }
    $sql.=" AND id <> '$id'";
    if ($email != '') {
        $sql .= " AND email = '$email'";
    }
    if ($phone != '') {
        $sql .= " AND phone = '$phone'";
    }

    // die($sql);

    $check_isset_tk = pdo_query_one($sql);
    return $check_isset_tk;
}
function add_tk_admin($username,$pass,$email,$diachi,$phone,$role){
    $sql = "INSERT INTO duan1.user(username,pass,email,address,phone,role) values('$username','$pass','$email','$diachi','$phone','$role')";
    pdo_execute($sql);
}
function delete_tk($id){
    $sql = "DELETE FROM duan1.user WHERE id = '$id'";
    pdo_execute($sql);
}
function load_one_tk($id){
    $sql = "SELECT * FROM duan1.user WHERE id = '$id'";
    $load_one_tk = pdo_query_one($sql);
    return $load_one_tk;
}
function update_tk_admin($id,$username,$password,$email,$diachi,$phone,$role){
    $sql = "UPDATE duan1.user SET username = '$username', pass = '$password', email = '$email',address = '$diachi', phone = '$phone', role = '$role' WHERE id = '$id'";
    pdo_execute($sql);
}
function  update_pass_user($password_repass){
    $sql = "UPDATE duan1.user SET pass = '$password_repass'";
    pdo_execute($sql);
}
function sendMail($email){
    $sql = "SELECT * FROM duan1.user where email = '$email'";
    $sendMail = pdo_query_one($sql);
    return $sendMail;
}
function checkemailPass($email,$user,$pass) {
    include "PHPMailer/src/PHPMailer.php";
    include "PHPMailer/src/Exception.php";
    include "PHPMailer/src/SMTP.php";


    $mail = new PHPMailer\PHPMailer\PHPMailer(true); 
    $mail->CharSet = 'UTF-8';
    // print_r($mail);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'nguyenngocquoc4646@gmail.com';                 // SMTP username
        $mail->Password = 'qhjp tuzs dnxe zqgq';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
     
        //Recipients
    $mail->setFrom('nguyenngocquoc4646@gmail.com', 'QUỐC ĐẸP TRAI');

        $mail->addAddress($email,$user);     // Add a recipient            
        // Name is optional

        // $mail->addReplyTo('info@example.com', 'Information');

        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
     
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
     
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'ĐẶT LẠI MẬT KHẨU';
        $mail->Body    = 'Mật khẩu của bạn là:' .$pass;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
     
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}


function select_user_by_id($iduser){
    $sql = "SELECT * FROM duan1.user where id = $iduser";
    $select_user_by_id = pdo_query_one($sql);
    return $select_user_by_id;
}
?>