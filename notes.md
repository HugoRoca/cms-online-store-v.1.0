<h1 align="center">CMS Online Store V1</h1>

1. Edit httpd.conf, find "DocumentRoot" and "Directory" and change value for directory of development, example: "C:/GitHub".

2. Add code lines after `</Directory>` and add config:
```
<VirtualHost *:80>
    DocumentRoot "c:/GitHub/cms-online-store-v.1.0/public"
    ServerName hr-mycsmv1.com
</VirtualHost>
```
3. Open file "C:\Windows\System32\drivers\etc\hosts" and add: 127.0.0.1 hr-mycsmv1.com
