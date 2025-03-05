<?php
namespace Lukasbableck\ContaoTwigUtilsBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Lukasbableck\ContaoTwigUtilsBundle\ContaoTwigUtilsBundle;

class Plugin implements BundlePluginInterface {
	public function getBundles(ParserInterface $parser): array {
		return [BundleConfig::create(ContaoTwigUtilsBundle::class)->setLoadAfter([ContaoCoreBundle::class])];
	}
}
