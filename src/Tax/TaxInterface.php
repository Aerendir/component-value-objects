<?PHP

/**
 *  An Uri value object.
 *  This is just a wrapper for Zend Uri.
 *
 * @link https://github.com/zendframework/zend-uri
 *
 * @todo This has to be a Guzzle Uri or https://github.com/mvdbos/vdb-uri
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Tax;

use \SerendipityHQ\Component\ValueObjects\Common\ValueObjectInterface;
use \SerendipityHQ\ValueObject\Tax\TaxInterface as BaseTaxInterface;

/**
 * {@inheritdoc}
 */
interface TaxInterface extends BaseTaxInterface
{

}
