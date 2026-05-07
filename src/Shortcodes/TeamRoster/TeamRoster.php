<?php
namespace TwitchPress\Shortcodes\TeamRoster;

use TwitchPress\TwitchAPI\TwitchAPI; // Placeholder for the actual Twitch API class

/**
 * Implements a shortcode for displaying a Twitch team roster.
 */
class TeamRoster
{
    public $atts = ['empty'];
    public $response = null;
    public $channels = [];

    public function init()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueuePublicCss'], 4);
        $this->enqueuePublicCss();
        $this->getTwitchData();
        $this->prepareData();
    }

    public function getTwitchData()
    {
        $twitch_api = class_exists('TwitchPress_Twitch_API') ? new \TwitchPress_Twitch_API() : null;
        if (!$twitch_api) return;
        $team = $twitch_api->get_team('test');
        if (!isset($team->data[0]->users)) return;
        foreach ($team->data[0]->users as $key => $user) {
            $followers = $twitch_api->get_users_follows_to_id(null, null, $user->user_id);
            $channel = $twitch_api->get_user_by_id($user->user_id);
            if (!$channel->data) continue;
            $this->channels[$key] = [
                'user_id' => $user->user_id,
                'name' => $user->user_login,
                'logo' => $channel->data[0]->profile_image_url,
                'display_name' => $user->user_name,
                'followers' => $followers->total,
                'display' => 'offline',
                'views' => $channel->data[0]->view_count,
                'description' => $channel->data[0]->description,
                'broadcaster_type' => $channel->data[0]->broadcaster_type,
            ];
        }
    }

    public function prepareData()
    {
        if (isset($this->atts['orderby']) && $this->atts['orderby']) {
            $this->channels = wp_list_sort(
                $this->channels,
                $this->atts['orderby'],
                'DESC',
                true
            );
        }
    }

    public function enqueuePublicCss()
    {
        if (!isset($this->atts['style'])) {
            $this->atts['style'] = 'table';
        }
        switch ($this->atts['style']) {
            case 'table':
            case 'horizontal':
                wp_register_style('twitchpress_shortcode_teamroster', TWITCHPRESS_PLUGIN_URL . '/includes/shortcodes/teamroster/twitchpress-shortcode-teamroster-table.css');
                wp_enqueue_style('twitchpress_shortcode_teamroster', TWITCHPRESS_PLUGIN_URL . '/includes/shortcodes/teamroster/twitchpress-shortcode-teamroster-table.css');
                break;
        }
    }

    public function output()
    {
        switch ($this->atts['style']) {
            case 'error':
                return $this->atts['error'];
            case 'table':
                return $this->styleTable();
            case 'horizontal':
                return $this->styleHorizontal();
            default:
                return $this->styleTable();
        }
    }

    public function styleTable()
    {
        ob_start();
        if (!$this->channels) {
            echo '<p>No team members returned by Twitch.tv</p>';
            return ob_get_clean();
        }
        ?>
        <main>
            <div class="divTable">
                <div class="divTableBody">
                    <?php foreach ($this->channels as $user): ?>
                        <article class="channel" id="<?php echo esc_attr($user['user_id']); ?>">
                            <div class="divTableRow">
                                <div class="divTableCell"><img width="150" height="150" src="<?php echo esc_url($user['logo']); ?>"></div>
                                <div class="divTableCell"><?php echo esc_attr($user['name']); ?></div>
                                <div class="divTableCell">Followers: <?php echo esc_attr($user['followers']); ?> <br> Views: <?php echo esc_attr($user['views']); ?></div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
        <?php
        return ob_get_clean();
    }

    public function styleHorizontal()
    {
        ob_start();
        if (!$this->channels) {
            echo '<p>No team members returned by Twitch.tv</p>';
            return ob_get_clean();
        }
        $column_count = 0;
        foreach ($this->channels as $user) {
            if ($column_count == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="column">
                <div class="card">
                    <img src="<?php echo esc_url($user['logo']); ?>" alt="<?php echo esc_attr($user['display_name']); ?>" style="width:100%">
                    <div class="container">
                        <h2><?php echo esc_attr($user['display_name']); ?></h2>
                        <p class="title"><?php echo $user['broadcaster_type']; ?></p>
                        <p><?php echo $user['description']; ?></p>
                        <p>Followers: <?php echo esc_attr($user['followers']); ?></p>
                        <p><button class="button">Views: <?php echo esc_attr($user['views']); ?></button></p>
                    </div>
                </div>
            </div>
            <?php
            if ($column_count == 3) {
                echo '</div>';
                $column_count = 0;
            } else {
                ++$column_count;
            }
        }
        return ob_get_clean();
    }
}
