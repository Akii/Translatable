<?php
namespace Akii\Translatable;

use Gedmo\Translatable\Mapping\Event\TranslatableAdapter;

class TranslatableListener extends \Gedmo\Translatable\TranslatableListener {

	/**
	 * Locale which is set on this listener.
	 * If Entity being translated has locale defined it
	 * will override this one
	 *
	 * @var string
	 */
	protected $locale = 'de_DE';

	/**
	 * Default locale, this changes behavior
	 * to not update the original record field if locale
	 * which is used for updating is not default. This
	 * will load the default translation in other locales
	 * if record is not translated yet
	 *
	 * @var string
	 */
	private $defaultLocale = 'de_DE';

	public function getTranslationClass(TranslatableAdapter $ea, $class) {
		if (isset(self::$configurations[$this->name][$class]['translationClass'])) {
			return parent::getTranslationClass($ea, $class);
		} else {
			return 'Akii\\Translatable\\Entity\\Translation';
		}
	}

}