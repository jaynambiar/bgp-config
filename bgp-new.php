<?php
$wanip = $_POST['wanip'];
$lanip = $_POST['lanip'];
$bgpnbr = $_POST['bgpnbr'];
$asnum = 64540;
$desc = $_POST['desc'];
$desc_long = $_POST['desc_long'];


echo "###ISP Side Config (Juniper)";
echo "<br>"; 
echo "<br>"; 


echo "set policy-options policy-statement $desc-bgp-import term t1 from route-filter $lanip exact<br>";
echo "set policy-options policy-statement $desc-bgp-import term t1 then local-preference 200<br>";
echo "set policy-options policy-statement $desc-bgp-import term t1 then accept<br>";
echo "set policy-options policy-statement $desc-bgp-import term t2 then reject<br>";




echo "<br>"; 

echo "set protocols bgp group customer-bgp neighbor $bgpnbr  description $desc<br>";
echo "set protocols bgp group customer-bgp neighbor $bgpnbr import $desc-bgp-import<br>";


echo "<br>"; 
echo "<br>"; 
echo "###Customer Side Config (Cisco)";
echo "<br>";
echo "<br>";


echo "ip prefix-list $desc permit $lanip<br>";
echo "<br>";


echo "router bgp $asnum<br>";
echo "&nbsp bgp log-neighbor-changes<br>";
echo "&nbsp neighbor $wanip remote-as 100<br>";
echo "&nbsp neighbor $wanip description Primary<br>";
echo "&nbsp neighbor $wanip timers 10 30<br>";
echo "&nbsp !<br>";
echo " address-family ipv4<br>";
echo "&nbsp redistribute connected<br>";
echo "&nbsp redistribute static<br>";
echo "&nbsp neighbor $wanip activate<br>";
echo "&nbsp neighbor $wanip soft-reconfiguration inbound<br>";
echo "&nbsp neighbor $wanip prefix-list $desc out<br>";
echo "&nbsp !<br>";


?> 

