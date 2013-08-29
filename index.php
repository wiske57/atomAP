<html>
<head>
</head>
<body>
<?php
// capture their IP address
$ip = $_SERVER['REMOTE_ADDR'];

// this is the path to the arp command used to get user MAC address 
// from it's IP address in linux environment.
$arp = "/usr/sbin/arp";

// execute the arp command to get their mac address
$mac = shell_exec("sudo $arp -an " . $ip);
preg_match('/..:..:..:..:..:../',$mac , $matches);
$mac = @$matches[0];

// if MAC Address couldn't be identified.
if( $mac === NULL) { 
  echo "Access Denied.";
  exit;
}
?>
<h2>SMLUG Portal</h2>
<p>Click OK and everything will be ok.</p>
<form method="post" action="process.php">
  <input type="hidden" name="mac" value="<?php echo $mac; ?>" />
  <input type="hidden" name="ip" value="<?php echo $ip; ?>" />
  <input type="submit" value="OK" style="padding:10px 15px;" />
</form>
</body>
</html>
