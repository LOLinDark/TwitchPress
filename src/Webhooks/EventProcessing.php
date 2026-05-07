<?php
namespace TwitchPress\Webhooks;

use TwitchPress\BackgroundProcessing\BackgroundProcessing;

/**
 * Handles async processing of Twitch webhooks.
 */
class EventProcessing extends BackgroundProcessing
{
    /**
     * The specific action that this class will perform.
     *
     * @var string
     */
    protected $action = 'twitch_webhooks_processing';

    /**
     * Listens for the $_POST request performed by wp_remote_post().
     */
    public function processHandler()
    {
        if (!isset($_POST['twitchpress_webhooks_queue']) || !isset($_POST['_wpnonce'])) {
            return;
        }
        if (!wp_verify_nonce($_POST['_wpnonce'], 'process')) {
            return;
        }
        if ('single' === $_POST['process_size']) {
            $this->handleSingle();
        }
        if ('all' === $_POST['process_size']) {
            $this->handleAll();
        }
    }

    protected function task($item)
    {
        // TODO: Implement webhook event processing logic here.
        return false; // Remove the item (event) because it is finished.
    }

    protected function complete()
    {
        parent::complete();
    }

    protected function handleSingle()
    {
        // TODO: Implement single event handling logic.
    }

    protected function handleAll()
    {
        // TODO: Implement all events handling logic.
    }
}
