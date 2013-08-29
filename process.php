<?php 
if( isset( $_POST['ip'] ) && isset ( $_POST['mac'] ) ) {
   $ip = $_POST['ip'];
   $mac = $_POST['mac'];
   exec("sudo iptables -t mangle -I internet 1 -m mac --mac-source $mac -j RETURN");
   exec("sudo rmtrack " . $ip);
   sleep(1); // allowing rmtrack to be executed
   
   // OK, redirection bypassed.
   // Show the logged in message or directly redirect to other website

   echo "User logged in.";
   exit;

} else {
   echo "Access Denied"; 
   exit;
}
?>
