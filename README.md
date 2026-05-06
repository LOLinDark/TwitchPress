# TwitchPress

**Unofficial Twitch.tv power-up for your WordPress!**

[![WordPress Plugin Version](https://img.shields.io/wordpress/plugin/v/twitchpress.svg?style=flat-square)](https://wordpress.org/plugins/twitchpress/)
[![WordPress Plugin Downloads](https://img.shields.io/wordpress/plugin/dt/twitchpress.svg?style=flat-square)](https://wordpress.org/plugins/twitchpress/)
[![WordPress Plugin Rating](https://img.shields.io/wordpress/plugin/r/twitchpress.svg?style=flat-square)](https://wordpress.org/plugins/twitchpress/reviews/)

Add the power of the Twitch API to your WordPress by installing this plugin. Some features are similar to those found in premium plugins and as development continues. More features will match those premium plugins.

*TwitchPress is unofficial and has not been endorsed by Twitch Interactive, Inc. Use of this plugin requires the full understanding and acceptance of Twitch Interactive, Inc. terms of service.*

---

## Links

*   [Blog](https://twitchpress.wordpress.com)
*   [GitHub](https://github.com/LOLinDark/TwitchPress)
*   [Developer's Twitter](https://twitter.com/ryan_r_bayne)
*   [TwitchPress Twitter](https://twitter.com/twitchpress)
*   [Author's Twitch](https://www.twitch.tv/lolindark1)
*   [Discord Chat](https://discord.gg/ScrhXPE)
*   [Patreon Pledges](https://www.patreon.com/twitchpress)
*   [PayPal Donations](https://www.paypal.me/zypherevolved)

---

## Features

*   Free Pro Features
*   Sign-In Via Twitch
*   Registration Via Twitch
*   Follower Only Content
*   Embed Live Streams
*   Embed Live Chat
*   Full-Width Split-Screen Layout
*   Redirect Visitors Anywhere
*   Channel List Shortcode
*   Twitch.tv Logo as Avatars

### Beta Features

*   Ultimate Members Integration
*   Subscribers Only Content
*   Subscriber Only Posts
*   Subscriber Roles/Capabilities

---

## Roadmap

Here are some of the features currently in development or planned for the near future:

*   **Ultimate Member Integration:** Deeper integration with the Ultimate Member plugin.
*   **Enhanced Subscriber-Only Content:** More robust tools for restricting content to Twitch subscribers.
*   **Subscriber-Specific Posts:** Ability to make entire posts available only to subscribers.
*   **Subscriber Roles & Capabilities:** Assign specific WordPress roles and permissions based on Twitch subscription tiers.

Have a feature request? Feel free to open an issue on [GitHub](https://github.com/LOLinDark/TwitchPress/issues).

---

## Installation

1.  **Method One (FTP):**
    *   Download the plugin.
    *   Unzip the file and upload the `twitchpress` folder to your `wp-content/plugins/` directory.
    *   Activate the plugin through the 'Plugins' menu in WordPress.

2.  **Method Two (cPanel):**
    *   Use your hosting control panel's file manager to upload the `twitchpress` folder to the `wp-content/plugins/` directory.
    *   Activate the plugin through the 'Plugins' menu in WordPress.

3.  **Method Three (WordPress Admin):**
    *   In your WordPress admin, go to **Plugins > Add New**.
    *   Search for "TwitchPress".
    *   Click "Install Now" and then "Activate".

---

## Usage (Shortcodes)

Here are some examples of available shortcodes. For more detailed instructions, please visit the [official website](https://twitchpress.wordpress.com/shortcodes/).

*   `[twitchpress_embed_everything channel="ZypheREvolved"]` - Embeds stream and chat.
*   `[twitchpress_connect_button]` - Displays a "Connect with Twitch" button.
*   `[twitchpress_shortcodes shortcode="channel_list"]` - Shows a list of channels.
*   `[twitchpress_shortcodes shortcode="get_game" refresh="5" game_name="Conan Exiles"]` - Get game information.
*   `[twitchpress_shortcodes shortcode="get_clips" refresh="5" broadcaster_id="120841817"]` - Get clips from a channel.
*   `[twitchpress_stream_data channel_name="" value="game_id"]` - Get specific stream data.
*   `[twitchpress_get_top_games_list total="5"]` - List top games on Twitch.
*   `[twitchpress_channel_status channel_name="LOLinDark1"]` - Check if a channel is live.
*   `[twitchpress_followers_only]`Some content for Twitch.tv followers only.`[/twitchpress_followers_only]` - Restrict content to followers.
*   `[twitchpress_shortcodes shortcode="sub_only_content"]`Some subscriber only content goes here.`[/twitchpress_shortcodes]` - Restrict content to subscribers.

---

## Support

Community support is available on the project's [Discord server](https://discord.gg/ScrhXPE). Premium support is available by joining the project's [Patreon](https://www.patreon.com/twitchpress) or donating via [PayPal](https://www.paypal.me/zypherevolved).

---

## Contributors

*   **Ryan Bayne (lead developer)**
*   **nookyyy** - Testing
*   **IBurn36360** - Author of the original Twitch API class
*   **Automattic** - Plugin design inspiration
*   **Ashley Rich** - Contributed a class

---

## Changelog

### 3.18.1 (Upcoming)
*   **Technical Notes:**
    *   Renamed common function name: `embed_parent_string()`

### 3.18.0
*   **Feature Changes:**
    *   Example pages installation now includes a random list of channels and a team list example.
*   **Faults Resolved:**
    *   Fixed error in `twitchpress_setup_database_save()` on installation.
    *   Fixed "Undefined variable $channel_id" in `twitchpress_channel_status_box_shortcode_helix()`.
    *   Channel List CSS not loading.
    *   Videos failing to display due to missing "parent" value.
*   **Technical Notes:**
    *   Changed parameter order in `endpoint()` and `curl()`.
    *   Resolved "Creation of dynamic property" deprecated messages.
    *   `get_streams()` can now accept an array of IDs.
    *   Removed unused functions.

*(For a full changelog, please see the `readme.txt` file.)*

---

## License

This plugin is licensed under the **GPLv3**. See the [LICENSE](https://github.com/LOLinDark/TwitchPress/blob/master/LICENSE) file for more details.