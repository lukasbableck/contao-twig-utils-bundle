<?php
namespace Lukasbableck\ContaoTwigUtilsBundle\Twig;

use Contao\FilesModel;
use Contao\Validator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension {
	public function getFunctions(): array {
		return [
			new TwigFunction('file', [$this, 'getFilesModel']),
		];
	}

	public function getFilesModel($fileIdentifier) {
		if (Validator::isUuid($fileIdentifier)) {
			$objFile = FilesModel::findByUuid($fileIdentifier);
		} elseif (is_numeric($fileIdentifier)) {
			$objFile = FilesModel::findById($fileIdentifier);
		} elseif (Validator::isInsecurePath($fileIdentifier)) {
			throw new \RuntimeException('Invalid path '.$fileIdentifier);
		} else {
			$objFile = FilesModel::findByPath($fileIdentifier);
		}

		if ($objFile !== null) {
			return $objFile;
		}
	}
}
