=== TwitchPress ===
Contributors: ryanbayne
Donate link: https://www.patreon.com/twitchpress
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Tags: twitch, streaming, embed, api, login
Requires at least: 6.0
Tested up to: 6.7
Stable tag: 3.19.0
Requires PHP: 7.4

Unofficial Twitch.tv integration for WordPress. Embed streams, gate content for followers/subscribers, and authenticate users via Twitch.

== Description ==

TwitchPress connects your WordPress site to the Twitch Helix API. Embed live streams, restrict content to followers or subscribers, let visitors sign in with their Twitch account, and display channel data using shortcodes.

**TwitchPress is unofficial and is not endorsed by Twitch Interactive, Inc.**

= Core Features =

* Sign in and register via Twitch OAuth
* Follower-only and subscriber-only content gating
* Embed live streams, chat, and videos
* Channel status shortcodes (online/offline, viewer count)
* Twitch avatar as WordPress avatar
* Full-width split-screen stream layout
* Channel list and team roster shortcodes
* Top games and clips shortcodes
* EventSub webhook support

= Links =

* [GitHub](https://github.com/LOLinDark/TwitchPress)
* [Discord](https://discord.gg/ScrhXPE)
* [Blog](https://twitchpress.wordpress.com)
* [Patreon](https://www.patreon.com/twitchpress)

= Requirements =

* PHP 7.4 or higher
* WordPress 6.0 or higher
* cURL PHP extension
* JSON PHP extension
* A registered Twitch Developer Application (free at dev.twitch.tv)

== Installation ==

1. Upload the `twitchpress` folder to `/wp-content/plugins/`.
2. Activate the plugin through the Plugins menu in WordPress.
3. Navigate to the TwitchPress Setup Wizard to enter your Twitch application credentials.
4. Configure scopes and features as needed.

= Twitch Application Setup =

1. Go to [dev.twitch.tv/console](https://dev.twitch.tv/console) and create a new application.
2. Set the OAuth Redirect URL to your WordPress site (the plugin will display the exact URL during setup).
3. Copy the Client ID and Client Secret into the TwitchPress Setup Wizard.

== Frequently Asked Questions ==

= Do I need a Twitch Developer account? =

Yes. You need to register a free application at dev.twitch.tv to obtain API credentials.

= Does this work with the current Twitch API? =

Yes. TwitchPress uses the Twitch Helix API exclusively. Legacy Kraken/v5 endpoints have been removed.

= Can visitors log in with Twitch? =

Yes. The plugin supports OAuth2 authentication allowing visitors to sign in or register using their Twitch account.

= Is subscriber-only content supported? =

Yes. Use the `[twitchpress_shortcodes shortcode="sub_only_content"]` wrapper shortcode to restrict content to your Twitch subscribers.

= Can I embed a live stream? =

Yes. Use `[twitchpress_embed_everything channel="your_channel"]` to embed both the stream player and chat.

== Screenshots ==

1. Setup Wizard for entering Twitch application credentials.
2. Channel list shortcode displaying live streams.
3. Split-screen layout with two embedded streams.

== Changelog ==

= 3.19.0 =

* Removed deprecated Twitch Kraken/v5 API scopes from codebase
* Deprecated get_users_follows methods (endpoint removed by Twitch August 2023)
* Fixed get_channels_followers endpoint bug where broadcaster_id was conditionally omitted
* Fixed embed shortcode XSS vulnerability (user attributes no longer dumped raw into script tags)
* Fixed embed shortcode overwriting dynamic content with hardcoded test values
* Fixed get_broadcaster_subscriptions parameter order in curl call
* Fixed undefined variable in channel status shortcode
* Fixed broken shortcode registration for visitor API services buttons
* Removed dead Webhooks Hub methods (endpoint removed by Twitch)
* Removed community_id parameter from get_streams (communities removed from Twitch)
* Updated GitHub repository links to new location
* Code quality improvements throughout

= 3.18.0 =

* Example pages installation now includes channel list and team list examples
* Fixed error in twitchpress_setup_database_save() on installation
* Fixed undefined variable $channel_id in channel status box shortcode
* Fixed Channel List CSS not loading
* Fixed videos failing to display due to missing parent value
* Changed parameter order in endpoint() and curl()
* Resolved Creation of dynamic property deprecated messages
* get_streams() can now accept an array of IDs

= 3.17.1 =

* Missing files patch

= 3.17.0 =

* Raw Twitch API response displayed on Activity and Subscription data views
* API body responses no longer stored in activity meta table by default
* Subscriber sync tool now has option to dump API response
* Login text setting now applies to shortcode button
* Fixed connect button style 1 output
* Fixed channel list shortcode using old constants
* Fixed channel status shortcode

== Upgrade Notice ==

= 3.19.0 =
Security fix: XSS vulnerability in embed shortcode. Compatibility fix: deprecated Twitch API endpoints replaced. Update recommended for all users.

== Privacy ==

TwitchPress communicates with the Twitch.tv API (api.twitch.tv) to provide its features. When users authenticate via Twitch, their Twitch user ID, display name, and email (if scope permits) are stored in WordPress user meta. No data is sent to any third party other than Twitch Interactive, Inc.

For more information, see the [Twitch Developer Services Agreement](https://www.twitch.tv/p/developer-agreement) and [Twitch Privacy Policy](https://www.twitch.tv/p/legal/privacy-notice/).
