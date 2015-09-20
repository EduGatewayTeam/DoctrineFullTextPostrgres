<?php
/**
 * @author: James Murray <jaimz@vertigolabs.org>
 * @copyright:
 * @date: 9/15/2015
 * @time: 3:12 PM
 */

namespace VertigoLabs\DoctrineFullTextPostgres\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TsVector extends Type
{

	private $test;
	/**
	 * Gets the SQL declaration snippet for a field of this type.
	 *
	 * @param array $fieldDeclaration The field declaration.
	 * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
	 *
	 * @return string
	 */
	public function getSQLDeclaration( array $fieldDeclaration, AbstractPlatform $platform )
	{
		return 'tsvector';
	}

	public function canRequireSQLConversion()
	{
		return true;
	}

	/**
	 * Converts a value from its database representation to its PHP representation
	 * of this type.
	 *
	 * @param mixed $value The value to convert.
	 * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
	 *
	 * @return mixed The PHP representation of the value.
	 */
	public function convertToPHPValue( $value, AbstractPlatform $platform )
	{
		return $value;
	}

	/**
	 * Converts a value from its PHP representation to its database representation
	 * of this type.
	 *
	 * @param mixed $value The value to convert.
	 * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform The currently used database platform.
	 *
	 * @return mixed The database representation of the value.
	 */
	public function convertToDatabaseValueSQL( $sqlExp, AbstractPlatform $platform )
	{
		return sprintf("to_tsvector('english', ?)", $sqlExp);
	}

	public function convertToDatabaseValue($value, AbstractPlatform $platform)
	{
		return $value['data'];
//		$retVal=[];
//		if (is_array($value)) {
//			if (isset($value['language'])) {
//				$retVal[] = "'".$value['language']."'";
//			}
//			if (isset($value['data'])) {
//				$retVal[] = "'".$value['data']."'";
//			}
//			$retVal = join(',',$retVal);
//		}else{
//			$retVal = $value;
//		}
//		return $retVal;
	}

	/**
	 * Gets the name of this type.
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'tsvector';
	}
}