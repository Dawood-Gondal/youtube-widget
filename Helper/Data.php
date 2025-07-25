<?php
declare(strict_types=1);
/**
 * @category    BugsBunny Enterprise
 * @package     BugsBunny_OrderComment
 * @copyright   Copyright (c) 2023 BugsBunny Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace BugsBunny\YoutubeWidget\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ENABLE = 'bugsbunny_youtube/general/enable';
    const XML_PATH_VIDEO_URL = 'bugsbunny_youtube/general/video_url';

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getVideoId(): string
    {
        $url = $this->scopeConfig->getValue(self::XML_PATH_VIDEO_URL, ScopeInterface::SCOPE_STORE);
        if (!$url) {
            return '';
        }

        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return '';
    }
}
