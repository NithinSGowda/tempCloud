Temporary cloud storage for handy file sharing


Inorder to host it on your server, follow the below steps

i) Upload the files in this repository to your document root. (/var/www/html in case of linux)

ii) Make sure that the permissions of all files are 755.

iii) Create folders named 'uploads' and 'TEXT' and set permissions of these folders to 777 in normal case or if www-data is in the sudoers file then the permission can be set to 744

iv) Create htaccess and php.ini files as/if required.

v) Upload limit can be set if php.ini file is created. Default would be 8Mb

vi) Change the database credentials where ever requiered and set your database creds.
