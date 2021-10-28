<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
    	return $this->belongsTo(\Modules\Users\Entities\User::class);
    }

    public static function parseContent($data = null, $excerpt = false) {
        if (!$data) {
            return;
        }

        $excerpt = ($excerpt == true) ? true : false;

        $data   = json_decode($data);
        $html   = $excerpt ? self::getExcerptHTML($data) : self::getHTML($data);
        return $html;
    }

    public static function getHTML($data)
    {
        $html = '';

        if (isset($data->blocks)) {
            $blocks = $data->blocks;

            foreach ($blocks as $key => $block) {
                switch ($block->type) {
                    case 'paragraph':
                        $html .= self::getParagraph($block->data);
                        break;
                    case 'header':
                        $html .= self::getHeader($block->data);
                        break;
                    case 'delimiter':
                        $html .= self::getHorizontalLine($block->data);
                        break;
                    case 'image':
                        $html .= self::getImage($block->data);
                        break;
                    case 'list';
                        $html .= self::getOrderedList($block->data);
                        break;
                    case 'checklist':
                        $html .= self::getCheckList($block->data);
                        break;
                    case 'raw':
                        $html .= self::getRawHTML($block->data);
                        break;
                    case 'quote':
                        $html .= self::getQuote($block->data);
                        break;
                    default:
                        $html .= '';
                        break;
                }
            }
        }

        return $html;
    }

    public static function getExcerptHTML($data)
    {
        if (isset($data->blocks)) {
            $blocks = $data->blocks;

            foreach ($blocks as $key => $block) {
                if ($block->type == 'paragraph') {
                    // Return only the first paragraph content
                    return self::getParagraph($block->data);
                }
            }
        }

        return '';
    }

    public static function getParagraph($block_data)
    {
        if (!$block_data) {
            return;
        }

        $block_text = $block_data->text;

        // Replace `<b>` tags
        $block_text = str_replace('<b>', '<strong>', $block_text);
        $block_text = str_replace('</b>', '</strong>', $block_text);

        // Replace `<i>` tags
        $block_text = str_replace('<i>', '<em>', $block_text);
        $block_text = str_replace('</i>', '</em>', $block_text);

        $html = '
            <p>' . $block_text . '</p>
        ';

        return $html;
    }

    public static function getHeader($block_data)
    {
        if (!$block_data) {
            return;
        }

        $html = '
            <h' . $block_data->level . '>' . $block_data->text . '</h' . $block_data->level . '>
        ';

        return $html;
    }

    public static function getHorizontalLine($block_data)
    {
        if (!$block_data) {
            return;
        }

        $html = '<hr />';

        return $html;
    }

    public static function getImage($block_data)
    {
        if (!$block_data) {
            return;
        }

        $html = '
            <figure class="margin-bottom-md">
                <img src="' . $block_data->file->url . '" />
                <figcaption>' . $block_data->caption . '</figcaption>
            </figure>
        ';

        return $html;
    }

    public static function getOrderedList($block_data)
    {
        if (!$block_data) {
            return;
        }

        $html = '<ol>';
            foreach ($block_data->items as $key => $item) {
                $html .= '<li>' . $item . '</li>';
            }
        $html .= '</ol>';

        return $html;
    }

    public static function getCheckList($block_data)
    {
        if (!$block_data) {
            return;
        }

        $html = '<ul>';
            foreach ($block_data->items as $key => $item) {
                $line_through_class = ($item->checked) ? 'text-line-through' : '';

                $html .= '<li class="' . $line_through_class . '">' . $item->text . '</li>';
            }
        $html .= '</ul>';

        return $html;
    }

    public static function getRawHTML($block_data)
    {
        if (!$block_data) {
            return;
        }

        $html = $block_data->html;

        return $html;
    }

    public static function getQuote($block_data)
    {
        if (!$block_data) {
            return;
        }

        $block_text    = $block_data->text;
        $block_caption = $block_data->caption;
        $alignment     = $block_data->alignment;

        $html = '
            <blockquote class="position-relative z-index-1 bg-contrast-lower text-center padding-y-xxl" style="text-align: ' . $alignment . '">
            <div class="container max-width-adaptive-sm">
              <svg class="icon icon--xxl color-contrast-low" aria-hidden="true" viewBox="0 0 64 64"><polygon fill="currentColor" points="2 36 17 2 26 2 15 36 26 36 26 62 2 62 2 36"/><polygon fill="currentColor" points="38 36 53 2 62 2 51 36 62 36 62 62 38 62 38 36"/></svg>
              <div class="text-component margin-top-lg">
                <p class="text-xl">' . $block_text . '</p>
              </div>
              <footer class="margin-top-lg">&mdash; ' . $block_caption . '</footer>
            </div>
          </blockquote>          
        ';

        return $html;
    }
}
