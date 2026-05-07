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

## Roadmap

### Gutenberg Blocks
- Stream embed block with live preview in the editor
- Chat embed block
- Channel status block (live/offline indicator with viewer count)
- Clips gallery block with layout options
- Schedule display block pulling from Twitch channel schedule

### Widgets
- Sidebar widget showing live/offline status with thumbnail
- Recent followers widget
- Top clips widget
- Stream schedule widget
- Sub goal progress widget

### Stream Alerts & Notifications
- WordPress admin notification when channel goes live
- Email subscribers when stream starts (opt-in)
- Auto-publish a post when stream goes live via EventSub
- Auto-update post with VOD link when stream ends

### WooCommerce Integration
- Restrict product purchases to Twitch subscribers
- Discount codes tied to subscription tier
- Subscriber-tier-based pricing
- Gift sub verification for order fulfillment

### Advanced Content Gating
- Gate by subscription tier (Tier 1 / Tier 2 / Tier 3)
- Gate by follow duration (e.g. followed for 3+ months)
- Gate by bits donated threshold
- Gate by VIP or moderator status
- Elementor and Beaver Builder visibility conditions

### Channel Points & Rewards
- Display custom channel point rewards on WordPress
- Let viewers redeem channel points for site actions (unlock post, enter giveaway)
- Channel points leaderboard shortcode

### Chat Integration
- Display live chat messages in a WordPress widget
- Chat command triggers (e.g. !website posts a link in chat)
- Moderation log viewer in WordPress admin

### Analytics Dashboard
- Stream history with viewer count graphs
- Follower growth over time
- Subscriber count and churn tracking
- Top clips by views
- Revenue summary (bits + subs) for authorized broadcasters

### Multi-Channel Support
- Manage multiple Twitch channels from one WordPress install
- Per-channel content gating rules
- Combined multi-stream embed layout (squad streams)

### Clips & VOD Management
- Auto-import clips as WordPress posts
- VOD gallery with search and category filters
- Clip submission system (viewers submit timestamps, admin approves)

### User Profile Enhancements
- Display Twitch stats on BuddyPress/BuddyBoss profiles
- Show subscription badge and tier on user profiles
- Follower/following count on profile pages
- Link multiple Twitch accounts to one WordPress account

### REST API
- Expose Twitch channel data via WordPress REST endpoints
- Headless/decoupled frontend support
- Webhook payload forwarding to custom endpoints

### Polls & Predictions
- Create Twitch polls from WordPress admin
- Display active poll results on the site in real-time
- Predictions widget showing current odds

---

## Contributing

Issues and pull requests are welcome on [GitHub](https://github.com/LOLinDark/TwitchPress/issues).

---

## License

GPL-3.0-or-later. See [LICENSE](LICENSE) for details.
