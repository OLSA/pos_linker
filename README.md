# POS Linker

This is linker from ERPNext to local thermal printer.

Install pos_linker to erp:

* bench get-app https://github.com/OLSA/pos_linker.git  
* bench install-app pos_linker  

## Instructions for .php file

This index.php file is receipe .csv writer, and it's need to be installed on host/network where is printer connected.  
Metalinker read .csv files and send commands to printer.

### Test without Metalinker (index.php, "development=true")
* install index.php on localhost inside <b>pos</b> folder (<b>www/pos/index.php</b>)
* on host where is index.php, navigate with browser to ERPNext and login
* create some receipe (POS) and press Submit  
If Your setup is ok You will noticed "ABC_nnnn.csv" file inside www/pos/index.php

### Test with Metalinker (index.php, "development=true")
* configure $in_path and $out_path <b>to Metalinker</b> working directories
* set $development=false
