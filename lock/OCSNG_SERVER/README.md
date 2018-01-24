<p align="center">
  <img src="https://cdn.ocsinventory-ng.org/common/banners/banner660px.png" height=300 width=660 alt="Banner">
</p>

<h1 align="center">OCS Inventory</h1>
<p align="center">
  <b>Some Links:</b><br>
  <a href="http://ask.ocsinventory-ng.org">Ask question</a> |
  <a href="#COMMING_SOON_STAY_CONNECTED">Installation</a> |
  <a href="https://www.ocsinventory-ng.org/?utm_source=github-ocs">Website</a> |
  <a href="https://www.ocsinventory-ng.org/en/#ocs-pro-en">OCS Professional</a>
</p>

<p align='justify'>
OCS (Open Computers and Software Inventory Next Generation) is an assets management and deployment solution. 
Since 2001, OCS Inventory NG has been looking for making software and hardware more powerful. 
OCS Inventory NG asks its agents to know the software and hardware composition of every computer or server.
</p>




<h2 align="center">Assets management</h2>
<p align='justify'>
Since 2001, OCS Inventory NG has been looking for making software and hardware more powerful. OCS Inventory NG asks its agents to know the software and hardware composition of every computer or server. OCS Inventory also ask to discover network’s elements which can’t receive an agent. Since the version 2.0, OCS Inventory NG take in charge the SNMP scans functionality.
This functionality’s main goal is to complete the data retrieved from the IP Discover scan. These SNMP scans will allow you to add a lot more informations from your network devices : printers, scanner, routers, computer without agents, …
</p>

<h2 align="center">Deployment</h2>
<p align='justify'>
OCS Inventory NG includes the packet deployment functionality to be sure that all of the softwares environments which are on the network are the same. From the central management server, you can send the packets which will be downloaded with HTTP/HTTPS and launched by the agent on client’s computer. The OCS deployment is configured to make the packets less impactable on the network. OCS is used as a deployment tool on IT stock of more 100 000 devices.
</p>
<br />

## Requirements
- MySQL version 4.1 or higher
- PERL 5.6 or higher (5.8 or higher recommended)
- Apache version 1.3.33 or higher / Apache version 2.0.X or higher
- Apache Mod_perl version 1.29 or higher
- PHP 4.3.2 or higher, with ZIP support enabled.
- Apache Mod_php version 4.3.2 or higher
- Perl module XML::Simple version 2.12 or higher
- Perl module Compress::Zlib version 1.33 or higher
- Perl module DBI version 1.40 or higher
- Perl module DBD::Mysql version 2.9004 or higher
- Perl module Apache::DBI version 0.93 or higher
- Perl module Net::IP version 1.21 or higher
- Perl module Archive::Zip 
- Perl module Apache2:SOAP
- Perl module SOAP::Lite version 0.66 or higher
- Perl module XML::Entities version 0.02 or higher, not required, used only with SOAP web service

## Installation
To install OCSInventory server simply run the setup script
```bash
sh setup.sh
```

If you want to install webconsole OCS Reports you need to fork OCSInventory-ocsreports as ocsreports
```bash
git clone https://github.com/OCSInventory-NG/OCSInventory-ocsreports.git ocsreports
```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Add your changes: `git add folder/file1.php`
4. Commit your changes: `git commit -m 'Add some feature'`
5. Push to the branch: `git push origin my-new-feature`
6. Submit a pull request !

## License

OCS Inventory is GPLv2 licensed
