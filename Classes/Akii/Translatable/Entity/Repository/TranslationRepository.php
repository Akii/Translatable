<?php
namespace Akii\Translatable\Entity\Repository;

use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class TranslationRepository extends \Gedmo\Translatable\Entity\Repository\TranslationRepository {

	/**
	 * @var \Doctrine\Common\Persistence\ObjectManager
	 * @Flow\Inject
	 */
	protected $entityManager;

	public function __construct() {}

	public function initializeObject() {
		$classMetaData = $this->entityManager->getClassMetadata('Akii\Translatable\Entity\Translation');

		$this->_entityName = $classMetaData->name;
		$this->_em         = $this->entityManager;
		$this->_class      = $classMetaData;
	}

}