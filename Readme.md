### PHP script to generate BGP configs for Junos (ISP side) with Cisco IOS (customer side)

For IPv4 a common BGP Group (customer-bgp) and AS number (64540) is used for all customers.
ISP side AS number is 100 in this example

```
set protocols bgp group customer-bgp type external
set protocols bgp group customer-bgp hold-time 20
set protocols bgp group customer-bgp export bgp-default-originate
set protocols bgp group customer-bgp peer-as 64540
set protocols bgp group customer-bgp local-as 100
```
