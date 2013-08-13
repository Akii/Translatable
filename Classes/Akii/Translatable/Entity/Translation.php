<?php
namespace Akii\Translatable\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Doctrine\ORM\Mapping\Entity;
use TYPO3\Flow\Annotations as Flow;

/**
 * Gedmo\Translatable\Entity\Translation
 *
 * @Table(
 *         name="ext_translations",
 *         indexes={@index(name="translations_lookup_idx", columns={
 *             "locale", "object_class", "foreign_key"
 *         })},
 *         uniqueConstraints={@UniqueConstraint(name="lookup_unique_idx", columns={
 *             "locale", "object_class", "field", "foreign_key"
 *         })}
 * )
 * @Entity(repositoryClass="Akii\Translatable\Entity\Repository\TranslationRepository")
 * @Flow\Entity
 */
class Translation extends MappedSuperclass\AbstractTranslation
{
    /**
     * All required columns are mapped through inherited superclass
     */
}