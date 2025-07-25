<?php
declare(strict_types=1);

/**
 * @category    BugsBunny Enterprise
 * @package     BugsBunny_OrderComment
 * @copyright   Copyright (c) 2023 BugsBunny Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace BugsBunny\YoutubeWidget\Block;

use BugsBunny\YoutubeWidget\Helper\Data;
use Magento\Framework\View\Element\Template;

class Youtube extends Template
{
    /**
     * @var Data
     */
    protected $helper;

    public function __construct(Template\Context $context, Data $helper, array $data = [])
    {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->helper->isEnabled();
    }

    /**
     * @return string
     */
    public function getVideoId(): string
    {
        return $this->helper->getVideoId();
    }
}
