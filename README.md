# WP Display Users
<p>
Contributors: Devnath verma<br />
Tags : widgets, users, display users, wp users, wp display user<br />
Requires at least : 3.5<br />
Tested up to : 4.2.4<br />
License: GPLv2 or later<br />
License URI: http://www.gnu.org/licenses/gpl-2.0.html
</p>

This plugin provides that allows you to display **Users** in any custom template, page and widgetized sidebar. It includes the abilities to display name, description, email, URL.

#Table of contents
<ul>
<li><a href="https://github.com/devnathverma/wp-display-users#description">Description</a></li>
<li><a href="https://github.com/devnathverma/wp-display-users#features">Features</a></li>
<li><a href="https://github.com/devnathverma/wp-display-users#requirements">Requirements</a></li>
<li><a href="https://github.com/devnathverma/wp-display-users#installation">Installation</a></li>
<li><a href="https://github.com/devnathverma/wp-display-users#contributing">Contributing</a></li>
<li><a href="https://github.com/devnathverma/wp-display-users#license">License</a></li>
</ul>

#Description
This plugin provides that allows you to display **Users** in any custom template, page and widgetized sidebar. It includes the abilities to display name, description, email, URL.

#Features
<ul>
<li>Create multiple rules</li>
<li>Choose user role which you want to display </li>
<li>Include or exclude user by user IDs</li>
<li> Display name, description, email or URL in frontend side</li>
<li> Set limit of user display</li>
<li> Option to display users as selected order by name, id, etc...</li>
<li> Option to display users as selected order asc, desc</li>
<li> Fully Responsive</li>
</ul>

= shortcode =

[wp_display_user id=rule-id]

You can use the <code>[wp_display_user id=rule-id]</code> shortcode to display users lisiting in page.

To set sequence of display items or add custom user fields (as seen [here](http://www.templatemonster.com/blog/add-custom-user-meta-data-wordpress/)), add `fields` array attribute to shortcode:

[wp_display_user id=rule-id fields="image, name, email, custom_user_field"]

You can also use this shortcode for custom template.

`<?php echo do_shortcode("[wp_display_user id=rule-id]"); ?>`

= Notices =

** Anyone can write the CSS for my plugin, I will added it.

#Requirements
<ul>
<li>WordPress 3.5 or above.</li>
<li>PHP</li>
</ul>

#Installation
1. Download the plugin and extract its contents.
2. Upload the `wp-display-users` folder to the `/wp-content/plugins/` directory.
3. Activate **WP Display Users** plugin through the "Plugins" menu in WordPress.
4. After activating check the side menu -> "WP Display Users".
5. In your admin console, go to Appearance > Widgets, drag the "WP Display Users" to wherever you want it to be and click on Save.

#Contributing
<ul>
<li>If you have any ideas/suggestions/bug reports, and if there's not an issue filed for it already (see <a href="https://github.com/devnathverma/wp-display-users/issues">issue tracker</a>, please <a href="https://github.com/devnathverma/wp-display-users/issues/new">create an issue</a> so I can keep track of it.</li>
<li>Developers can send <a href="https://github.com/devnathverma/wp-display-users/pulls">pull requests</a> to suggest fixes / improvements to the source.</li>
</ul>

#License
Copyright 2008-2015 Devnath verma (devnathverma@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
