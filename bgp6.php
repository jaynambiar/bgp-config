<?php
$int = $_POST['int'];
$vlan = $_POST['vlan'];
$wanip = $_POST['wanip'];
$lanip = $_POST['lanip'];
$bgpnbr = $_POST['bgpnbr'];
$asnum = $_POST['asnum'];
$desc = $_POST['desc'];
$desc_long = $_POST['desc_long'];



echo "<br>"; 

echo "set interfaces $int unit $vlan description $desc_long<br>";
echo "set interfaces $int unit $vlan vlan-id $vlan<br>";
echo "set interfaces $int unit $vlan family inet address $wanip<br>";

echo "<br>"; 


echo "set policy-options policy-statement $desc-ipv6-bgp-import term t1 from route-filter $lanip exact<br>";
echo "set policy-options policy-statement $desc-ipv6-bgp-import term t1 then accept<br>";
echo "set policy-options policy-statement $desc-ipv6-bgp-import term t2 then reject<br>";




echo "<br>"; 

echo "set protocols bgp group $desc-ipv6 type external<br>";
echo "set protocols bgp group $desc-ipv6 description $desc_long<br>";
echo "set protocols bgp group $desc-ipv6 preference 100<br>";
echo "set protocols bgp group $desc-ipv6 hold-time 20<br>";
echo "set protocols bgp group $desc-ipv6 family inet6 unicast<br>";
echo "set protocols bgp group $desc-ipv6 import $desc-ipv6-bgp-import<br>";
echo "set protocols bgp group $desc-ipv6 export bgp-default-originate-ipv6<br>";
echo "set protocols bgp group $desc-ipv6 neighbor $bgpnbr peer-as $asnum<br>";


echo "<br>"; 


?> 

