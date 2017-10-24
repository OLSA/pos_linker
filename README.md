# POS Linker

Connector, or linker between ERPNext on remote location, and local thermal printer. Here is used widely supported method of file sharing. This is working example customised for Metalink application which currently support more than 50 various thermal printer models.

Install pos_linker to erp:
```
bench get-app https://github.com/OLSA/pos_linker.git  
bench install-app pos_linker 
```

## Instructions for .php file

PHP file is .csv files writer, and it's need to be installed on localhost/network where is printer connected.  

### First step: set "Access-Control-Allow-Origin"
Line 9., index.php, need to write correct domain or IP address where is your ERPNext hosted.

### Test without Metalinker (index.php, $development=true)
* install index.php on localhost inside <b>pos</b> folder (<b>www/pos/index.php</b>)
* set `$development=true`
* on host where is index.php, navigate browser to ERPNext and login
* create some receipe (POS) and press Submit  
If your configuration is ok, you will noticed `ABC_nnnn.csv` file inside <b>www/pos/index.php</b>

### Test with Metalinker (index.php, $development=false)
* configure `$in_path` and `$out_path` <b>to Metalinker</b> working directories
* set `$development=false`


