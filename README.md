Easy URL Exists EE Plugin
========================

This script allows you to check to see if a resource URL exists. It returns a value of "yes" or "no". A common use of this plugin would be to check if an external resource exists within a conditional to set up an alternative if the resource comes back with a 404.

Here’s an example of setting a variable using the plugin syntax:

	{preload_replace:has_photo="{exp:easy_file_exists url='{photo}'}"}

Then, later in the template:

	<img src="{if has_photo='yes'}{photo}{if:else}{default_avatar}{/if}" class="user-avatar" alt="" />
	
This is extremely useful when the file in question is an external resource as a simple `{if photo}` will evaluate as "true" if `{photo}` has a value, but the conditional does not check against the actual availability of the linked resource.