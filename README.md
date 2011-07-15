CakePHP Simple MenuHelper
=========================

This simple helper generates a simple html navigation menu to diferent groups. You 
just need pass the group name/id to the render method and create a yaml file with the
same group name/id in the plugin config dir with the `.yml` extension.

The required yaml markup is pretty easy and clean, you can check a simple example at `plugins/menu/config/1.yml`

Install
-------
You just need to copy the plugin folder to your app plugins dir (usually `/app/plugins`)
and the spyc library to your app vendors folder.

After the steps above you must call the spyc vendor in your app bootstrap file.

Just add the following line to `/app/config/bootstrap.php`:
	
	App::import('Vendor', 'Spyc/Spyc');

