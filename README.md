# TwitchPress

**Unofficial Twitch.tv integration for WordPress.**

[![WordPress Plugin Version](https://img.shields.io/wordpress/plugin/v/twitchpress.svg?style=flat-square)](https://wordpress.org/plugins/twitchpress/)
[![License](https://img.shields.io/badge/license-GPL--3.0--or--later-blue.svg?style=flat-square)](https://www.gnu.org/licenses/gpl-3.0.html)

Connect your WordPress site to the Twitch Helix API. Embed live streams, restrict content to followers or subscribers, let visitors sign in with their Twitch account, and display channel data using shortcodes.

*TwitchPress is unofficial and has not been endorsed by Twitch Interactive, Inc.*

---

## Features

- Sign in and register via Twitch OAuth
- Follower-only and subscriber-only content gating
- Embed live streams, chat, and videos
- Channel status shortcodes (online/offline, viewer count)
- Twitch avatar as WordPress avatar
- Full-width split-screen stream layout
- Channel list and team roster shortcodes
- Top games and clips shortcodes
- EventSub webhook support

---

## Requirements

- PHP 7.4+
- WordPress 6.0+
- cURL and JSON PHP extensions
- A registered [Twitch Developer Application](https://dev.twitch.tv/console)

---

## Installation

1. Download or clone this repository into `wp-content/plugins/twitchpress/`.
2. Activate the plugin in WordPress.
3. Complete the Setup Wizard with your Twitch application credentials.

---

## Shortcodes

```
[twitchpress_embed_everything channel="your_channel"]
[twitchpress_channel_status channel_name="your_channel"]
[twitchpress_get_top_games_list total="5"]
[twitchpress_videos user_id="12345"]
[twitchpress_followers_only]Follower-only content here.[/twitchpress_followers_only]
[twitchpress_shortcodes shortcode="sub_only_content"]Subscriber content.[/twitchpress_shortcodes]
```

See the [shortcode documentation](https://twitchpress.wordpress.com/shortcodes/) for full details.

---

## Links

- [GitHub](https://github.com/LOLinDark/TwitchPress)
- [Discord](https://discord.gg/ScrhXPE)
- [Blog](https://twitchpress.wordpress.com)
- [Patreon](https://www.patreon.com/twitchpress)
- [Author's Twitch](https://www.twitch.tv/lolindark1)

---

## Contributing

Issues and pull requests are welcome on [GitHub](https://github.com/LOLinDark/TwitchPress/issues).

---

## License

GPL-3.0-or-later. See [LICENSE](LICENSE) for details.
