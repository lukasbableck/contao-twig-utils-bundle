<?php
namespace Lukasbableck\ContaoTwigUtilsBundle\Twig;

use Contao\Controller;
use Contao\FilesModel;
use Contao\Validator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class Extension extends AbstractExtension {
	public function getFilters(): array {
		return [
			new TwigFilter('json_decode', [$this, 'jsonDecode']),
		];
	}

	public function getFunctions(): array {
		return [
			new TwigFunction('contao_form', [Controller::class, 'getForm']),
			new TwigFunction('file', [$this, 'getFilesModel']),
		];
	}

	public function jsonDecode($json, $assoc = false) {
		if (\is_string($json)) {
			$json = json_decode($json, $assoc);
		}

		return $json;
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
