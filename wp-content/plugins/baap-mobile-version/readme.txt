=== BAAP Mobile Version ===
Contributors: BAAP, , 
Tags: mobile, mobile web, mobile internet, wireless, pda, iphone, android, webkit, wap, dotMobi, theme, blackberry, admob, mobile adsense, qr-code, device, switcher, cellular, palm, nokia
Requires at least: 2.5
Tested up to: 3.1.1
Stable tag: 2.0

The BAAP Mobile Version is a complete toolkit to help mobilize your WordPress site. It has a mobile switcher, themes, widgets, and mobile admin panel.

== Description ==

The BAAP Mobile Version is a complete toolkit to help mobilize your WordPress site and blog.

It includes a mobile switcher to select themes based on the type of user that is visiting the site, a selection of mobile themes, extra widgets, device adaptation and a mobile administration panel to allow users to edit the site or write new posts when out and about.

Features include:

*  **A mobile switcher** which automatically suggests desktop or mobile presentation, but lets users switch to the other if required (and remembers their choice).

*  **A set of advanced themes for Nokia and WebKit devices**, designed by [Forum Nokia](http://www.forum.nokia.com/Technology_Topics/Web_Technologies/Browsing/Web_Templates/ "Forum Nokia"). These also look beautiful on Android, iPhone and Palm devices.

*  **Device adaptation**, including the rescaling of images, intelligent splitting of articles and posts into multiple pages, the simplifaction styles, and the removal of non-supported media.

*  **A mobile admin panel**, that allows the blog managers to access the admin interface via a mobile device, with simplified access to the most common features such as editing a post or approving comments.


Enjoying your site and blog in mobile.


== Installation ==


[For Detailed step by step instructions for installtion please Click Here](http://howtoinstallwordpressplugin.com/wpmobile_plugin)


= Simple installation for WordPress v2.7 and later =

1.  Go to the 'Plugins' / 'Add new' menu
1.	Upload baap-mobile-version.zip then press 'Install now'.
1.	Activate the switcher plugin. Change its settings as required.
1.	Select which desktop widgets are to appear on the mobile theme.
1.  Enable your site to be listed on mpexo.
1.	Enjoy.

= Simple installation for WordPress v2.5 and v2.6 =

Here, the installation is very slightly different:

1.	Locate your WordPress install on the file system
1.	Extract the contents of baap-mobile-version.zip into wp-content/plugins
1.	Activate the switcher plugin. Change its settings as required.
1.	Select which desktop widgets are to appear on the mobile theme.
1.  Enable your site to be listed on mpexo.
1.	Enjoy.

= Make the cache writable =

**NB:** the web server needs to have write-access to the image cache folder `wp-content/plugins/wordpress-mobile-pack/plugins/wpmp_transcoder/c`. If you have installed the plugin with WordPress 2.7, this should already be the case. Otherwise, or if you see errors when the plugin tries to resize images, you will need to set the permissions on that folder appropriately.

Ensure that the `c` directory flags are `rwxrwxrwx`, or whatever you choose in order to be web-server-writable:

    wordpress $> cd wp-content/plugins
    plugins $> cd wordpress-mobile-pack/plugins/wpmp_transcoder
    wpmp_transcoder $> sudo chmod 777 c
    wpmp_transcoder $> ls -al
    -----------------------------------------------------------------
    drwxrwxrwx  3 root  staff    102 20 Apr 10:08 c
    -rwxrwxrwx  1 root  staff  13003 20 Apr 10:43 wpmp_transcoder.php</pre>

= Make the themes directory writable =

**NB:** the web server also needs to have write-access to the themes folder `wp-content/themes`, as it installs themes in that directory as part of the plugin activation. If you have installed the plugin with WordPress 2.7, this may already be the case. Otherwise, or if you see errors when activating the plugin, you will need to set the permissions on that folder appropriately.

Ensure that the `themes` flags are `rwxrwxrwx`, or whatever you choose in order to be web-server-writable, using a similar technique to that above.


= Comprehensive setup =

A more comprehensive setup process and guide to configuration is as follows. If you are installing the plugin through the admin dashboard, you'll be able to skip most of the early steps.

1. Locate your WordPress install on the file system
1. Extract the contents of `baap-mobile-version.zip` into `wp-content/plugins`
1. In `wp-content/plugins` you should now see a directory named `baap-mobile-version`
1. Ensure the `wp-content/themes` directory and `wpmp_transcoder/c` cache directory are web-server-writable, as described above.
1. Login to the WordPress admin panel at `http://yoursite.com/wp-admin`
1. Go to the 'Plugins' menu.`
1. You should see 'Mobile Switcher' in the list. If not, check steps 2 and 3.`
1. Click 'Activate' for that plugin.`
1. In `wp-content/themes` you should now see a selection of new directories including `mobile_pack_base`, `mobile_pack_blue` etc.
1. Go to the 'Themes' page in the 'Appearance' menu (or 'Design' in WordPress v2.6 or earlier)
1. You should see a number of mobile themes in the list. If not, check steps 8 and the permissions on the theme directory. **NB** do NOT select one of these themes. If you do so, even your desktop users will receive a mobile theme. The selected theme here should reflect what you want your desktop users to continue to see, and you'll configure the mobile theme choice separately in the switcher settings.
1. Go to the 'Mobile Switcher' page in the 'Appearance' menu (or 'Design' in WordPress v2.6 or earlier)
1. Choose a switcher mode:
  * 'Disabled' removes switching and all users receive the desktop theme
  * 'Browser detection' means that the switcher will try to identify if your user has a mobile device
  * 'Domain mapping' requires you to provide a different domain for your mobile users to access the site
  * 'BOTH' (recommended) enables a combined algorithm that uses recognition and domain usage for the best user experience
1. If you are using 'domain mapping' (or the combined approach), ensure all your relevant domains are resolving to this single WordPress installation. This may require you to configure your DNS and web server configurations.
1. Choose the theme to be used for your mobile users.
1. Users can choose whether to toggle between sites. Decide whether you want this link to appear in the theme footer. Alternatively, you can enable the 'Mobile Switcher Link' widget in the 'Widgets' admin menu.
1. Go to the 'Widgets' menu and select which of the currently enabled desktop widgets you wish to have displaying on your mobile theme.
1. Enable your blog for inclusion in the mpexo mobile blog directory.
1. Take a quick look at the other mobile admin settings and widgets available.
1. You're all done!

== Frequently Asked Questions ==

= Where are my widgets? =
You need to select which of your desktop widgets you want to have appear on the mobile theme. Go to the 'Mobile Widgets' admin page to do so.

= Are shrinked images cached? =
Yes, all images, once rescaled, are cached locally.

= I need more help! =

You are welcome to comment about the pack, suggest new features and ask for help on our public forums, available on [WordPress](http://www.wordpress.org/tags/baap-mobile-version).

= How can I help on the project? =

We run the development of the plugin over at [baaptechnologies](http://http://howtoinstallwordpressplugin.com/wpmobile_plugin). You can track issues and development progress there.

= Is it compatible with WP Super Cache? =

YES! You have to make sure your settings are correct though. Follow these simple steps:

1. Install both plugins
1. Activate WP Super Cache
1. Go to the WP Super Cache settings page
1. Check the radio button "ON" to activate the cache
1. Click on "Update status"
1. Scroll down and click on the "Update Mod_Rewrite Rules" button
1. Go back to the plugins page, activate WPMP and configure it

== Changelog ==

= 2.0 =
* Fixed image transcoder callback bug

== Upgrade Notice ==

= 2.0 =
* Includes advanced themes for Nokia and WebKit devices, and mobile analytics and integration with [PercentMobile](http://percentmobile.com)



== Screenshots ==

1. Blog post listing with teasers, shown in both Nokia/WebKit and default themes.
2. Single blog post, shown in both Nokia/WebKit and default themes.
3. Editing a post in the mobile admin dashboard, shown in both Nokia/WebKit and default themes.
4. WebKit theme on an iPhone, showing teaser-less post listing and collapsible widgets.
5. Admin panel for mobile switcher.
6. Admin panel for the mobile theme and device adaptation.
7. Admin panel for enabling and disabling widgets on the mobile theme.
8. Admin panel for configuring analytics.
9. Admin panel for enabling mpexo support.
10. A desktop theme showing a barcode widget and switcher link.


== Documentation ==

The pack is so-called because it contains a number of discrete pieces of functionality. In theory it is possible to individually enable or disable the components (through editing the registrations at the top of the main plugin file), but the vast majority of users are expected to install the pack en masse.

The pack contains the following functionality:

= Mobile switcher =

The mobile switcher identifies whether the visitor to the site is mobile or not, and switches between the primary WordPress theme (for desktop users) and a mobile theme (of the site owner's choice) accordingly.

It can use two approaches to identify the user as mobile. Firstly, it can try to identify if they have a mobile device based on the headers sent when a page is requested. Alternatively, it can identify whether the user has requested the site on a 'desktop domain' (such as yoursite.com) or a 'mobile domain' (such as yoursite.mobi) and deduce their intent from that.

The recommended approach is a third, combined, approach that uses both techniques, and also allows users to switch between sites if the choice is not appropriate by providing a link in the themes' footers or a widget.

In this combined mode, the switcher will provide interstitial warning pages if a mobile user accesses the desktop domain or vice-versa. It will also remember their choice of preferred site through the use of a cookie.

Settings for the switcher are found under the 'Mobile Switcher' admin page, and are self-explanatory.

More detail on these switching algorithms is available in a series of articles published by [http://mobiforge.com](mobiForge).

= Base mobile theme =

The pack contains an extensible theme that is ready for display on mobile devices. The theme is XHTML-MP compliant and scores highly on dotMobi's ready.mobi site tester.

The base theme supports all standard WordPress content, including indexes, posts, pages, archives, search results, comments and widgets. If configured, it also invokes the device adaptation process (detailed below) that ensures the posts themselves are formatted suitable for mobile devices.

There are a number of simple settings that can be used to adapt the way in which lists of posts appear on the mobile theme. These are found under the 'Mobile Theme' admin page, which appears when the switcher component is installed (or when the mobile theme is selected as the main WordPress theme). It is possible to set how many posts appear on the home page and in archives, and how verbosely they display.

Away from the posts themselves, the theme does not provide a 'hard-coded' sidebar and relies wholly on the WordPress widget framework. Widgets that are selected in the WordPress admin pages (and then selected to show for the mobile theme) will appear in a 'sidebar' below the main part of the mobile page.

Since each widget adds size to the overall page, it is recommended that no more than 5 desktop widgets are enabled for the mobile theme. The 'Mobile Widgets' admin page also appears when the switcher component is installed (or when the mobile theme is selected as the main WordPress theme).

Any standard WordPress widgets that are known not to be XHTML-compliant are slightly rewritten by the theme to make them so. However, the theme does not currently correct arbitrary widget content and the use of third-party widgets (that were designed for desktop use) may easily push the overall page out of XHTML-MP compliance and affect the user's experience.

Large widgets are not currently split or paged for small mobile devices. This may increase the load time, cost to the user, or even make the page unreadable on a limited capability device. Be aware of this when enabling large widgets on the mobile theme.

= Extended mobile themes =

Simply by extending the base theme, it is very easy and quick to customise the mobile theme to fit existing requirements or brand.

The easiest way to do this is to re-tint the theme's colour scheme. The colour specifications for the base theme are all defined at the top of its stylesheet. Site owners can override this palette with their own colours, named DARKEST, DARK, MID, LIGHT, LIGHTEST and so on.

To demonstrate, three extended themes are available within this pack: blue, green and red. Note how they use the 'Template:' directive at the top of the stylesheet (and the CSS @import statement) to indicate that they extend the base theme.

Of course it is also easy to extend the theme in other, more structural ways, and even adapt the template's PHP files. However, if such changes should be done carefully to preserve XHTML-MP compliance within the markup.

= Transcoding and device adaptation =

When the base theme, or a theme that extends it, it used, the pack provides some features to adapt the content of the posts and pages of the blog to make them more suitable for mobile use.

There are four major stages to this process, and each may be enabled or disabled independently on the 'Mobile Theme' admin page. These are:

1. **Remove media** - This will remove interactivity and media elements (such as script, Flash, movies, and embedded frames) from the posts and pages. Unless it is certain that users have high-capability handsets, these types of content will stretch the abilities of their mobile devices. The HTML tags removed are object, embed, marquee, script, frame and iframe. This process also removes any event attributes (such as onClick) from the page.
1. **Partition large pages** - This will break large blog posts or pages into smaller pieces more suitable for mobile devices. The length of each piece depends on the known memory limitations of the visitor's device (if DeviceAtlas integration is enabled), or will default to approximately 5K in size. Contiguous sections such as lists will not be broken, and a pager will appear at the bottom of each post to allow the user to page through the post.
1. **Shrink images** - This will shrink large images within posts or pages to fit on smaller screens. The width or height constraints of the device (if DeviceAtlas integration is enabled) are used to determine the new dimensions, or they will default to 124 pixels. This functionality relies on the server having the PHP graphics library LibGD installed (as it will be for PHP 4.3 or greater). Both the original and resized images are cached locally for performance, and site owners have an option to clear this cache on the admin page.
1. **Simplify styling** - This will remove styling elements from the posts and pages to ensure mobile compatibility. The HTML attributes removed are: align, background, bgcolor, border, cellpadding, cellspacing, class, color, height, style and width. It removes the following tags: center, font, and span (although note that the inner content of those tags remains). Finally it removes any empty, non-singleton tags that do not have attributes, such as, for example, `&lt;div&gt;&lt;/div&gt;`.

= Mobile admin panel =

A user identified as mobile by the switcher will receive a mobilised version of the WordPress administration interface. The link to the dashboard is available in the standard 'Meta' widget, or it can be reached directly at `http://your.site/wp-admin`

Only users with administrator status are allowed to access the mobile administration pages. Note this makes it more restrictive than the desktop dashboard, but this prevents less-authorised users from accessing it and making changes to important site settings.

The following pages are available in the mobile administration interface:

1. **Overview** - Like the desktop dashboard, this details how many pages, posts, categories and tags site owners have on the site. It also highlights how many comments currently await moderation.
1. **New post** - Administrators may write a new post to appear on the site. They can specify the title and the body of the post, and whether they want it to remain draft, pending review, or published. It is not currently possible to specify tags, categories or other advanced properties of the post in the mobile interface.
1. **Edit post** - This page lists all of the current posts and allows administrators to edit them. As for the 'New post' page, they can edit title, status, and body. It is not possible to edit the categories or tags and so on, although existing values for such properties of the post will remain set after editing in the mobile interface. Depending on the theme, a link to this edit panel may also be available on the site itself when administrators are logged in.
1. **Comments** - This page lists extracts of all of the comments awaiting moderation on the site. From this list, administrators can click on the commentator's name to see the whole comment, and, by clicking the appropriate links, set the comment to be published or marked as spam. Editing, de-approving or deleting a comment cannot be performed in this interface.
1. **Switcher** - It is possible to change the mobile switching mode in case the site-owner needs to reset the configuration.
1. **Settings** - This page lists all the settings for the site which are simple enough to edit with this mobile interface. Complex settings, such as which plugins are installed, are not available. However, text- and number-based settings can be easily edited. Note that no descriptions are available for each setting and the meanings of the values, so it is advisable to only edit them cautiously.

It is also possible to log-out of the admin panel. Since the login is stored persistently on the mobile device, this is advisable if the site is sensitive and administrators want to protect against the impact of handset theft.

The mobile administration panel uses the same URL structure as the desktop version, so in most cases, the administration links sent to administrators in emails (such as when a comment needs moderation) can be followed regardess of whether they are using a mobile device or a desktop.

= Mobile ad widget =

This provides the ability to place a new widget into the site containing either AdMob or Google mobile ads. Administrators will see the 'Mobile Ads' in the 'Widget' admin page, and it allows them to specify which provider to use, and the publisher ID.

The widget can also be configured to attempt to disable itself when shown on a desktop theme. This is recommended, since the quality of mobile ads presented in response to a desktop user context is lower, and relevant conversion rates may be negatively affected.

Google supports both single-ad and double-ad modes. Administrators can select which to use from the same publisher dropdown.

= Barcode widget =

Site owners can place a two-dimensional QR-code widget on the desktop site that users can use to quickly navigate to the mobile version of the site. If their phones have a camera and QR-code reader capabilities, they can simply snap the barcode off their desktop screen and navigate directly to the mobile equivalent.

If a URL is specified, the QR-code is fixed to that address. If it is left blank, it will correspond to the page it is being displayed upon.

Within the widget site owners can specify the link to provide, and the size of the square barcode to show. Site owners should ensure it fits well into the desktop theme.

Site owners can also indicate whether they want the widget to show some instructions to the users about the purpose of the barcode, as well as a list of well-known readers they can download for their devices if they are not already installed.

