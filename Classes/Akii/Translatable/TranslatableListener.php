<?php
namespace Akii\Translatable;

use Gedmo\Translatable\Mapping\Event\TranslatableAdapter;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Configuration\ConfigurationManager;

class TranslatableListener extends \Gedmo\Translatable\TranslatableListener {

	/**
	 * @var ConfigurationManager
	 * @Flow\Inject
	 */
	protected $configurationManager;

	public function initializeObject() {
		$defaultLocale = $this->configurationManager->getConfiguration(ConfigurationManager::CONFIGURATION_TYPE_SETTINGS, 'TYPO3.Flow.i18n.defaultLocale');
		$this->setTranslatableLocale($defaultLocale);
		$this->setDefaultLocale($defaultLocale);
	}

	public function getTranslationClass(TranslatableAdapter $ea, $class) {
		if (isset(self::$configurations[$this->name][$class]['translationClass'])) {
			return parent::getTranslationClass($ea, $class);
		} else {
			return 'Akii\\Translatable\\Entity\\Translation';
		}
	}

}