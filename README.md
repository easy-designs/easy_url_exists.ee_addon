Easy URL Exists EE Plugin
========================

This script allows you to check to see if a resource URL exists. It returns a value of yes or no. A common use of this plugin would be to check if the URL exists within a conditional to set up an alternative if the resource comes back with a 404.

Here’s an example of setting a variable using the plugin syntax

	{preload_replace:has_photo="{exp:easy_file_exists url='{photo}'}"}

Here’s an example of how to use that variable in the template:

	<img src="{if has_photo='yes'}{photo}{if:else}{default_avatar}{/if}" class="user-avatar" />