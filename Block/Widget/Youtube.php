<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_OrderComment
 * @copyright   Copyright (c) 2025 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

declare(strict_types=1);

namespace M2Commerce\YoutubeWidget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Youtube extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "widget/youtube.phtml";

    /**
     * @return string|null
     */
    public function getVideoId()
    {
        $url = $this->getData('video_url');
        if (preg_match('/(?:v=|\/embed\/|youtu\.be\/)([^&#?\n]+)/', $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * @return array|mixed|null
     */
    public function getVideoTitle()
    {
        return $this->getData('title');
    }

    /**
     * @return array|int|mixed
     */
    public function getWidth()
    {
        return $this->getData('width') ?: 560;
    }

    /**
     * @return array|int|mixed
     */
    public function getHeight()
    {
        return $this->getData('height') ?: 315;
    }

    /**
     * @return bool
     */
    public function isAutoplay()
    {
        return (bool)$this->getData('autoplay');
    }
}
