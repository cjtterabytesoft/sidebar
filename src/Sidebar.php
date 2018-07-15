<?php

/**
 * (c) CJT TERABYTE INC
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/cjtterabytesoft/sidebar
 *      @author: Wilmer Arámbula <terabytefrelance@gmail.com>
 *   @copyright: (c) CJT TERABYTE INC
 *      @widget: [Sidebar]
 *       @since: 1.0
 *         @yii: 3.0
 **/

namespace cjtterabytesoft\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

class Sidebar extends Menu
{
	/**
	 * @var string
	 */
	public $linkTemplate = '<a href="{url}" {linkOptions}>\n{icon}\n{label}\n{right-icon}\n{badge}</a>';
	/**
	 * @var string
	 */
	public $labelTemplate = '{icon}\n{label}\n{badge}';
	/**
	 * @var string
	 */
	public $submenuTemplate = "\n<ul class=\"dropdown-menu\">\n{items}\n</ul>\n";
	/**
	 * @var string
	 */
	public $badgeTag = 'small';
	/**
	 * @var string
	 */
	public $badgeClass = 'badge pull-right';
	/**
	 * @var string
	 */
	public $badgeBgClass = 'bg-green';
	/**
	 * @var string
	 */
	public $parentRightIcon = '<span class="arrow"><i class="ti-angle-right"></i></span>';
	/**
	 * @inheritdoc
	 */
	protected function renderItem($item)
	{
		$item['badgeOptions'] = isset($item['badgeOptions']) ? $item['badgeOptions'] : [];
		if (!ArrayHelper::getValue($item, 'badgeOptions.class')) {
			$bg = isset($item['badgeBgClass']) ? $item['badgeBgClass'] : $this->badgeBgClass;
			$item['badgeOptions']['class'] = $this->badgeClass . ' ' . $bg;
		}
		if (isset($item['items']) && !isset($item['right-icon'])) {
			$item['right-icon'] = $this->parentRightIcon;
		}
		$template = ArrayHelper::getValue(
			$item,
			'template',
			isset($item['url']) ? $this->linkTemplate : $this->labelTemplate
		);
		return strtr($template, [
			'{badge}' => isset($item['badge']) ? Html::tag('small', $item['badge'], $item['badgeOptions']) : '',
			'{icon}' => isset($item['icon']) ? $item['icon'] : '',
			'{right-icon}' => isset($item['right-icon']) ? $item['right-icon'] : '',
			'{url}' => isset($item['url']) ? Url::to($item['url']) : '',
			'{label}' => $item['label'],
			'{linkOptions}' => isset($item['linkOptions']) ? Html::renderTagAttributes($item['linkOptions']) : '',
		]);
	}
}
