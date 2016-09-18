<?php

class NewPostsController extends \BaseController {

    public function __construct() {
        parent::__construct();

        $this->feed = new SimplePie();
        $this->feed->set_feed_url('http://circleschool.org/resources/blog/feed/');
        $this->feed->set_cache_location('./simplepie_cache');
        $this->feed->init();
        $this->feed->handle_content_type();
        // TODO: Set cache duration?
    }

    public function index()
    {
        $items = $this->feed->get_items();
        $posts = [];
        for ($i = 0; $i < count($items); $i++) {
            $posts[] = $this->getPostDataForView($items[$i], $i);
        }
        return View::make('newposts')
            ->with('posts', $posts)
            ->with('limit', 3);
    }

    public function show()
    {
        $index = $_GET['index'];
        $guid = $_GET['guid'];

        $post_found = false;
        $post = "";

        if (!is_int($index) || $index < 0 || $index >= $this->feed->get_item_quantity) {
            // Index is invalid, just look through all the posts for a matching GUID
            $all_posts = $this->feed->get_items();
            for ($i = 0; $i < count($all_posts); $i++) {
                if ($all_posts[$i]->get_id() === $guid) {
                    $post = $all_posts[$i];
                    $post_found = true;
                    break;
                }
            }
        } else {
            // If index is valid, see if the GUID there matches
            if ($this->feed->get_item($index)->get_id() === $guid) {
                $post = $this->feed->get_item($index);
                $post_found = true;
            } else {
                // GUID at given index didn't match, so look back through older posts
                $older_posts = $this->feed->get_items($index + 1);
                for ($i = 0; $i < count($older_posts); $i++) {
                    if ($older_posts[$i]->get_id() === $guid) {
                        $post = $older_posts[$i];
                        $post_found = true;
                        break;
                    }
                }

                if (!$post_found) {
                    // Didn't find it in the older posts, try newer posts
                    $newer_posts = $this->feed->get_items(0, $index);
                    for ($i = count($newer_posts)-1; $i >= 0; $i--) {
                        if ($newer_posts[$i]->get_id() === $guid) {
                            $post = $newer_posts[$i];
                            $post_found = true;
                            break;
                        }
                    }
                }
            }
        }

        if ($post_found) {
            $post = $this->getPostDataForView($post);
        }

        return View::make('newpost')
            ->with('post_found', $post_found)
            ->with('post', $post);
    }

    private function getPostDataForView($item, $index = 0) {
        $author = $item->get_item_tags(SIMPLEPIE_NAMESPACE_DC_11, 'creator')[0]['data'];

        $guid = urlencode($item->get_id()); // guid is a url
        $link = "/updates/show?index=".$index."&guid=".$guid;
        $post = [
            'title' => $item->get_title(),
            'date' => $item->get_gmdate('F j, Y'),
            'author' => $author,
            'content' => $item->get_content(),
            'link' => $link
        ];
        return $post;
    }

}