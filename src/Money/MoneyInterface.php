<?PHP

/**
 *  A Phone value object
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\Money;

use SerendipityHQ\Component\ValueObjects\Common\ValueObjectInterface;

interface MoneyInterface extends ValueObjectInterface
{
    public function getConvertedAmount();
}
