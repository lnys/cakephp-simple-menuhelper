CakePHP Simple MenuHelper
=========================

With this simple helper you can generate a different navigation menu
for diferent user groups.

Install
-------
You just need to copy the plugin folder to your app plugins dir (usually `/app/plugins`)
and the spyc library to your app vendors folder.

After the steps above you must call the spyc vendor in your app bootstrap file.

Just add the following line to `/app/config/bootstrap.php`:
	
	App::import('Vendor', 'Spyc/Spyc');

